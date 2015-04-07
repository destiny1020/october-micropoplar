<?php namespace Micropoplar\Volunteer\Components;

use Lang;
use Flash;
use Auth;
use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use Exception;
use Validator;
use ValidationException;
use ApplicationException;
use Micropoplar\Volunteer\Models\Settings as UserSettings;
use Micropoplar\Volunteer\Models\Volunteer as VolunteerModel;

class VolunteerAccount extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'micropoplar.volunteer::component.va.name',
            'description' => 'micropoplar.volunteer::component.va.description'
        ];
    }

    public function defineProperties()
    {
        return [
            'redirect' => [
                'title'       => 'rainlab.user::lang.account.redirect_to',
                'description' => 'rainlab.user::lang.account.redirect_to_desc',
                'type'        => 'dropdown',
                'default'     => ''
            ],
            'paramCode' => [
                'title'       => 'rainlab.user::lang.account.code_param',
                'description' => 'rainlab.user::lang.account.code_param_desc',
                'type'        => 'string',
                'default'     => 'code'
            ]
        ];
    }

    /**
     * Backend option list
     */
    public function getRedirectOptions()
    {
        return [''=>'- none -'] + Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }

    public function onRun()
    {
        $routeParameter = $this->property('paramCode');

        /**
         * If the activation code is supplied
         */
        if ($activationCode = $this->param($routeParameter)) {
            $this->onActivate(false, $activationCode);
        }

        $this->page['user'] = $this->user();
        $this->page['loginAttribute'] = $this->loginAttribute();
        $this->page['loginAttributeLabel'] = $this->loginAttributeLabel();
    }

    public function user()
    {
        if(!Auth::check())
            return null;

        return Auth::getUser();
    }

     /**
     * Returns the login model attribute.
     */
    public function loginAttribute()
    {
        return UserSettings::get('login_attribute', UserSettings::LOGIN_EMAIL);
    }

    /**
     * Returns the login label as a word.
     */
    public function loginAttributeLabel()
    {
        return $this->loginAttribute() == UserSettings::LOGIN_EMAIL
            ? Lang::get('micropoplar.volunteer::component.login.attribute_email')
            : Lang::get('micropoplar.volunteer::component.login.attribute_username');
    }

    public function onActivate($isAjax = true, $code = null)
    {
        try {
            $code = post('code', $code);

            /**
             * Break up the code parts
             */
            $parts = explode('!', $code);
            if(count($parts) != 2) {
                throw new ValidationException(['code' => Lang::get('micropoplar.volunteer::component.account.invalid_activation_code')]);
            }

            list($userId, $code) = $parts;

            // if the user is not valid
            if(!strlen(trim($userId)) || !($user = Auth::findUserById($userId))) {
                throw new ApplicationException(Lang::get('micropoplar.volunteer::component.account.invalid_user'));
            }

            // if the activation is failed
            if(!$user->attemptActivation($code)) {
                throw new ValidationException(['code' => Lang::get('micropoplar.volunteer::component.account.invalid_activation_code')]);
            }

            Flash::success(Lang::get('micropoplar.volunteer::component.account.success_activation'));

            // sign in the volunteer
            Auth::login($user);
        }
        catch (Exception $ex) {
            if($isAjax) throw $ex;
            else Flash::error($ex->getMessage());
        }
    }

    /**
     * Register the volunteer
     */
    public function onRegister()
    {
        // validate input
        $data = post();

        if (!array_key_exists('password_confirmation', $data)) {
            $data['password_confirmation'] = post('password');
        }

        $rules = (new VolunteerModel)->rules;

        if ($this->loginAttribute() == UserSettings::LOGIN_USERNAME) {
            // $rules['username'] = 'required|between:2,64';
        }

        $validation = Validator::make($data, $rules);
        if ($validation->fails()) {
            throw new ValidationException($validation);
        }

        /**
         * Register volunteer
         */
        $requireActivation = UserSettings::get('require_activation', true);
        $automaticActivation = UserSettings::get('activate_mode') == UserSettings::ACTIVATE_AUTO;
        $userActivation = UserSettings::get('activate_mode') == UserSettings::ACTIVATE_USER;
        $user = Auth::register($data, $automaticActivation);

        /**
         * Activation is by the user, send the email
         */
        if ($userActivation) {
            $this->sendActivationEmail($user);

            Flash::success(Lang::get('micropoplar.volunteer::component.account.activation_email_sent'));
        }

        /**
         * Automatically activated or not required, log the volunteer in
         */
        if($automaticActivation || !$requireActivation) {
            Auth::login($user);
        }

        /**
         * Redirect to the intended page after successful sign in
         */
        $redirectUrl = $this->pageUrl($this->property('redirect'));

        if ($redirectUrl = post('redirect', $redirectUrl)) {
            return Redirect::intended($redirectUrl);
        }
    }

}
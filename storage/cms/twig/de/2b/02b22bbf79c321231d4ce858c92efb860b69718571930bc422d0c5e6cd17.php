<?php

/* /home/destiny1020/code/install-master-clean/themes/responsiv-flat/pages/portfolio/portfolio.htm */
class __TwigTemplate_de2b02b22bbf79c321231d4ce858c92efb860b69718571930bc422d0c5e6cd17 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo $this->env->getExtension('CMS')->startBlock('scripts'        );
        // line 2
        echo "    <script src=\"";
        echo $this->env->getExtension('CMS')->themeFilter(array(0 => "assets/vendor/isotope/jquery.isotope.js", 1 => "assets/javascript/pages/portfolio.js"));
        // line 5
        echo "\"></script>
";
        // line 1
        echo $this->env->getExtension('CMS')->endBlock(true        );
        // line 7
        echo "
<section id=\"layout-title\">
    <div class=\"container\">
        <h3 class=\"pull-left\">Portfolio</h3>

        <div class=\"btn-toolbar pull-right\">
            <div class=\"btn-group\" id=\"filters\">
                <a class=\"btn btn-primary active\" href=\"#filter\" class=\"selected\" data-filter=\"*\"><span class=\"fui-list\"></span> All</a>
                <a class=\"btn btn-primary\" href=\"#filter\" data-filter=\".nature\"><span class=\"fui-eye\"></span> Nature</a>
                <a class=\"btn btn-primary\" href=\"#filter\" data-filter=\".people\"><span class=\"fui-user\"></span> People</a>
                <a class=\"btn btn-primary\" href=\"#filter\" data-filter=\".scenery\"><span class=\"fui-video\"></span> Scenery</a>
                <a class=\"btn btn-primary\" href=\"#filter\" data-filter=\".world\"><span class=\"fui-photo\"></span> World</a>
            </div>
        </div>
    </div>
</section>

<div class=\"container\">

    <!-- start: Portfolio -->
    <div id=\"portfolioItems\" class=\"row\">

        <div class=\"col-md-3 portfolio-item nature people\">
            <div class=\"picture\">
                <a class=\"image\" href=\"";
        // line 31
        echo $this->env->getExtension('CMS')->pageFilter("portfolio/project");
        echo "\" title=\"Title\">
                    <img src=\"";
        // line 32
        echo $this->env->getExtension('CMS')->themeFilter("assets/images/portfolio/thumbs/project1.jpg");
        echo "\" alt=\"\" />
                </a>
                <div class=\"description\">
                    <a href=\"";
        // line 35
        echo $this->env->getExtension('CMS')->pageFilter("portfolio/project");
        echo "\" class=\"btn btn-info btn-block\">Cars <small>for Joe Bloggs</small></a>
                </div>
            </div>
        </div>

        <div class=\"col-md-6 portfolio-item scenery\">
            <div class=\"picture\">
                <a class=\"image\" href=\"";
        // line 42
        echo $this->env->getExtension('CMS')->pageFilter("portfolio/project");
        echo "\" title=\"Title\">
                    <img src=\"";
        // line 43
        echo $this->env->getExtension('CMS')->themeFilter("assets/images/portfolio/thumbs/project4.jpg");
        echo "\" alt=\"\" />
                </a>
                <div class=\"description\">
                    <a href=\"";
        // line 46
        echo $this->env->getExtension('CMS')->pageFilter("portfolio/project");
        echo "\" class=\"btn btn-info btn-block\">Money <small>for Joe Bloggs</small></a>
                </div>
            </div>
        </div>

        <div class=\"col-md-3 portfolio-item world scenery\">
            <div class=\"picture\">
                <a class=\"image\" href=\"";
        // line 53
        echo $this->env->getExtension('CMS')->pageFilter("portfolio/project");
        echo "\" title=\"Title\">
                    <img src=\"";
        // line 54
        echo $this->env->getExtension('CMS')->themeFilter("assets/images/portfolio/thumbs/project2.jpg");
        echo "\" alt=\"\" />
                </a>
                <div class=\"description\">
                    <a href=\"";
        // line 57
        echo $this->env->getExtension('CMS')->pageFilter("portfolio/project");
        echo "\" class=\"btn btn-info btn-block\">Nature <small>for Joe Bloggs</small></a>
                </div>
            </div>
        </div>

        <div class=\"col-md-3 portfolio-item nature scenery\">
            <div class=\"picture\">
                <a class=\"image\" href=\"";
        // line 64
        echo $this->env->getExtension('CMS')->pageFilter("portfolio/project");
        echo "\" title=\"Title\">
                    <img src=\"";
        // line 65
        echo $this->env->getExtension('CMS')->themeFilter("assets/images/portfolio/thumbs/project3.jpg");
        echo "\" alt=\"\" />
                </a>
                <div class=\"description\">
                    <a href=\"";
        // line 68
        echo $this->env->getExtension('CMS')->pageFilter("portfolio/project");
        echo "\" class=\"btn btn-info btn-block\">Beach <small>for Joe Bloggs</small></a>
                </div>
            </div>
        </div>

        <div class=\"col-md-3 portfolio-item world\">
            <div class=\"picture\">
                <a class=\"image\" href=\"";
        // line 75
        echo $this->env->getExtension('CMS')->pageFilter("portfolio/project");
        echo "\" title=\"Title\">
                    <img src=\"";
        // line 76
        echo $this->env->getExtension('CMS')->themeFilter("assets/images/portfolio/thumbs/project1.jpg");
        echo "\" alt=\"\" />
                </a>
                <div class=\"description\">
                    <a href=\"";
        // line 79
        echo $this->env->getExtension('CMS')->pageFilter("portfolio/project");
        echo "\" class=\"btn btn-info btn-block\">Cars <small>for Joe Bloggs</small></a>
                </div>
            </div>
        </div>

        <div class=\"col-md-3 portfolio-item world people\">
            <div class=\"picture\">
                <a class=\"image\" href=\"";
        // line 86
        echo $this->env->getExtension('CMS')->pageFilter("portfolio/project");
        echo "\" title=\"Title\">
                    <img src=\"";
        // line 87
        echo $this->env->getExtension('CMS')->themeFilter("assets/images/portfolio/thumbs/project2.jpg");
        echo "\" alt=\"\" />
                </a>
                <div class=\"description\">
                    <a href=\"";
        // line 90
        echo $this->env->getExtension('CMS')->pageFilter("portfolio/project");
        echo "\" class=\"btn btn-info btn-block\">Nature <small>for Joe Bloggs</small></a>
                </div>
            </div>
        </div>

    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "/home/destiny1020/code/install-master-clean/themes/responsiv-flat/pages/portfolio/portfolio.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  165 => 90,  159 => 87,  155 => 86,  145 => 79,  139 => 76,  135 => 75,  125 => 68,  119 => 65,  115 => 64,  105 => 57,  99 => 54,  95 => 53,  85 => 46,  79 => 43,  75 => 42,  65 => 35,  59 => 32,  55 => 31,  29 => 7,  27 => 1,  24 => 5,  21 => 2,  19 => 1,);
    }
}

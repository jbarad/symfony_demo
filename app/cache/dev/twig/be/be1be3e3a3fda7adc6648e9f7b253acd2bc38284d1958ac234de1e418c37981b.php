<?php

/* default/homepage.html.twig */
class __TwigTemplate_bf35d367e317969d56776a25835a7ab9df68fe14c6e9d68112aa5186df8fb95f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "default/homepage.html.twig", 1);
        $this->blocks = array(
            'body_id' => array($this, 'block_body_id'),
            'header' => array($this, 'block_header'),
            'footer' => array($this, 'block_footer'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_daeeb96118c9fd102d06856747adfa2e85d77f86639e77611dae8020399ac1f1 = $this->env->getExtension("native_profiler");
        $__internal_daeeb96118c9fd102d06856747adfa2e85d77f86639e77611dae8020399ac1f1->enter($__internal_daeeb96118c9fd102d06856747adfa2e85d77f86639e77611dae8020399ac1f1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "default/homepage.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_daeeb96118c9fd102d06856747adfa2e85d77f86639e77611dae8020399ac1f1->leave($__internal_daeeb96118c9fd102d06856747adfa2e85d77f86639e77611dae8020399ac1f1_prof);

    }

    // line 3
    public function block_body_id($context, array $blocks = array())
    {
        $__internal_8467cee1ddae5fc4910da508a4a40101654f23794fd1e93a6767b3362ee01ed9 = $this->env->getExtension("native_profiler");
        $__internal_8467cee1ddae5fc4910da508a4a40101654f23794fd1e93a6767b3362ee01ed9->enter($__internal_8467cee1ddae5fc4910da508a4a40101654f23794fd1e93a6767b3362ee01ed9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_id"));

        echo "homepage";
        
        $__internal_8467cee1ddae5fc4910da508a4a40101654f23794fd1e93a6767b3362ee01ed9->leave($__internal_8467cee1ddae5fc4910da508a4a40101654f23794fd1e93a6767b3362ee01ed9_prof);

    }

    // line 9
    public function block_header($context, array $blocks = array())
    {
        $__internal_17c462370d95662c2b335005b4f01269c1db3cf15654433fd2dfefbdd4938c08 = $this->env->getExtension("native_profiler");
        $__internal_17c462370d95662c2b335005b4f01269c1db3cf15654433fd2dfefbdd4938c08->enter($__internal_17c462370d95662c2b335005b4f01269c1db3cf15654433fd2dfefbdd4938c08_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "header"));

        
        $__internal_17c462370d95662c2b335005b4f01269c1db3cf15654433fd2dfefbdd4938c08->leave($__internal_17c462370d95662c2b335005b4f01269c1db3cf15654433fd2dfefbdd4938c08_prof);

    }

    // line 10
    public function block_footer($context, array $blocks = array())
    {
        $__internal_cc0ee915c40fd6445663e7aa1c0c85f65282ce3d0bb805a3edec23e52575e17a = $this->env->getExtension("native_profiler");
        $__internal_cc0ee915c40fd6445663e7aa1c0c85f65282ce3d0bb805a3edec23e52575e17a->enter($__internal_cc0ee915c40fd6445663e7aa1c0c85f65282ce3d0bb805a3edec23e52575e17a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "footer"));

        
        $__internal_cc0ee915c40fd6445663e7aa1c0c85f65282ce3d0bb805a3edec23e52575e17a->leave($__internal_cc0ee915c40fd6445663e7aa1c0c85f65282ce3d0bb805a3edec23e52575e17a_prof);

    }

    // line 12
    public function block_body($context, array $blocks = array())
    {
        $__internal_07e9a61363f36c9b905be12764d27f9afffc911d93e72935d22782f582b14140 = $this->env->getExtension("native_profiler");
        $__internal_07e9a61363f36c9b905be12764d27f9afffc911d93e72935d22782f582b14140->enter($__internal_07e9a61363f36c9b905be12764d27f9afffc911d93e72935d22782f582b14140_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 13
        echo "    <div class=\"page-header\">
        <h1>";
        // line 14
        echo $this->env->getExtension('translator')->trans("title.homepage");
        echo "</h1>
    </div>

    <div class=\"row\">
        <div class=\"col-sm-6\">
            <div class=\"jumbotron\">
                <p>
                    ";
        // line 21
        echo $this->env->getExtension('translator')->trans("help.browse_app");
        echo "
                </p>
                <p>
                    <a class=\"btn btn-primary btn-lg\" href=\"";
        // line 24
        echo $this->env->getExtension('routing')->getPath("blog_index");
        echo "\">
                        <i class=\"fa fa-users\"></i> ";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("action.browse_app"), "html", null, true);
        echo "
                    </a>
                </p>
            </div>
        </div>

        <div class=\"col-sm-6\">
            <div class=\"jumbotron\">
                <p>
                    ";
        // line 34
        echo $this->env->getExtension('translator')->trans("help.browse_admin");
        echo "
                </p>
                <p>
                    <a class=\"btn btn-primary btn-lg\" href=\"";
        // line 37
        echo $this->env->getExtension('routing')->getPath("admin_index");
        echo "\">
                        <i class=\"fa fa-lock\"></i> ";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("action.browse_admin"), "html", null, true);
        echo "
                    </a>
                </p>
            </div>
        </div>
    </div>
";
        
        $__internal_07e9a61363f36c9b905be12764d27f9afffc911d93e72935d22782f582b14140->leave($__internal_07e9a61363f36c9b905be12764d27f9afffc911d93e72935d22782f582b14140_prof);

    }

    public function getTemplateName()
    {
        return "default/homepage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 38,  118 => 37,  112 => 34,  100 => 25,  96 => 24,  90 => 21,  80 => 14,  77 => 13,  71 => 12,  60 => 10,  49 => 9,  37 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block body_id 'homepage' %}*/
/* */
/* {#*/
/*     the homepage is a special page which displays neither a header nor a footer.*/
/*     this is done with the 'trick' of defining empty Twig blocks without any content*/
/* #}*/
/* {% block header %}{% endblock %}*/
/* {% block footer %}{% endblock %}*/
/* */
/* {% block body %}*/
/*     <div class="page-header">*/
/*         <h1>{{ 'title.homepage'|trans|raw }}</h1>*/
/*     </div>*/
/* */
/*     <div class="row">*/
/*         <div class="col-sm-6">*/
/*             <div class="jumbotron">*/
/*                 <p>*/
/*                     {{ 'help.browse_app'|trans|raw }}*/
/*                 </p>*/
/*                 <p>*/
/*                     <a class="btn btn-primary btn-lg" href="{{ path('blog_index') }}">*/
/*                         <i class="fa fa-users"></i> {{ 'action.browse_app'|trans }}*/
/*                     </a>*/
/*                 </p>*/
/*             </div>*/
/*         </div>*/
/* */
/*         <div class="col-sm-6">*/
/*             <div class="jumbotron">*/
/*                 <p>*/
/*                     {{ 'help.browse_admin'|trans|raw }}*/
/*                 </p>*/
/*                 <p>*/
/*                     <a class="btn btn-primary btn-lg" href="{{ path('admin_index') }}">*/
/*                         <i class="fa fa-lock"></i> {{ 'action.browse_admin'|trans }}*/
/*                     </a>*/
/*                 </p>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
/* */

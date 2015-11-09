<?php

/* admin/layout.html.twig */
class __TwigTemplate_4174e8847da47d9a9663348b89e84cfb229c96a574a1009537bc9c9cb2243e52 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 8
        $this->parent = $this->loadTemplate("base.html.twig", "admin/layout.html.twig", 8);
        $this->blocks = array(
            'header_navigation_links' => array($this, 'block_header_navigation_links'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_c097016aa2a684e07811e2147ca504934e169886bb34a59436bb55fa4cf02963 = $this->env->getExtension("native_profiler");
        $__internal_c097016aa2a684e07811e2147ca504934e169886bb34a59436bb55fa4cf02963->enter($__internal_c097016aa2a684e07811e2147ca504934e169886bb34a59436bb55fa4cf02963_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "admin/layout.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_c097016aa2a684e07811e2147ca504934e169886bb34a59436bb55fa4cf02963->leave($__internal_c097016aa2a684e07811e2147ca504934e169886bb34a59436bb55fa4cf02963_prof);

    }

    // line 10
    public function block_header_navigation_links($context, array $blocks = array())
    {
        $__internal_047918f7c6eff303af453dd6267ca27a3b505a4bdda8bab6248e9c4be673b836 = $this->env->getExtension("native_profiler");
        $__internal_047918f7c6eff303af453dd6267ca27a3b505a4bdda8bab6248e9c4be673b836->enter($__internal_047918f7c6eff303af453dd6267ca27a3b505a4bdda8bab6248e9c4be673b836_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "header_navigation_links"));

        // line 11
        echo "    <li>
        <a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("admin_post_index");
        echo "\">
            <i class=\"fa fa-list-alt\"></i> ";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("menu.post_list"), "html", null, true);
        echo "
        </a>
    </li>
    <li>
        <a href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("blog_index");
        echo "\">
            <i class=\"fa fa-home\"></i> ";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("menu.back_to_blog"), "html", null, true);
        echo "
        </a>
    </li>
";
        
        $__internal_047918f7c6eff303af453dd6267ca27a3b505a4bdda8bab6248e9c4be673b836->leave($__internal_047918f7c6eff303af453dd6267ca27a3b505a4bdda8bab6248e9c4be673b836_prof);

    }

    public function getTemplateName()
    {
        return "admin/layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 18,  54 => 17,  47 => 13,  43 => 12,  40 => 11,  34 => 10,  11 => 8,);
    }
}
/* {#*/
/*    This is the base template of the all backend pages. Since this layout is similar*/
/*    to the global layout, we inherit from it to just change the contents of some*/
/*    blocks. In practice, backend templates are using a three-level inheritance,*/
/*    showing how powerful, yet easy to use, is Twig's inheritance mechanism.*/
/*    See http://symfony.com/doc/current/book/templating.html#template-inheritance-and-layouts*/
/* #}*/
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block header_navigation_links %}*/
/*     <li>*/
/*         <a href="{{ path('admin_post_index') }}">*/
/*             <i class="fa fa-list-alt"></i> {{ 'menu.post_list'|trans }}*/
/*         </a>*/
/*     </li>*/
/*     <li>*/
/*         <a href="{{ path('blog_index') }}">*/
/*             <i class="fa fa-home"></i> {{ 'menu.back_to_blog'|trans }}*/
/*         </a>*/
/*     </li>*/
/* {% endblock %}*/
/* */

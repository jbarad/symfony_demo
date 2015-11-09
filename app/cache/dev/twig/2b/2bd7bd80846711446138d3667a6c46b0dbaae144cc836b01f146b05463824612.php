<?php

/* blog/index.html.twig */
class __TwigTemplate_e1b28d63b21c62a36ad03a65d7c2ae93f90563416c9e9fc90733b8094e8c84a9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "blog/index.html.twig", 1);
        $this->blocks = array(
            'body_id' => array($this, 'block_body_id'),
            'main' => array($this, 'block_main'),
            'sidebar' => array($this, 'block_sidebar'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_cf00a211300561bd65f70457b419d14e821a71a4b261b421fbaf059f7aa76edf = $this->env->getExtension("native_profiler");
        $__internal_cf00a211300561bd65f70457b419d14e821a71a4b261b421fbaf059f7aa76edf->enter($__internal_cf00a211300561bd65f70457b419d14e821a71a4b261b421fbaf059f7aa76edf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "blog/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_cf00a211300561bd65f70457b419d14e821a71a4b261b421fbaf059f7aa76edf->leave($__internal_cf00a211300561bd65f70457b419d14e821a71a4b261b421fbaf059f7aa76edf_prof);

    }

    // line 3
    public function block_body_id($context, array $blocks = array())
    {
        $__internal_d2a54ba2106d4c21839bccab4646f3f85c5d81a7985b7edc05d2b1752220af99 = $this->env->getExtension("native_profiler");
        $__internal_d2a54ba2106d4c21839bccab4646f3f85c5d81a7985b7edc05d2b1752220af99->enter($__internal_d2a54ba2106d4c21839bccab4646f3f85c5d81a7985b7edc05d2b1752220af99_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_id"));

        echo "blog_index";
        
        $__internal_d2a54ba2106d4c21839bccab4646f3f85c5d81a7985b7edc05d2b1752220af99->leave($__internal_d2a54ba2106d4c21839bccab4646f3f85c5d81a7985b7edc05d2b1752220af99_prof);

    }

    // line 5
    public function block_main($context, array $blocks = array())
    {
        $__internal_bf0631294c62ff11a7503fa395190fac4cf6be550d3a65e69b391e019f2e863b = $this->env->getExtension("native_profiler");
        $__internal_bf0631294c62ff11a7503fa395190fac4cf6be550d3a65e69b391e019f2e863b->enter($__internal_bf0631294c62ff11a7503fa395190fac4cf6be550d3a65e69b391e019f2e863b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 6
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["posts"]) ? $context["posts"] : $this->getContext($context, "posts")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 7
            echo "        <article class=\"post\">
            <h2>
                <a href=\"";
            // line 9
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("blog_post", array("slug" => $this->getAttribute($context["post"], "slug", array()))), "html", null, true);
            echo "\">
                    ";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "title", array()), "html", null, true);
            echo "
                </a>
            </h2>

            ";
            // line 14
            echo $this->env->getExtension('app.extension')->markdownToHtml($this->getAttribute($context["post"], "summary", array()));
            echo "
        </article>
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 17
            echo "        <div class=\"well\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("post.no_posts_found"), "html", null, true);
            echo "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "
    <div class=\"navigation text-center\">
        ";
        // line 21
        echo $this->env->getExtension('knp_pagination')->render((isset($context["posts"]) ? $context["posts"] : $this->getContext($context, "posts")));
        echo "
    </div>
";
        
        $__internal_bf0631294c62ff11a7503fa395190fac4cf6be550d3a65e69b391e019f2e863b->leave($__internal_bf0631294c62ff11a7503fa395190fac4cf6be550d3a65e69b391e019f2e863b_prof);

    }

    // line 25
    public function block_sidebar($context, array $blocks = array())
    {
        $__internal_78b3ef1f50d1b72e4378d62fb5ed94aa68f01c923dce57c0bb5a9c9e196803e2 = $this->env->getExtension("native_profiler");
        $__internal_78b3ef1f50d1b72e4378d62fb5ed94aa68f01c923dce57c0bb5a9c9e196803e2->enter($__internal_78b3ef1f50d1b72e4378d62fb5ed94aa68f01c923dce57c0bb5a9c9e196803e2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sidebar"));

        // line 26
        echo "    ";
        $this->displayParentBlock("sidebar", $context, $blocks);
        echo "

    ";
        // line 28
        echo $this->env->getExtension('code_explorer_source_code')->showSourceCode($this->env, $this);
        echo "
";
        
        $__internal_78b3ef1f50d1b72e4378d62fb5ed94aa68f01c923dce57c0bb5a9c9e196803e2->leave($__internal_78b3ef1f50d1b72e4378d62fb5ed94aa68f01c923dce57c0bb5a9c9e196803e2_prof);

    }

    public function getTemplateName()
    {
        return "blog/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 28,  112 => 26,  106 => 25,  96 => 21,  92 => 19,  83 => 17,  75 => 14,  68 => 10,  64 => 9,  60 => 7,  54 => 6,  48 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block body_id 'blog_index' %}*/
/* */
/* {% block main %}*/
/*     {% for post in posts %}*/
/*         <article class="post">*/
/*             <h2>*/
/*                 <a href="{{ path('blog_post', { slug: post.slug }) }}">*/
/*                     {{ post.title }}*/
/*                 </a>*/
/*             </h2>*/
/* */
/*             {{ post.summary|md2html }}*/
/*         </article>*/
/*     {% else %}*/
/*         <div class="well">{{ 'post.no_posts_found'|trans }}</div>*/
/*     {% endfor %}*/
/* */
/*     <div class="navigation text-center">*/
/*         {{ knp_pagination_render(posts) }}*/
/*     </div>*/
/* {% endblock %}*/
/* */
/* {% block sidebar %}*/
/*     {{ parent() }}*/
/* */
/*     {{ show_source_code(_self) }}*/
/* {% endblock %}*/
/* */

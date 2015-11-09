<?php

/* admin/blog/show.html.twig */
class __TwigTemplate_38797de29e36ef0c612964d48f447a3bd784add6fab4279ab6ee6ddcc58deedd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin/layout.html.twig", "admin/blog/show.html.twig", 1);
        $this->blocks = array(
            'body_id' => array($this, 'block_body_id'),
            'main' => array($this, 'block_main'),
            'sidebar' => array($this, 'block_sidebar'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_1f4249d66d187dc4aa15c47303c033a9984a585bce42701879d4237e11fb9776 = $this->env->getExtension("native_profiler");
        $__internal_1f4249d66d187dc4aa15c47303c033a9984a585bce42701879d4237e11fb9776->enter($__internal_1f4249d66d187dc4aa15c47303c033a9984a585bce42701879d4237e11fb9776_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "admin/blog/show.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_1f4249d66d187dc4aa15c47303c033a9984a585bce42701879d4237e11fb9776->leave($__internal_1f4249d66d187dc4aa15c47303c033a9984a585bce42701879d4237e11fb9776_prof);

    }

    // line 3
    public function block_body_id($context, array $blocks = array())
    {
        $__internal_f38de79ec78f42a6fb7f1d41abafc2337d837a7aa3b87cd4a7bfe8af566f91e8 = $this->env->getExtension("native_profiler");
        $__internal_f38de79ec78f42a6fb7f1d41abafc2337d837a7aa3b87cd4a7bfe8af566f91e8->enter($__internal_f38de79ec78f42a6fb7f1d41abafc2337d837a7aa3b87cd4a7bfe8af566f91e8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_id"));

        echo "admin_post_show";
        
        $__internal_f38de79ec78f42a6fb7f1d41abafc2337d837a7aa3b87cd4a7bfe8af566f91e8->leave($__internal_f38de79ec78f42a6fb7f1d41abafc2337d837a7aa3b87cd4a7bfe8af566f91e8_prof);

    }

    // line 5
    public function block_main($context, array $blocks = array())
    {
        $__internal_eb9858863afc01c3730c652f3d2187cf99b986ea19211f87686e2452bef1e752 = $this->env->getExtension("native_profiler");
        $__internal_eb9858863afc01c3730c652f3d2187cf99b986ea19211f87686e2452bef1e752->enter($__internal_eb9858863afc01c3730c652f3d2187cf99b986ea19211f87686e2452bef1e752_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 6
        echo "    <h1>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "title", array()), "html", null, true);
        echo "</h1>

    <table class=\"table\">
        <tbody>
            <tr>
                <th>";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("label.summary"), "html", null, true);
        echo "</th>
                <td>";
        // line 12
        echo $this->env->getExtension('app.extension')->markdownToHtml($this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "summary", array()));
        echo "</td>
            </tr>
            <tr>
                <th>";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("label.content"), "html", null, true);
        echo "</th>
                <td>";
        // line 16
        echo $this->env->getExtension('app.extension')->markdownToHtml($this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "content", array()));
        echo "</td>
            </tr>
            <tr>
                <th>";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("label.author"), "html", null, true);
        echo "</th>
                <td><p>";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "authorEmail", array()), "html", null, true);
        echo "</p></td>
            </tr>
            <tr>
                <th>";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("label.published_at"), "html", null, true);
        echo "</th>
                <td><p>";
        // line 24
        echo twig_escape_filter($this->env, twig_localized_date_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "publishedAt", array()), "long", "medium"), "html", null, true);
        echo "</p></td>
            </tr>
        </tbody>
    </table>
";
        
        $__internal_eb9858863afc01c3730c652f3d2187cf99b986ea19211f87686e2452bef1e752->leave($__internal_eb9858863afc01c3730c652f3d2187cf99b986ea19211f87686e2452bef1e752_prof);

    }

    // line 30
    public function block_sidebar($context, array $blocks = array())
    {
        $__internal_71b345a155b9e6600628e71145c83ecebbe4d78eaf738ed5dff5aba453dfc502 = $this->env->getExtension("native_profiler");
        $__internal_71b345a155b9e6600628e71145c83ecebbe4d78eaf738ed5dff5aba453dfc502->enter($__internal_71b345a155b9e6600628e71145c83ecebbe4d78eaf738ed5dff5aba453dfc502_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sidebar"));

        // line 31
        echo "    <div class=\"section\">
        <a href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_post_edit", array("id" => $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "id", array()))), "html", null, true);
        echo "\" class=\"btn btn-lg btn-block btn-success\">
            <i class=\"fa fa-edit\"></i> ";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("action.edit_contents"), "html", null, true);
        echo "
        </a>
    </div>

    <div class=\"section\">
        ";
        // line 38
        echo twig_include($this->env, $context, "admin/blog/_form.html.twig", array("form" =>         // line 39
(isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), "button_label" => $this->env->getExtension('translator')->trans("action.delete_post"), "button_css" => "btn btn-lg btn-block btn-danger", "show_confirmation" => true), false);
        // line 43
        echo "
    </div>

    ";
        // line 46
        echo $this->env->getExtension('code_explorer_source_code')->showSourceCode($this->env, $this);
        echo "
";
        
        $__internal_71b345a155b9e6600628e71145c83ecebbe4d78eaf738ed5dff5aba453dfc502->leave($__internal_71b345a155b9e6600628e71145c83ecebbe4d78eaf738ed5dff5aba453dfc502_prof);

    }

    public function getTemplateName()
    {
        return "admin/blog/show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 46,  133 => 43,  131 => 39,  130 => 38,  122 => 33,  118 => 32,  115 => 31,  109 => 30,  97 => 24,  93 => 23,  87 => 20,  83 => 19,  77 => 16,  73 => 15,  67 => 12,  63 => 11,  54 => 6,  48 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends 'admin/layout.html.twig' %}*/
/* */
/* {% block body_id 'admin_post_show' %}*/
/* */
/* {% block main %}*/
/*     <h1>{{ post.title }}</h1>*/
/* */
/*     <table class="table">*/
/*         <tbody>*/
/*             <tr>*/
/*                 <th>{{ 'label.summary'|trans }}</th>*/
/*                 <td>{{ post.summary|md2html }}</td>*/
/*             </tr>*/
/*             <tr>*/
/*                 <th>{{ 'label.content'|trans }}</th>*/
/*                 <td>{{ post.content|md2html }}</td>*/
/*             </tr>*/
/*             <tr>*/
/*                 <th>{{ 'label.author'|trans }}</th>*/
/*                 <td><p>{{ post.authorEmail }}</p></td>*/
/*             </tr>*/
/*             <tr>*/
/*                 <th>{{ 'label.published_at'|trans }}</th>*/
/*                 <td><p>{{ post.publishedAt|localizeddate('long', 'medium') }}</p></td>*/
/*             </tr>*/
/*         </tbody>*/
/*     </table>*/
/* {% endblock %}*/
/* */
/* {% block sidebar %}*/
/*     <div class="section">*/
/*         <a href="{{ path('admin_post_edit', { id: post.id }) }}" class="btn btn-lg btn-block btn-success">*/
/*             <i class="fa fa-edit"></i> {{ 'action.edit_contents'|trans }}*/
/*         </a>*/
/*     </div>*/
/* */
/*     <div class="section">*/
/*         {{ include('admin/blog/_form.html.twig', {*/
/*             form: delete_form,*/
/*             button_label: 'action.delete_post'|trans,*/
/*             button_css: 'btn btn-lg btn-block btn-danger',*/
/*             show_confirmation: true,*/
/*         }, with_context = false) }}*/
/*     </div>*/
/* */
/*     {{ show_source_code(_self) }}*/
/* {% endblock %}*/
/* */

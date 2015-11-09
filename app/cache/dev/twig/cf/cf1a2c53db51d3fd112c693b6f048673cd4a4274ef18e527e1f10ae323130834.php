<?php

/* security/login.html.twig */
class __TwigTemplate_8633438954dd78cc3f693e9818d06f7240077763f61ace4bc4bf68072aef9ac9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "security/login.html.twig", 1);
        $this->blocks = array(
            'body_id' => array($this, 'block_body_id'),
            'main' => array($this, 'block_main'),
            'sidebar' => array($this, 'block_sidebar'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_dcf42111be17186356a451934dde4fb7236bff392829339221b7d53221a7de21 = $this->env->getExtension("native_profiler");
        $__internal_dcf42111be17186356a451934dde4fb7236bff392829339221b7d53221a7de21->enter($__internal_dcf42111be17186356a451934dde4fb7236bff392829339221b7d53221a7de21_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_dcf42111be17186356a451934dde4fb7236bff392829339221b7d53221a7de21->leave($__internal_dcf42111be17186356a451934dde4fb7236bff392829339221b7d53221a7de21_prof);

    }

    // line 3
    public function block_body_id($context, array $blocks = array())
    {
        $__internal_f182523e31c75bf1cf3da042649ffdc644474504322c2786313920051665b68f = $this->env->getExtension("native_profiler");
        $__internal_f182523e31c75bf1cf3da042649ffdc644474504322c2786313920051665b68f->enter($__internal_f182523e31c75bf1cf3da042649ffdc644474504322c2786313920051665b68f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_id"));

        echo "login";
        
        $__internal_f182523e31c75bf1cf3da042649ffdc644474504322c2786313920051665b68f->leave($__internal_f182523e31c75bf1cf3da042649ffdc644474504322c2786313920051665b68f_prof);

    }

    // line 5
    public function block_main($context, array $blocks = array())
    {
        $__internal_bc0e028e126d96dccf0ab128b5f125d95ee016f7fbef766f646c69b29e9e8f54 = $this->env->getExtension("native_profiler");
        $__internal_bc0e028e126d96dccf0ab128b5f125d95ee016f7fbef766f646c69b29e9e8f54->enter($__internal_bc0e028e126d96dccf0ab128b5f125d95ee016f7fbef766f646c69b29e9e8f54_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 6
        echo "    ";
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 7
            echo "        <div class=\"alert alert-danger\">
            ";
            // line 8
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageKey", array()), $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageData", array()), "security"), "html", null, true);
            echo "
        </div>
    ";
        }
        // line 11
        echo "
    <div class=\"row\">
        <div class=\"col-sm-5\">
            <div class=\"well\">
                <form action=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("security_login_check");
        echo "\" method=\"post\">
                    <fieldset>
                        <legend><i class=\"fa fa-lock\"></i> ";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("title.login"), "html", null, true);
        echo "</legend>
                        <div class=\"form-group\">
                            <label for=\"username\">";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("label.username"), "html", null, true);
        echo "</label>
                            <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 20
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\" class=\"form-control\"/>
                        </div>
                        <div class=\"form-group\">
                            <label for=\"password\">";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("label.password"), "html", null, true);
        echo "</label>
                            <input type=\"password\" id=\"password\" name=\"_password\" class=\"form-control\" />
                        </div>
                        <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('form')->renderCsrfToken("authenticate"), "html", null, true);
        echo "\"/>
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"fa fa-sign-in\"></i> ";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("action.sign_in"), "html", null, true);
        echo "
                        </button>
                    </fieldset>
                </form>
            </div>
        </div>

        <div id=\"login-help\" class=\"col-sm-7\">
            <h3>
                <i class=\"fa fa-long-arrow-left\"></i>
                ";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("help.login_users"), "html", null, true);
        echo "
            </h3>

            <table class=\"table table-striped table-bordered table-hover\">
                <thead>
                    <tr>
                        <th>";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("label.username"), "html", null, true);
        echo "</th>
                        <th>";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("label.password"), "html", null, true);
        echo "</th>
                        <th>";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("label.role"), "html", null, true);
        echo "</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>john_user</td>
                        <td>kitten</td>
                        <td><code>ROLE_USER</code> (";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("help.role_user"), "html", null, true);
        echo ")</td>
                    </tr>
                    <tr>
                        <td>anna_admin</td>
                        <td>kitten</td>
                        <td><code>ROLE_ADMIN</code> (";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("help.role_admin"), "html", null, true);
        echo ")</td>
                    </tr>
                </tbody>
            </table>

            <div id=\"login-users-help\" class=\"panel panel-default\">
                <div class=\"panel-body\">
                    <p>
                        <span class=\"label label-success\">";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("note"), "html", null, true);
        echo "</span>
                        ";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("help.reload_fixtures"), "html", null, true);
        echo "<br/>

                        <code class=\"console\">\$ php app/console doctrine:fixtures:load</code>
                    </p>

                    <p>
                        <span class=\"label label-success\">";
        // line 73
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("tip"), "html", null, true);
        echo "</span>
                        ";
        // line 74
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("help.add_user"), "html", null, true);
        echo "<br/>

                        <code class=\"console\">\$ php app/console app:add-user</code>
                    </p>
                </div>
            </div>
        </div>
    </div>
";
        
        $__internal_bc0e028e126d96dccf0ab128b5f125d95ee016f7fbef766f646c69b29e9e8f54->leave($__internal_bc0e028e126d96dccf0ab128b5f125d95ee016f7fbef766f646c69b29e9e8f54_prof);

    }

    // line 83
    public function block_sidebar($context, array $blocks = array())
    {
        $__internal_8a06a08e7dd4b4706ea97778f3aefdae862968cf5194b55b41977b512335f82f = $this->env->getExtension("native_profiler");
        $__internal_8a06a08e7dd4b4706ea97778f3aefdae862968cf5194b55b41977b512335f82f->enter($__internal_8a06a08e7dd4b4706ea97778f3aefdae862968cf5194b55b41977b512335f82f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sidebar"));

        // line 84
        echo "
    ";
        // line 85
        $this->displayParentBlock("sidebar", $context, $blocks);
        echo "

    ";
        // line 87
        echo $this->env->getExtension('code_explorer_source_code')->showSourceCode($this->env, $this);
        echo "
";
        
        $__internal_8a06a08e7dd4b4706ea97778f3aefdae862968cf5194b55b41977b512335f82f->leave($__internal_8a06a08e7dd4b4706ea97778f3aefdae862968cf5194b55b41977b512335f82f_prof);

    }

    // line 90
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_80777a62b691b5eb79de95f9d098910ae13d4693d33aca29267589f937e75684 = $this->env->getExtension("native_profiler");
        $__internal_80777a62b691b5eb79de95f9d098910ae13d4693d33aca29267589f937e75684->enter($__internal_80777a62b691b5eb79de95f9d098910ae13d4693d33aca29267589f937e75684_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 91
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

    <script>
        \$(document).ready(function() {
            \$('#username').val('anna_admin');
            \$('#password').val('kitten');
        });
    </script>
";
        
        $__internal_80777a62b691b5eb79de95f9d098910ae13d4693d33aca29267589f937e75684->leave($__internal_80777a62b691b5eb79de95f9d098910ae13d4693d33aca29267589f937e75684_prof);

    }

    public function getTemplateName()
    {
        return "security/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  225 => 91,  219 => 90,  210 => 87,  205 => 85,  202 => 84,  196 => 83,  180 => 74,  176 => 73,  167 => 67,  163 => 66,  152 => 58,  144 => 53,  134 => 46,  130 => 45,  126 => 44,  117 => 38,  104 => 28,  99 => 26,  93 => 23,  87 => 20,  83 => 19,  78 => 17,  73 => 15,  67 => 11,  61 => 8,  58 => 7,  55 => 6,  49 => 5,  37 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block body_id 'login' %}*/
/* */
/* {% block main %}*/
/*     {% if error %}*/
/*         <div class="alert alert-danger">*/
/*             {{ error.messageKey|trans(error.messageData, 'security') }}*/
/*         </div>*/
/*     {% endif %}*/
/* */
/*     <div class="row">*/
/*         <div class="col-sm-5">*/
/*             <div class="well">*/
/*                 <form action="{{ path('security_login_check') }}" method="post">*/
/*                     <fieldset>*/
/*                         <legend><i class="fa fa-lock"></i> {{ 'title.login'|trans }}</legend>*/
/*                         <div class="form-group">*/
/*                             <label for="username">{{ 'label.username'|trans }}</label>*/
/*                             <input type="text" id="username" name="_username" value="{{ last_username }}" class="form-control"/>*/
/*                         </div>*/
/*                         <div class="form-group">*/
/*                             <label for="password">{{ 'label.password'|trans }}</label>*/
/*                             <input type="password" id="password" name="_password" class="form-control" />*/
/*                         </div>*/
/*                         <input type="hidden" name="_csrf_token" value="{{ csrf_token('authenticate') }}"/>*/
/*                         <button type="submit" class="btn btn-primary">*/
/*                             <i class="fa fa-sign-in"></i> {{ 'action.sign_in'|trans }}*/
/*                         </button>*/
/*                     </fieldset>*/
/*                 </form>*/
/*             </div>*/
/*         </div>*/
/* */
/*         <div id="login-help" class="col-sm-7">*/
/*             <h3>*/
/*                 <i class="fa fa-long-arrow-left"></i>*/
/*                 {{ 'help.login_users'|trans }}*/
/*             </h3>*/
/* */
/*             <table class="table table-striped table-bordered table-hover">*/
/*                 <thead>*/
/*                     <tr>*/
/*                         <th>{{ 'label.username'|trans }}</th>*/
/*                         <th>{{ 'label.password'|trans }}</th>*/
/*                         <th>{{ 'label.role'|trans }}</th>*/
/*                     </tr>*/
/*                 </thead>*/
/*                 <tbody>*/
/*                     <tr>*/
/*                         <td>john_user</td>*/
/*                         <td>kitten</td>*/
/*                         <td><code>ROLE_USER</code> ({{ 'help.role_user'|trans }})</td>*/
/*                     </tr>*/
/*                     <tr>*/
/*                         <td>anna_admin</td>*/
/*                         <td>kitten</td>*/
/*                         <td><code>ROLE_ADMIN</code> ({{ 'help.role_admin'|trans }})</td>*/
/*                     </tr>*/
/*                 </tbody>*/
/*             </table>*/
/* */
/*             <div id="login-users-help" class="panel panel-default">*/
/*                 <div class="panel-body">*/
/*                     <p>*/
/*                         <span class="label label-success">{{ 'note'|trans }}</span>*/
/*                         {{ 'help.reload_fixtures'|trans }}<br/>*/
/* */
/*                         <code class="console">$ php app/console doctrine:fixtures:load</code>*/
/*                     </p>*/
/* */
/*                     <p>*/
/*                         <span class="label label-success">{{ 'tip'|trans }}</span>*/
/*                         {{ 'help.add_user'|trans }}<br/>*/
/* */
/*                         <code class="console">$ php app/console app:add-user</code>*/
/*                     </p>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
/* {% block sidebar %}*/
/* */
/*     {{ parent() }}*/
/* */
/*     {{ show_source_code(_self) }}*/
/* {% endblock %}*/
/* */
/* {% block javascripts %}*/
/*     {{ parent() }}*/
/* */
/*     <script>*/
/*         $(document).ready(function() {*/
/*             $('#username').val('anna_admin');*/
/*             $('#password').val('kitten');*/
/*         });*/
/*     </script>*/
/* {% endblock %}*/
/* */

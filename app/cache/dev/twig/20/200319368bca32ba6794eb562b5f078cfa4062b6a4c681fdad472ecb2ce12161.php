<?php

/* default/_flash_messages.html.twig */
class __TwigTemplate_7df5062348ddb004e4c39ab2f5b860ce385a5673ddf0a84f3987af07d60ecb85 extends Twig_Template
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
        $__internal_76330cdbfb973985d0e70bdb964469aa514b159f3100f0d71bfe6ca024028ff5 = $this->env->getExtension("native_profiler");
        $__internal_76330cdbfb973985d0e70bdb964469aa514b159f3100f0d71bfe6ca024028ff5->enter($__internal_76330cdbfb973985d0e70bdb964469aa514b159f3100f0d71bfe6ca024028ff5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "default/_flash_messages.html.twig"));

        // line 9
        echo "
";
        // line 10
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "started", array())) {
            // line 11
            echo "    <div class=\"messages\">
        ";
            // line 12
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashBag", array()), "get", array(0 => "success"), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 13
                echo "            ";
                // line 14
                echo "            <div class=\"alert alert-dismissible alert-success\" role=\"alert\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                </button>

                ";
                // line 19
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["message"]), "html", null, true);
                echo "
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 22
            echo "    </div>
";
        }
        
        $__internal_76330cdbfb973985d0e70bdb964469aa514b159f3100f0d71bfe6ca024028ff5->leave($__internal_76330cdbfb973985d0e70bdb964469aa514b159f3100f0d71bfe6ca024028ff5_prof);

    }

    public function getTemplateName()
    {
        return "default/_flash_messages.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 22,  43 => 19,  36 => 14,  34 => 13,  30 => 12,  27 => 11,  25 => 10,  22 => 9,);
    }
}
/* {#*/
/*    This is a template fragment designed to be included in other templates*/
/*    See http://symfony.com/doc/current/book/templating.html#including-other-templates*/
/* */
/*    A common practice to better distinguish between templates and fragments is to*/
/*    prefix fragments with an underscore. That's why this template is called*/
/*    '_flash_messages.html.twig' instead of 'flash_messages.html.twig'*/
/* #}*/
/* */
/* {% if app.session.started %}*/
/*     <div class="messages">*/
/*         {% for message in app.session.flashBag.get('success') %}*/
/*             {# Bootstrap alert, see http://getbootstrap.com/components/#alerts #}*/
/*             <div class="alert alert-dismissible alert-success" role="alert">*/
/*                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">*/
/*                     <span aria-hidden="true">&times;</span>*/
/*                 </button>*/
/* */
/*                 {{ message|trans }}*/
/*             </div>*/
/*         {% endfor %}*/
/*     </div>*/
/* {% endif %}*/
/* */

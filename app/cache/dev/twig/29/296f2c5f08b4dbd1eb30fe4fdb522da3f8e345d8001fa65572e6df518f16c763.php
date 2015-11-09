<?php

/* form/fields.html.twig */
class __TwigTemplate_1a2fb9ab4107e64efa24f21c114892328ece411419301e652657fc067ce8edc2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'app_datetimepicker_widget' => array($this, 'block_app_datetimepicker_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_0d612731d530445ce83fd4c421226a7a1f02e77901081a7f1f2858e6ec5999ac = $this->env->getExtension("native_profiler");
        $__internal_0d612731d530445ce83fd4c421226a7a1f02e77901081a7f1f2858e6ec5999ac->enter($__internal_0d612731d530445ce83fd4c421226a7a1f02e77901081a7f1f2858e6ec5999ac_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "form/fields.html.twig"));

        // line 7
        echo "
";
        // line 8
        $this->displayBlock('app_datetimepicker_widget', $context, $blocks);
        
        $__internal_0d612731d530445ce83fd4c421226a7a1f02e77901081a7f1f2858e6ec5999ac->leave($__internal_0d612731d530445ce83fd4c421226a7a1f02e77901081a7f1f2858e6ec5999ac_prof);

    }

    public function block_app_datetimepicker_widget($context, array $blocks = array())
    {
        $__internal_03b62b12f15dfffd06fc2a1a81cdb78d084f474d288415fe0e16ebfeb564f3e7 = $this->env->getExtension("native_profiler");
        $__internal_03b62b12f15dfffd06fc2a1a81cdb78d084f474d288415fe0e16ebfeb564f3e7->enter($__internal_03b62b12f15dfffd06fc2a1a81cdb78d084f474d288415fe0e16ebfeb564f3e7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "app_datetimepicker_widget"));

        // line 9
        echo "    ";
        ob_start();
        // line 10
        echo "        <div class=\"input-group date\" data-toggle=\"datetimepicker\">
            ";
        // line 11
        $this->displayBlock("datetime_widget", $context, $blocks);
        echo "
            <span class=\"input-group-addon\">
                <span class=\"fa fa-calendar\"></span>
            </span>
        </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_03b62b12f15dfffd06fc2a1a81cdb78d084f474d288415fe0e16ebfeb564f3e7->leave($__internal_03b62b12f15dfffd06fc2a1a81cdb78d084f474d288415fe0e16ebfeb564f3e7_prof);

    }

    public function getTemplateName()
    {
        return "form/fields.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  44 => 11,  41 => 10,  38 => 9,  26 => 8,  23 => 7,);
    }
}
/* {#*/
/*    Each field type is rendered by a template fragment, which is determined*/
/*    by the value of your getName() method and the suffix _widget.*/
/* */
/*    See http://symfony.com/doc/current/cookbook/form/create_custom_field_type.html#creating-a-template-for-the-field*/
/* #}*/
/* */
/* {% block app_datetimepicker_widget %}*/
/*     {% spaceless %}*/
/*         <div class="input-group date" data-toggle="datetimepicker">*/
/*             {{ block('datetime_widget') }}*/
/*             <span class="input-group-addon">*/
/*                 <span class="fa fa-calendar"></span>*/
/*             </span>*/
/*         </div>*/
/*     {% endspaceless %}*/
/* {% endblock %}*/
/* */

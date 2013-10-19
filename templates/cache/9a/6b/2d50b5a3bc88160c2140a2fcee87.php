<?php

/* new_user_response.html */
class __TwigTemplate_9a6b2d50b5a3bc88160c2140a2fcee87 extends Twig_Template
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
        $this->env->loadTemplate("_head.html")->display($context);
        // line 2
        $this->env->loadTemplate("_header.html")->display($context);
        // line 3
        $this->env->loadTemplate("_left_sidebar.html")->display($context);
        // line 4
        $this->env->loadTemplate("_right_sidebar.html")->display($context);
        // line 5
        echo "
      <div id=\"content\">
        <div class=\"well\">
          <h3>Thank you</h3>
            <div class=\"alert alert-success\">
              <strong>Well done!</strong> You successfully sign up
            </div>
            Check your email inbox in order to verify your account of vocabulary.gr
        </div> 
      </div><!--/#content-->
      <div class=\"clearfix\"></div>
      
";
        // line 17
        $this->env->loadTemplate("_footer.html")->display($context);
        // line 18
        echo "  <script src=\"js/lib/require.js\"></script>
  <script src=\"js/home.js\"></script>
";
        // line 20
        $this->env->loadTemplate("_bottom.html")->display($context);
    }

    public function getTemplateName()
    {
        return "new_user_response.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 20,  43 => 18,  41 => 17,  27 => 5,  25 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}

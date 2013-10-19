<?php

/* remindme_response.html */
class __TwigTemplate_f159c65aa60eff2342aa11dbe085b27a extends Twig_Template
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
        echo "      <div id=\"content\">
        <div class=\"well\">
            <h3>Forgot Your Password?</h3>
            
            <div class=\"alert alert-success\">
              <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
              <h4>Success!</h4>
              vocabulary.gr reminds your password! Check your email inbox.        
            </div>
            <center><a href=\"/login\">Now you can log in</a></center>
        </div> 
      </div><!--/#content-->
      <div class=\"clearfix\"></div>
";
        // line 18
        $this->env->loadTemplate("_footer.html")->display($context);
        // line 19
        echo "    
  <script src=\"js/lib/require.js\"></script>
  <script src=\"js/home.js\"></script>
";
        // line 22
        $this->env->loadTemplate("_bottom.html")->display($context);
    }

    public function getTemplateName()
    {
        return "remindme_response.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 22,  44 => 19,  42 => 18,  27 => 5,  25 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}

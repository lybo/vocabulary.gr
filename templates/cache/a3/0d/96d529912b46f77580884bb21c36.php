<?php

/* verify_response.html */
class __TwigTemplate_a30d96d529912b46f77580884bb21c36 extends Twig_Template
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
          ";
        // line 7
        if (isset($context["is_activated"])) { $_is_activated_ = $context["is_activated"]; } else { $_is_activated_ = null; }
        if (($_is_activated_ == 1)) {
            // line 8
            echo "            <h3>Your account has been activated</h3>
            <div class=\"alert alert-success\">
              <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
              <h4>Success!</h4>
              You can log in now
            </div>
          ";
        } else {
            // line 15
            echo "            ";
            if (isset($context["has_allready_activated"])) { $_has_allready_activated_ = $context["has_allready_activated"]; } else { $_has_allready_activated_ = null; }
            if (($_has_allready_activated_ == 0)) {
                // line 16
                echo "              <h3>Your account hasn't been activated</h3>
              <div class=\"alert alert-error\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                <h4>Error</h4>
                It has been occured an error on your activation. Try again.      
              </div>
            ";
            } else {
                // line 23
                echo "              <h3>Your account has allready been activated</h3>
              <div class=\"alert alert-info\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                <h4>Info</h4>
                Your account has allready been activated. <br/><br/><a href=\"/remindme\"><strong>If you don't remember your password click here.</strong></a>    
              </div>
            ";
            }
            // line 30
            echo "          ";
        }
        // line 31
        echo "        </div> 
      </div><!--/#content-->
      <div class=\"clearfix\"></div>
";
        // line 34
        $this->env->loadTemplate("_footer.html")->display($context);
        // line 35
        echo "    
  <script src=\"js/lib/require.js\"></script>
  <script src=\"js/home.js\"></script>
";
        // line 38
        $this->env->loadTemplate("_bottom.html")->display($context);
    }

    public function getTemplateName()
    {
        return "verify_response.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 38,  75 => 35,  73 => 34,  68 => 31,  65 => 30,  56 => 23,  47 => 16,  43 => 15,  34 => 8,  31 => 7,  27 => 5,  25 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}

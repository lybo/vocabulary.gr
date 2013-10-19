<?php

/* remindme.html */
class __TwigTemplate_c94b1dae1f92574f472730034912d543 extends Twig_Template
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
            ";
        // line 8
        if (isset($context["no_email"])) { $_no_email_ = $context["no_email"]; } else { $_no_email_ = null; }
        if ($_no_email_) {
            // line 9
            echo "            <div class=\"alert alert-error\">
              <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
              <h4>Error!</h4>
              There isn't the email that you type. Try again!
            </div>
            ";
        }
        // line 15
        echo "            <form method=\"post\" action=\"/remindme\">
              Enter your email address below and we'll send you  your password.
              <input type=\"text\" id=\"remindMeEmail\" name=\"remindMeEmail\" placeholder=\"Email\" class=\"span4\"/>
              <button class=\"btn btn-large btn-primary\" type=\"submit\">Send</button>
            </form>
        </div> 
      </div><!--/#content-->
      <div class=\"clearfix\"></div>
";
        // line 23
        $this->env->loadTemplate("_footer.html")->display($context);
        // line 24
        echo "    
  <script src=\"js/lib/require.js\"></script>
  <script src=\"js/home.js\"></script>
";
        // line 27
        $this->env->loadTemplate("_bottom.html")->display($context);
    }

    public function getTemplateName()
    {
        return "remindme.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 27,  55 => 24,  53 => 23,  43 => 15,  35 => 9,  32 => 8,  27 => 5,  25 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}

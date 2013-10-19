<?php

/* login.html */
class __TwigTemplate_d066028eb46af6f5cb2d9834eebecc1c extends Twig_Template
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
            <h3>Log In</h3>
            
            ";
        // line 9
        if ((isset($context["login_error"]) ? $context["login_error"] : null)) {
            // line 10
            echo "              
              <div class=\"alert alert-error\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                <h4>Log In Error</h4>
                Invalid username or password. Try again.    
              </div>
            ";
        }
        // line 17
        echo "
            <form id=\"complete-login-form\" method=\"post\" action=\"/login\">
              <input type=\"text\" id=\"completeLoginEmail\" name=\"email\" placeholder=\"Email\" class=\"span4\"/>
              <input type=\"password\" id=\"completeLoginpassword\" name=\"password\" placeholder=\"Password\" class=\"span4\" />
              <br/><br/>
              <label class=\"checkbox\">
                  <input type=\"checkbox\" value=\"remember-me\"> Remember&nbsp;me
              </label>
              <a href=\"/remindme\" class=\"\">Forgot your password?</a>
              <br/><br/>
              <button class=\"btn btn-large btn-primary\" type=\"submit\">Log In</button>

              or <a href=\"/signup\">register for a Vocabulary.gr account</a>
            </form>
        </div> 
      </div><!--/#content-->
      <div class=\"clearfix\"></div>
";
        // line 34
        $this->env->loadTemplate("_footer.html")->display($context);
        // line 35
        echo "    
  <script src=\"js/lib/require.js\"></script>
  <script src=\"js/login.js\"></script>
";
        // line 38
        $this->env->loadTemplate("_bottom.html")->display($context);
    }

    public function getTemplateName()
    {
        return "login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 38,  65 => 35,  63 => 34,  44 => 17,  35 => 10,  33 => 9,  27 => 5,  25 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}

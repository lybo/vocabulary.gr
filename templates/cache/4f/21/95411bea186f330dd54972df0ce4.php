<?php

/* signup.html */
class __TwigTemplate_4f2195411bea186f330dd54972df0ce4 extends Twig_Template
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
        echo " 
";
        // line 2
        $this->env->loadTemplate("_header.html")->display($context);
        // line 3
        $this->env->loadTemplate("_left_sidebar.html")->display($context);
        // line 4
        $this->env->loadTemplate("_right_sidebar.html")->display($context);
        // line 5
        echo "      <div id=\"content\">
        <div class=\"well\">
            <h3>Sign Up</h3>
            <form id=\"form-signup-individual\" class=\"form-signup-individual\" autocomplete=\"off\" method=\"post\" action=\"/users\" />
              <div>
                <input type=\"text\" id=\"signUpemail\" name=\"signUpemail\" class=\"input-block-level\" placeholder=\"Email address\" >
              </div>
              <input type=\"password\" id=\"signUppassword\" name=\"signUppassword\" class=\"input-block-level\" placeholder=\"Password\" >
              <input type=\"password\" id=\"signUppassword2\" name=\"signUppassword2\" class=\"input-block-level\" placeholder=\"Confirm Password\"  >
              <select class=\"input-block-level\" id=\"signUpLanguage\" name=\"signUpLanguage\" >
                <option value=\"\">Select your native Language</option>
                ";
        // line 16
        if (isset($context["langs"])) { $_langs_ = $context["langs"]; } else { $_langs_ = null; }
        if ((twig_length_filter($this->env, $_langs_) > 0)) {
            // line 17
            echo "                ";
            if (isset($context["langs"])) { $_langs_ = $context["langs"]; } else { $_langs_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($_langs_);
            foreach ($context['_seq'] as $context["_key"] => $context["lang"]) {
                // line 18
                echo "                <option value=\"";
                if (isset($context["lang"])) { $_lang_ = $context["lang"]; } else { $_lang_ = null; }
                echo $this->getAttribute($_lang_, "id");
                echo "\">";
                if (isset($context["lang"])) { $_lang_ = $context["lang"]; } else { $_lang_ = null; }
                echo $this->getAttribute($_lang_, "title");
                echo "</option>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lang'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 20
            echo "                ";
        }
        // line 21
        echo "              </select>
              <button class=\"btn btn-large btn-primary\" type=\"submit\">Sign Up</button> 
              <label class=\"checkbox inline\" style=\"margin:0 0 0 30px;\">
                  <span>I agree to the <a href=\"termsandconditions\">Terms & Conditions</a>.</span>
                  <input type=\"checkbox\" name=\"agree\" value=\"1\">
              </label>
              <center><br/>If you have already an account <a href=\"/login\">log in</a></center>
            </form>
        </div> 
      </div><!--/#content-->
      <div class=\"clearfix\"></div>
";
        // line 32
        $this->env->loadTemplate("_footer.html")->display($context);
        // line 33
        echo "    
  <script src=\"js/lib/require.js\"></script>
  <script src=\"js/home.js\"></script>
";
        // line 36
        $this->env->loadTemplate("_bottom.html")->display($context);
    }

    public function getTemplateName()
    {
        return "signup.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 36,  82 => 33,  80 => 32,  67 => 21,  64 => 20,  51 => 18,  45 => 17,  42 => 16,  29 => 5,  27 => 4,  25 => 3,  23 => 2,  19 => 1,);
    }
}

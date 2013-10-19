<?php

/* index.html */
class __TwigTemplate_fb5aa1cd1261d08d02db6f7dc314d9ab extends Twig_Template
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
        echo "      <div id=\"content\" class=\"large\">
        <div class=\"row-fluid\">
          <div class=\"span12\">
            <h3 style=\"text-align: center;\"><!-- <img src=\"images/logo-small.png\" style=\"margin: -23px -25px 0 0;\"  />-->Vocabulary.gr helps you study foreign languages</h3> 
          </div>
        </div>
        <div class=\"row-fluid\">
          <div class=\"span6\">
            <a href=\"#whatisvocabulary\" id=\"video-button-home\" data-toggle=\"modal\">
              <img src=\"/images/video_thumb.jpg\" />
              <span class=\"explanation\">Watch<br/>what is vocabulary.gr</span>
              <span class=\"play-button\"></span>
            </a>

            <div id=\"whatisvocabulary\" class=\"modal hide fade\" style=\"width:600px;\">
              <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
                <h3>What is vocabulary.gr?</h3>
              </div>
              <div class=\"modal-body\">
                <!-- ";
        // line 24
        if (((isset($context["hasvisited"]) ? $context["hasvisited"] : null) == 0)) {
            echo "?rel=0&autoplay=1";
        }
        echo " -->
                
                
              </div>
              
            </div>
            
          </div>
          <div class=\"span6\">
            <div class=\"well\" >
              <div style=\"height:152px;\">
                <h3>Do you want see how it works in practice?</h3>
                <br/> 
                <center><a href=\"/exercise/123\" class=\"btn btn-large btn-primary\">Check a vocabulary</a></center>
              </div>
            </div>
          </div>
        </div>
        <div class=\"row-fluid\">
          <div class=\"span12\">
            <div class=\"well\">

            \t";
        // line 46
        if (((isset($context["is_logged"]) ? $context["is_logged"] : null) != 1)) {
            // line 47
            echo "                      <h2 class=\"form-signup-heading\">Sign up</h2>
                      <h5>It’s free and always will be.</h5>
                      <form id=\"form-signup-individual\" class=\"form-signup-individual\" autocomplete=\"off\" method=\"post\" action=\"/users\" />
                        <div>
                          <input type=\"text\" id=\"signUpemail\" name=\"signUpemail\" class=\"input-block-level\" placeholder=\"Email address\" >
                        </div>
                        <input type=\"password\" id=\"signUppassword\" name=\"signUppassword\" class=\"input-block-level\" placeholder=\"Password\" >
                        <input type=\"password\" id=\"signUppassword2\" name=\"signUppassword2\" class=\"input-block-level\" placeholder=\"Confirm Password\"  >
                        <select class=\"input-block-level\" id=\"signUpLanguage\" name=\"signUpLanguage\" >
                          <option value=\"\">Select your native Language</option>
                          ";
            // line 57
            if ((twig_length_filter($this->env, (isset($context["langs"]) ? $context["langs"] : null)) > 0)) {
                // line 58
                echo "                          ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["langs"]) ? $context["langs"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["lang"]) {
                    // line 59
                    echo "                          <option value=\"";
                    echo $this->getAttribute((isset($context["lang"]) ? $context["lang"] : null), "id");
                    echo "\">";
                    echo $this->getAttribute((isset($context["lang"]) ? $context["lang"] : null), "title");
                    echo "</option>
                          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lang'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 61
                echo "                          ";
            }
            // line 62
            echo "                        </select>
                        <button class=\"btn btn-large btn-primary\" type=\"submit\">Sign Up</button>
                        <label class=\"checkbox inline\" style=\"margin:0 0 0 30px; \">
                            <span>I agree to the <a href=\"termsandconditions\">Terms & Conditions</a>.</span>
                            <input type=\"checkbox\" name=\"agree\" value=\"1\"> 
                        </label>
                      </form>
            \t";
        }
        // line 70
        echo "            </div>
          </div>
          
          <!-- <iframe width=\"770\" height=\"433\" src=\"http://www.youtube.com/embed/M-sc73Y-zQA\" frameborder=\"0\" allowfullscreen></iframe> -->
        </div>
      </div><!--/row-->
      

";
        // line 78
        $this->env->loadTemplate("_footer.html")->display($context);
        // line 79
        echo "  <script>
    window.is_logged = ";
        // line 80
        echo ((((isset($context["is_logged"]) ? $context["is_logged"] : null) == 1)) ? (1) : (0));
        echo ";
  </script>  
  <script src=\"js/lib/require.js\"></script>
  <script src=\"js/home.js\"></script>
";
        // line 84
        $this->env->loadTemplate("_bottom.html")->display($context);
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 84,  134 => 80,  131 => 79,  129 => 78,  119 => 70,  109 => 62,  106 => 61,  95 => 59,  90 => 58,  88 => 57,  76 => 47,  74 => 46,  47 => 24,  25 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}

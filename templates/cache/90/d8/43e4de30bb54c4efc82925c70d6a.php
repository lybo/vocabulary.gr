<?php

/* _header.html */
class __TwigTemplate_90d843e4de30bb54c4efc82925c70d6a extends Twig_Template
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
        echo " </head>
  <body>
    <div class=\"navbar navbar-inverse navbar-fixed-top\">
      <div class=\"navbar-inner\">
        <div class=\"container\">
          <button type=\"button\" class=\"btn btn-navbar\" data-toggle=\"collapse\" data-target=\".nav-collapse\">
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
          </button>
          <a class=\"brand\" href=\"/\"></a>
          ";
        // line 12
        if (((isset($context["is_logged"]) ? $context["is_logged"] : null) != 1)) {
            // line 13
            echo "          <div class=\"nav-collapse collapse\" autocomplete=\"on\">
            <form action=\"/login\" method=\"post\" class=\"navbar-form pull-right controls controls-row\" id=\"login\" >
              <input class=\"text\" type=\"text\" name=\"email\" placeholder=\"Email\">
              <input class=\"text\" type=\"password\" name=\"password\" placeholder=\"Password\" >
              <button type=\"submit\" class=\"btn btn-mini\">Sign in</button>
              <div class=\"second-row\">
                <label class=\"checkbox pull-left\">
                  <input type=\"checkbox\" name=\"rememberme\" value=\"1\"> Remember&nbsp;me
                </label>
                <a href=\"/remindme\" class=\"navbar-link pull-left\">Forgot your password?</a>
                <a href=\"/signup\" class=\"navbar-link pull-left\"><span class=\"icon-user icon-white\"></span> New User</a>
              </div>
            </form><!--/.navbar-form -->
            ";
        }
        // line 27
        echo "            ";
        if (((isset($context["is_logged"]) ? $context["is_logged"] : null) == 1)) {
            // line 28
            echo "            <ul class=\"nav pull-right\">
              ";
            // line 29
            if ((isset($context["notifications"]) ? $context["notifications"] : null)) {
                // line 30
                echo "              <li class=\"dropdown\">
                <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"icon icon-bell icon-white\"></i></a>
                
                <ul class=\"dropdown-menu\" id=\"notifications_list\">
                  
                  ";
                // line 35
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["notifications"]) ? $context["notifications"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["notification"]) {
                    // line 36
                    echo "                    <li>";
                    echo $this->getAttribute((isset($context["notification"]) ? $context["notification"] : null), "body");
                    echo "</li>
                  ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['notification'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 38
                echo "                  
                  <li class=\"divider\"></li>
                  <li><a href=\"#\">Display all</a></li>
                </ul>
                
              </li>
              ";
            }
            // line 45
            echo "              <li class=\"dropdown\">
                <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"icon icon-user icon-white\"></i> ";
            // line 46
            echo $this->getAttribute((isset($context["currentUser"]) ? $context["currentUser"] : null), "name");
            echo "  <b class=\"caret\"></b></a>
                <ul class=\"dropdown-menu\">
                  <li><a href=\"/me\">Profile</a></li>
                  <li class=\"divider\"></li>
                  <li><a href=\"#\">Invide New Individuals</a></li>
                  <li class=\"divider\"></li>
                  <li><a href=\"/logout\">Log Out</a></li>
                </ul>
              </li>
            </ul>
            ";
        }
        // line 57
        echo "            ";
        if (((isset($context["is_logged"]) ? $context["is_logged"] : null) != 1)) {
            // line 58
            echo "            
            <form id=\"vocabulary-search\" class=\"navbar-search pull-left\">
              <input type=\"text\" class=\"search-query\" placeholder=\"Search\" name=\"vocabularyQuery\" required style=\"width:420px;\" value=\"";
            // line 60
            echo (isset($context["vocabularyQuery"]) ? $context["vocabularyQuery"] : null);
            echo "\"/>
            </form> 
            ";
        }
        // line 63
        echo "            ";
        if (((isset($context["is_logged"]) ? $context["is_logged"] : null) == 1)) {
            echo "   
            <form id=\"vocabulary-search\" class=\"navbar-search pull-left\">
              <input type=\"text\" class=\"search-query\" placeholder=\"Search\" name=\"vocabularyQuery\" required style=\"width:420px;\" value=\"";
            // line 65
            echo (isset($context["vocabularyQuery"]) ? $context["vocabularyQuery"] : null);
            echo "\"/>
            </form> 
            ";
        }
        // line 67
        echo "       
          </div><!--/.nav-collapse -->
        </div> <!-- /.container -->
      </div> <!-- /.navbar-inner -->
    </div> <!-- /.navbar -->
    <div class=\"container\">";
    }

    public function getTemplateName()
    {
        return "_header.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 65,  117 => 63,  111 => 60,  107 => 58,  104 => 57,  87 => 45,  78 => 38,  69 => 36,  65 => 35,  58 => 30,  56 => 29,  53 => 28,  50 => 27,  34 => 13,  32 => 12,  30 => 7,  141 => 84,  134 => 80,  131 => 79,  129 => 67,  119 => 70,  109 => 62,  106 => 61,  95 => 59,  90 => 46,  88 => 57,  76 => 47,  74 => 46,  47 => 24,  25 => 5,  23 => 3,  21 => 2,  19 => 1,);
    }
}

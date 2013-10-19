<?php

/* home.html */
class __TwigTemplate_472342b085cb7253e5f3d30bf779d104 extends Twig_Template
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
            <div class=\"row-fluid\">
              <div class=\"span6 well\">
                       <h3>";
        // line 9
        echo $this->getAttribute((isset($context["currentUser"]) ? $context["currentUser"] : null), "name");
        echo "</h3> 
                       <table class=\"table table-hover\">
                        <tr>
                          <td width=\"80\"><strong>Vocabularies: </strong></td>
                          <td><span class=\"label label-inverse\">";
        // line 13
        echo $this->getAttribute((isset($context["currentUser"]) ? $context["currentUser"] : null), "num_vocabularies");
        echo "</span></td>
                        </tr>
                        <tr>
                          <td><strong>Subscribes: </strong></td>
                          <td><span class=\"label label-inverse\">";
        // line 17
        echo $this->getAttribute((isset($context["currentUser"]) ? $context["currentUser"] : null), "num_subscribes");
        echo "</span></td>
                        </tr>
                       </table>
                       
                       <br/>
                       <div class=\"alert alert-info\">
                        This is your <strong>dashboard</strong>!<br/>
                        On your left hand you can see your last activities. Below you can see the last vocabularies each your subscribed user if you have subscribed any user. 
                       </div>
              </div>

              ";
        // line 28
        if (twig_length_filter($this->env, (isset($context["userLastActivities"]) ? $context["userLastActivities"] : null))) {
            // line 29
            echo "              <div class=\"span6 well\">
                <ul class=\"nav nav-list\">
                  <li class=\"nav-header\">Last Activities</li>
                  ";
            // line 32
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["userLastActivities"]) ? $context["userLastActivities"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["userActivity"]) {
                // line 33
                echo "                    <li>";
                echo $this->getAttribute((isset($context["userActivity"]) ? $context["userActivity"] : null), "html");
                echo "</li>
                  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['userActivity'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            echo "                </ul>       
              </div>
              ";
        } else {
            // line 38
            echo "              <div class=\"span6 well\">
                  Last Activities   
                  <br/>
                  <div class=\"alert alert-info\">
                    
                  </div>
              </div>
              ";
        }
        // line 46
        echo "
              ";
        // line 47
        if (twig_length_filter($this->env, (isset($context["users"]) ? $context["users"] : null))) {
            echo "<div class=\"span12\"><h4>Your Subscribed Users</h4><hr/></div>";
        }
        // line 48
        echo "            \t<!--
              user_cached_data
              id, user_id, last_vocabularies
              -->
                ";
        // line 52
        $context["i"] = 0;
        // line 53
        echo "                ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 54
            echo "                  
                  <div class=\"span12\" id=\"last_users_vocabularies\">
                    <h4><a href=\"/vocabularies/user/";
            // line 56
            echo $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id");
            echo "\">";
            echo $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "name");
            echo "</a></h4>
                  ";
            // line 57
            $context["i"] = 0;
            // line 58
            echo "                  ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["vocabularies"]) ? $context["vocabularies"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["vocabulary"]) {
                // line 59
                echo "                  
                    
                    ";
                // line 61
                if ((($this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "user_id") == $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id")) && ($this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "title") != ""))) {
                    // line 62
                    echo "
                      ";
                    // line 63
                    if (((isset($context["i"]) ? $context["i"] : null) == 0)) {
                        // line 64
                        echo "                        ";
                        $context["row"] = "start";
                        // line 65
                        echo "                      ";
                    } else {
                        // line 66
                        echo "                        ";
                        $context["row"] = "";
                        // line 67
                        echo "                      ";
                    }
                    // line 68
                    echo "
                      ";
                    // line 69
                    $context["i"] = ((isset($context["i"]) ? $context["i"] : null) + 1);
                    // line 70
                    echo "                      
                    <div class=\"vocabulary span4 well well-small ";
                    // line 71
                    echo (isset($context["row"]) ? $context["row"] : null);
                    echo "\">
                      <div class=\"inner\">
                        <h4><a href=\"/exercise/";
                    // line 73
                    echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "id");
                    echo "\">";
                    echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "title");
                    echo "</a></h4>
                      
                        ";
                    // line 75
                    $context["vocabulary_user"] = "";
                    // line 76
                    echo "                        ";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
                        // line 77
                        echo "                          ";
                        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id") == $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "user_id"))) {
                            // line 78
                            echo "                            ";
                            $context["vocabulary_user"] = (isset($context["user"]) ? $context["user"] : null);
                            // line 79
                            echo "                          ";
                        }
                        // line 80
                        echo "                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 81
                    echo "
                        <p>created <strong>";
                    // line 82
                    echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "elasped_time");
                    echo "</strong>

                        ";
                    // line 84
                    if ($this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "source_url")) {
                        // line 85
                        echo "                          for <a href=\"/exercise/";
                        echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "source_url");
                        echo "\">";
                        echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "source");
                        echo "</a>
                        ";
                    } else {
                        // line 87
                        echo "                          ";
                        if ($this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "source")) {
                            echo "for <strong>";
                            echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "source");
                            echo "</strong>";
                        }
                        // line 88
                        echo "                        ";
                    }
                    // line 89
                    echo "
                        consists <strong>";
                    // line 90
                    echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "num_translations");
                    echo "</strong> Words 

                        and it has <strong>";
                    // line 92
                    echo $this->getAttribute((isset($context["vocabulary_user"]) ? $context["vocabulary_user"] : null), "num_subscribes");
                    echo "</strong> subscribers</p>
                      </div>
                    </div>
                    ";
                }
                // line 96
                echo "
                    

                  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['vocabulary'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 100
            echo "                  </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 102
        echo "              
            </div>
          </div>   
          <!-- <iframe width=\"770\" height=\"433\" src=\"http://www.youtube.com/embed/M-sc73Y-zQA\" frameborder=\"0\" allowfullscreen></iframe> -->
        </div>
      </div><!--/row-->
      <div class=\"clearfix\"></div>

";
        // line 110
        $this->env->loadTemplate("_footer.html")->display($context);
        // line 111
        echo "  <script>
    window.is_logged = ";
        // line 112
        echo ((((isset($context["is_logged"]) ? $context["is_logged"] : null) == 1)) ? (1) : (0));
        echo ";
  </script>  
  <script src=\"js/lib/require.js\"></script>
  <script src=\"js/home.js\"></script>
";
        // line 116
        $this->env->loadTemplate("_bottom.html")->display($context);
    }

    public function getTemplateName()
    {
        return "home.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  278 => 116,  271 => 112,  268 => 111,  266 => 110,  256 => 102,  249 => 100,  240 => 96,  233 => 92,  228 => 90,  225 => 89,  222 => 88,  215 => 87,  207 => 85,  205 => 84,  200 => 82,  197 => 81,  191 => 80,  188 => 79,  185 => 78,  182 => 77,  177 => 76,  175 => 75,  168 => 73,  163 => 71,  160 => 70,  158 => 69,  155 => 68,  152 => 67,  149 => 66,  146 => 65,  143 => 64,  141 => 63,  138 => 62,  136 => 61,  132 => 59,  127 => 58,  125 => 57,  119 => 56,  115 => 54,  110 => 53,  108 => 52,  102 => 48,  98 => 47,  95 => 46,  85 => 38,  80 => 35,  71 => 33,  67 => 32,  62 => 29,  60 => 28,  46 => 17,  39 => 13,  32 => 9,  25 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}

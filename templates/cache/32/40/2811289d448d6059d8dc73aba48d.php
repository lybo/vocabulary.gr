<?php

/* _left_sidebar.html */
class __TwigTemplate_32402811289d448d6059d8dc73aba48d extends Twig_Template
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
        echo "      <div class=\"sidebar-nav-fixed pull-left\"  ><!--  -->
        <div ><!-- class=\"affix\" data-spy=\"affix\" data-offset-top=\"50\" -->
            <div class=\"sidebar-nav\">
              <ul class=\"nav nav-list\">
                ";
        // line 5
        if (((isset($context["is_logged"]) ? $context["is_logged"] : null) == 1)) {
            // line 6
            echo "                <li><a href=\"/home\" data-nav=\"mydashboard\"><span class=\"icon icon-home\"></span> Dashboard</a></li>
                <li><a href=\"/me\" class=\"_tooltip\" data-toggle=\"tooltip\" data-placement=\"right\" title=\"Edit your Profile\" data-nav=\"profile\"><span class=\"icon icon-user\"></span>  <strong>";
            // line 7
            echo $this->getAttribute((isset($context["currentUser"]) ? $context["currentUser"] : null), "name");
            echo "</strong></a></li>
                <li><a href=\"/vocabularies\" class=\"_tooltip\" data-toggle=\"tooltip\" data-placement=\"right\" title=\"Add/Edit your Vocabularies\" data-nav=\"vocabularies\"><span class=\"icon icon-book\"></span> My Vocabularies</a></li>
                <li><a href=\"/library\" class=\"_tooltip\" data-toggle=\"tooltip\" data-placement=\"right\" title=\"Bookmark Vocabularies to your Library\" data-nav=\"mylibrary\"><span class=\"icon icon-bookmark\"></span> My Bookmarks</a></li>
                <li class=\"divider\"></li>
                <li><a href=\"/new_user\" class=\"_tooltip\" data-toggle=\"tooltip\" data-placement=\"right\" title=\"Click here to create a new Vocabulary\" data-nav=\"mylibrary\"><span class=\"icon icon-plus-sign\"></span> Create</a></li>
                <li class=\"divider\"></li>
                ";
        }
        // line 14
        echo "                
                ";
        // line 15
        if (((isset($context["is_logged"]) ? $context["is_logged"] : null) == 0)) {
            // line 16
            echo "                <li><a href=\"/home\" data-nav=\"home\">home</a></li>
                <li><a href=\"/about\" data-nav=\"about\">about</a></li>
                <li><a href=\"/howtitworks\" data-nav=\"howtitworks\">how it works</a></li>
                
                <li class=\"divider\"></li>
                <li class=\"nav-header\">Subscriptions</li>
                <li class=\"active\">
                  <a href=\"/signup\"><i class=\"icon icon-bullhorn\"></i>Login to add vocabularies to your personal library.<br/>You can create your vocabulary and share with other users!</a>
                </li>
                ";
        }
        // line 26
        echo "                ";
        if (((isset($context["is_logged"]) ? $context["is_logged"] : null) == 1)) {
            // line 27
            echo "                <li class=\"nav-header\">Subscriptions</li>
                <ul id=\"subscribes-list\" class=\"nav nav-list\">
                    <li style=\"padding-left: 25px;\"><img src=\"/images/loader.gif\"></li>
                </ul>
                ";
        }
        // line 32
        echo "                <li class=\"divider\"></li>
                <li class=\"nav-header\">Social Buttons</li>
                <li>
                   
                  <!-- AddThis Button BEGIN -->
                  <div class=\"addthis_toolbox addthis_default_style \">
                  <a class=\"addthis_button_facebook_like\" fb:like:layout=\"button_count\"></a>
                  <a class=\"addthis_button_tweet\"></a>
                  <a class=\"addthis_counter addthis_pill_style\"></a>
                  </div>
                  <script type=\"text/javascript\" src=\"//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-51ed2b3f2d8dde27\"></script>

                </li>
              </ul>
            </div><!--/.sidebar-nav -->
        </div>
      </div><!--/.sidebar-nav-fixed-->";
    }

    public function getTemplateName()
    {
        return "_left_sidebar.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 32,  60 => 27,  57 => 26,  45 => 16,  43 => 15,  40 => 14,  27 => 6,  123 => 65,  117 => 63,  111 => 60,  107 => 58,  104 => 57,  87 => 45,  78 => 38,  69 => 36,  65 => 35,  58 => 30,  56 => 29,  53 => 28,  50 => 27,  34 => 13,  32 => 12,  30 => 7,  141 => 84,  134 => 80,  131 => 79,  129 => 67,  119 => 70,  109 => 62,  106 => 61,  95 => 59,  90 => 46,  88 => 57,  76 => 47,  74 => 46,  47 => 24,  25 => 5,  23 => 3,  21 => 2,  19 => 1,);
    }
}

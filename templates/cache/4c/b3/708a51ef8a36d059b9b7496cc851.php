<?php

/* _footer.html */
class __TwigTemplate_4cb3708a51ef8a36d059b9b7496cc851 extends Twig_Template
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
        echo "      </div><!--/#content-->    
      
      <footer>
      \t<ul class=\"nav nav-pills\">  
\t\t  <li><a href=\"#\">about</a></li>
\t\t  <li><a href=\"#\">help</a></li>
\t\t  <li><a href=\"#\">advertising</a></li>
\t\t  <li><a href=\"#\">feedback/contact</a></li>
\t\t  <li><a href=\"#\">copyright</a></li>
\t\t</ul>
      \t<hr/>
        <p class=\"muted\">&copy; Vocabulary.gr ";
        // line 12
        if ((twig_date_format_filter($this->env, "now", "Y") != 2013)) {
            echo " 2013 - ";
        }
        echo twig_date_format_filter($this->env, "now", "Y");
        echo "</p>
        
      </footer>
    </div><!--/.fluid-container-->
\t
";
    }

    public function getTemplateName()
    {
        return "_footer.html";
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

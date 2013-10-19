<?php

/* page404.html */
class __TwigTemplate_2ceec394169f6fdebc2f1df93972b618 extends Twig_Template
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
        $this->env->loadTemplate("_header_simple.html")->display($context);
        // line 3
        echo "      <div style=\"margin: 20px 0 0 20px;\">
         <div class=\"hero-unit center\">
          <h1>Page Not Found <small><font face=\"Tahoma\" color=\"red\">Error 404</font></small></h1>
          <br />
          <p>The page you requested could not be found, either contact your webmaster or try again. Use your browsers <b>Back</b> button to navigate to the page you have prevously come from</p>
          <p><b>Or you could just press this neat little button:</b></p>
          <a href=\"/\" class=\"btn btn-large btn-info\"><i class=\"icon-home icon-white\"></i> Take Me Home</a>
        </div>
      </div><!--/#content-->
      <div class=\"clearfix\"></div>
";
        // line 13
        $this->env->loadTemplate("_footer.html")->display($context);
        // line 14
        echo "    
  <script src=\"js/lib/require.js\"></script>
  <script src=\"js/home.js\"></script>
";
        // line 17
        $this->env->loadTemplate("_bottom.html")->display($context);
    }

    public function getTemplateName()
    {
        return "page404.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 17,  37 => 14,  35 => 13,  23 => 3,  21 => 2,  19 => 1,);
    }
}

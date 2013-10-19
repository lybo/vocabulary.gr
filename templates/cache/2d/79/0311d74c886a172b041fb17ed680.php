<?php

/* _head.html */
class __TwigTemplate_2d790311d74c886a172b041fb17ed680 extends Twig_Template
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
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\"
\t\"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"el\">
<head>
    <title>";
        // line 5
        echo (isset($context["page_title"]) ? $context["page_title"] : null);
        echo " - vocabulary.gr</title>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" >
    <meta name=\"title\" content=\"vocabulary.gr - ";
        // line 7
        echo (isset($context["page_title"]) ? $context["page_title"] : null);
        echo "\" >
    <meta name=\"keywords\" content=\", vocabulary, \" >
    <meta name=\"description\" content=\"vocabulary\" >
    <meta name=\"robots\" content=\"index, follow\">
    <link rel=\"icon\" type=\"image/ico\" href=\"/images/favicon.ico\">
    <link href=\"/stylesheets/bootstrap.min.css\" type=\"text/css\" rel=\"stylesheet\" >
    
    <link href=\"/stylesheets/custom.css\" type=\"text/css\" rel=\"stylesheet\" >
    <link href=\"/stylesheets/bootstrap-responsive.min.css\" type=\"text/css\" rel=\"stylesheet\" >


    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-42610630-1', 'vocabulary.gr');
      ga('send', 'pageview');

    </script>
";
    }

    public function getTemplateName()
    {
        return "_head.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 7,  141 => 84,  134 => 80,  131 => 79,  129 => 78,  119 => 70,  109 => 62,  106 => 61,  95 => 59,  90 => 58,  88 => 57,  76 => 47,  74 => 46,  47 => 24,  25 => 5,  23 => 3,  21 => 2,  19 => 1,);
    }
}

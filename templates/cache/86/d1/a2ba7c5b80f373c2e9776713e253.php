<?php

/* encourageactiveaccount.html */
class __TwigTemplate_86d1a2ba7c5b80f373c2e9776713e253 extends Twig_Template
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
          <div class=\"well\">
            <h3>Your account has not been activated</h3>
            <div class=\"alert alert-info\">
              <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
              <h4>Last Step!</h4>
              Check your e-mail inbox or spam. We have send you the activation e-mail. Read it and follow the instrunctions.
            </div>
          </div>
      </div><!--/row-->
      <div class=\"clearfix\"></div>

";
        // line 16
        $this->env->loadTemplate("_footer.html")->display($context);
        // line 17
        echo "  <script>
    window.is_logged = ";
        // line 18
        if (isset($context["is_logged"])) { $_is_logged_ = $context["is_logged"]; } else { $_is_logged_ = null; }
        echo ((($_is_logged_ == 1)) ? (1) : (0));
        echo ";
  </script>  
  <script src=\"js/lib/require.js\"></script>
  <script src=\"js/home.js\"></script>
";
        // line 22
        $this->env->loadTemplate("_bottom.html")->display($context);
    }

    public function getTemplateName()
    {
        return "encourageactiveaccount.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 22,  44 => 18,  41 => 17,  39 => 16,  25 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}

<?php

/* _right_sidebar_exercise.html */
class __TwigTemplate_b092a280da21f49350704bcab20fda96 extends Twig_Template
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
        echo "      <div class=\"sidebar-right pull-right\">
        
        
        <div id=\"adv-exercise\">
          <a href=\"http://bs.serving-sys.com/BurstingPipe/BannerRedirect.bs?cn=brd&amp;FlightID=6044560&amp;Page=&amp;sessionid=1795373374518630916&amp;PluID=0&amp;EyeblasterID=14141536&amp;Pos=41403292496452&amp;ord=[timestamp]\" target=\"_blank\"><img src=\"http://ds.serving-sys.com/BurstingRes///Site-35148/Type-0/4b968943-d282-47d6-971a-a9e705f0559e.jpg\" width=\"300\" height=\"250\" title=\"\" border=\"0\"></a>
        </div>
        <br/><br/>
        <div class=\"well well-small\" id=\"vocabulary-navigation\">
          <h5>Vocabulary Navigation</h5>
          
          <div id=\"exercise-slicer-eachpage\"></div><br/>
          <div id=\"exercise-slicer-pagination\"><strong>Loading...</strong></div>
        </div>
        <div class=\"well\">
            
            <h4>
              <a href=\"/vocabularies/user/";
        // line 17
        if (isset($context["vocabularyOwner"])) { $_vocabularyOwner_ = $context["vocabularyOwner"]; } else { $_vocabularyOwner_ = null; }
        echo $this->getAttribute($_vocabularyOwner_, "id");
        echo "\"><img src=\"";
        if (isset($context["vocabularyOwner"])) { $_vocabularyOwner_ = $context["vocabularyOwner"]; } else { $_vocabularyOwner_ = null; }
        echo $this->getAttribute($_vocabularyOwner_, "photo");
        echo "\" class=\"user-image\" /></a>
              <a href=\"/vocabularies/user/";
        // line 18
        if (isset($context["vocabularyOwner"])) { $_vocabularyOwner_ = $context["vocabularyOwner"]; } else { $_vocabularyOwner_ = null; }
        echo $this->getAttribute($_vocabularyOwner_, "id");
        echo "\">";
        if (isset($context["vocabularyOwner"])) { $_vocabularyOwner_ = $context["vocabularyOwner"]; } else { $_vocabularyOwner_ = null; }
        echo $this->getAttribute($_vocabularyOwner_, "name");
        echo "</a>
            </h4>

            ";
        // line 21
        if (isset($context["is_logged"])) { $_is_logged_ = $context["is_logged"]; } else { $_is_logged_ = null; }
        if (($_is_logged_ == 1)) {
            // line 22
            echo "              ";
            if (isset($context["currentUser"])) { $_currentUser_ = $context["currentUser"]; } else { $_currentUser_ = null; }
            if (isset($context["vocabularyOwner"])) { $_vocabularyOwner_ = $context["vocabularyOwner"]; } else { $_vocabularyOwner_ = null; }
            if (($this->getAttribute($_currentUser_, "id") != $this->getAttribute($_vocabularyOwner_, "id"))) {
                // line 23
                echo "              <div id=\"subscribe-controls\" class=\"pull-left\"></div>
              <span id=\"user_num_subscribes\" class=\"label label-inverse\" style=\"margin:0 0 0 10px;\">
                <span style=\"margin: 0 0 0 -9px; display: inline-block; width: 0; 
  height: 0; 
  border-top: 4px solid transparent;
  border-bottom: 5px solid transparent; 
  border-right:5px solid #333333;\"></span>
                ";
                // line 30
                if (isset($context["vocabularyOwner"])) { $_vocabularyOwner_ = $context["vocabularyOwner"]; } else { $_vocabularyOwner_ = null; }
                echo $this->getAttribute($_vocabularyOwner_, "num_subscribes");
                echo "
              </span>
              
              ";
            }
            // line 34
            echo "            ";
        }
        // line 35
        echo "            

           
            <small class=\"muted pull-right\">";
        // line 38
        if (isset($context["vocabularyOwner"])) { $_vocabularyOwner_ = $context["vocabularyOwner"]; } else { $_vocabularyOwner_ = null; }
        echo $this->getAttribute($_vocabularyOwner_, "num_vocabularies");
        echo " Vocabularies</small>

            <span class=\"clearfix\"></span>
            
        </div>
        
        <div class=\"well\">
          <table width=\"100%\" class=\"table table-striped table-condensed\">
            
            ";
        // line 47
        if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
        if ($this->getAttribute($_vocabulary_, "source_url")) {
            // line 48
            echo "            <tr>
              <th>Source:</th>
              ";
            // line 50
            if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
            if ($this->getAttribute($_vocabulary_, "source_url")) {
                // line 51
                echo "              <td><span id=\"vocabularySource2\"><a href=\"http://";
                if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
                echo $this->getAttribute($_vocabulary_, "source_url");
                echo "\" target=\"_blank\">";
                if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
                echo $this->getAttribute($_vocabulary_, "source");
                echo "</a></span></td>
              ";
            } else {
                // line 53
                echo "              <td><span id=\"vocabularySource2\">";
                if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
                echo $this->getAttribute($_vocabulary_, "source_url");
                echo "</span></td>
              ";
            }
            // line 55
            echo "            </tr>
            ";
        }
        // line 57
        echo "            <tr>
              <th>Words:</th>
              <td><span id=\"vocabularyNumTranslations\">";
        // line 59
        if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
        echo $this->getAttribute($_vocabulary_, "num_translations");
        echo "</span></td>
            </tr>
            <tr>
              <th>Labels:</th>
              <td>
                ";
        // line 64
        if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(twig_split_filter($this->getAttribute($_vocabulary_, "labels"), ","));
        foreach ($context['_seq'] as $context["_key"] => $context["label"]) {
            // line 65
            echo "                  <span class=\"label\">";
            if (isset($context["label"])) { $_label_ = $context["label"]; } else { $_label_ = null; }
            echo $_label_;
            echo "</span>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['label'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 67
        echo "              </td>
            </tr>
            <tr>
              <th>Download:</th>
              <td>
                <div id=\"downloadLink\"></div>
              </td>
            </tr>
            
            ";
        // line 76
        if (isset($context["currentUser"])) { $_currentUser_ = $context["currentUser"]; } else { $_currentUser_ = null; }
        if (isset($context["vocabularyOwner"])) { $_vocabularyOwner_ = $context["vocabularyOwner"]; } else { $_vocabularyOwner_ = null; }
        if ((($this->getAttribute($_currentUser_, "id") == $this->getAttribute($_vocabularyOwner_, "id")) && $this->getAttribute($_currentUser_, "id"))) {
            // line 77
            echo "            <tr>
              <td align=\"center\" colspan=\"2\">
                <br/><a href=\"/translations/vocabulary/";
            // line 79
            if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
            echo $this->getAttribute($_vocabulary_, "id");
            echo "\" class=\"btn btn-inverse btn-small\"><i class=\"icon-wrench icon-white\"></i> Edit</a>
              </td>
            </tr>
            ";
        }
        // line 83
        echo "          </table>
        </div>
        <div style=\"height:300px;\"></div>
        

      </div><!--/.sidebar-right-->";
    }

    public function getTemplateName()
    {
        return "_right_sidebar_exercise.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  187 => 83,  179 => 79,  175 => 77,  171 => 76,  160 => 67,  150 => 65,  145 => 64,  136 => 59,  132 => 57,  128 => 55,  121 => 53,  111 => 51,  108 => 50,  104 => 48,  101 => 47,  88 => 38,  83 => 35,  80 => 34,  72 => 30,  63 => 23,  58 => 22,  55 => 21,  45 => 18,  37 => 17,  19 => 1,);
    }
}

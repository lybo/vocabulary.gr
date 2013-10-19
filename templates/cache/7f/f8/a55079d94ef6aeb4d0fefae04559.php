<?php

/* vocabularies.html */
class __TwigTemplate_7ff8a55079d94ef6aeb4d0fefae04559 extends Twig_Template
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
        $this->env->loadTemplate("_right_sidebar.html")->display($context);
        // line 5
        echo "
\t\t  <div id=\"content\">
          <div id=\"vocabularies\">
            

            <div class=\"btn-group\">
              <a class=\"btn dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
                Order By
                <span class=\"caret\"></span>
              </a>
              <ul class=\"dropdown-menu\">
                <li><a href=\"/vocabularies/search/";
        // line 16
        if (isset($context["vocabularyQuery"])) { $_vocabularyQuery_ = $context["vocabularyQuery"]; } else { $_vocabularyQuery_ = null; }
        echo $_vocabularyQuery_;
        echo "/1/orderby/title|asc\" class=\"orderby\" data-field=\"title\" data-sorttype=\"asc\"><i class=\"icon icon-arrow-up\"></i> Title</a></li>
                <li><a href=\"/vocabularies/search/";
        // line 17
        if (isset($context["vocabularyQuery"])) { $_vocabularyQuery_ = $context["vocabularyQuery"]; } else { $_vocabularyQuery_ = null; }
        echo $_vocabularyQuery_;
        echo "/1/orderby/title|desc\" class=\"orderby\" data-field=\"title\" data-sorttype=\"desc\"><i class=\"icon icon-arrow-down\"></i> Title</a></li>
                <li><a href=\"/vocabularies/search/";
        // line 18
        if (isset($context["vocabularyQuery"])) { $_vocabularyQuery_ = $context["vocabularyQuery"]; } else { $_vocabularyQuery_ = null; }
        echo $_vocabularyQuery_;
        echo "/1/orderby/date_in|asc\" class=\"orderby\" data-field=\"date_in\" data-sorttype=\"asc\"><i class=\"icon icon-arrow-up\"></i> Date</a></li> 
                <li><a href=\"/vocabularies/search/";
        // line 19
        if (isset($context["vocabularyQuery"])) { $_vocabularyQuery_ = $context["vocabularyQuery"]; } else { $_vocabularyQuery_ = null; }
        echo $_vocabularyQuery_;
        echo "/1/orderby/date_in|desc\" class=\"orderby\" data-field=\"date_in\" data-sorttype=\"desc\"><i class=\"icon icon-arrow-down\"></i> Date</a></li> 
              </ul>
            </div>
            ";
        // line 22
        if (isset($context["orderby"])) { $_orderby_ = $context["orderby"]; } else { $_orderby_ = null; }
        if ($_orderby_) {
            // line 23
            echo "              ";
            if (isset($context["orderby"])) { $_orderby_ = $context["orderby"]; } else { $_orderby_ = null; }
            if (($_orderby_ == "title")) {
                // line 24
                echo "                Title
              ";
            }
            // line 26
            echo "              ";
            if (isset($context["orderby"])) { $_orderby_ = $context["orderby"]; } else { $_orderby_ = null; }
            if (($_orderby_ == "date_in")) {
                // line 27
                echo "                Date
              ";
            }
            // line 29
            echo "              ";
            if (isset($context["ordertype"])) { $_ordertype_ = $context["ordertype"]; } else { $_ordertype_ = null; }
            if (($_ordertype_ == "asc")) {
                // line 30
                echo "                <i class=\"icon icon-arrow-up\"></i>
              ";
            }
            // line 32
            echo "              ";
            if (isset($context["ordertype"])) { $_ordertype_ = $context["ordertype"]; } else { $_ordertype_ = null; }
            if (($_ordertype_ == "desc")) {
                // line 33
                echo "                <i class=\"icon icon-arrow-down\"></i>
              ";
            }
            // line 35
            echo "              
            ";
        }
        // line 37
        echo "              
            <div class=\"muted pull-right\" style=\"padding-top: 5px;\"><small >";
        // line 38
        if (isset($context["vocabularies_length"])) { $_vocabularies_length_ = $context["vocabularies_length"]; } else { $_vocabularies_length_ = null; }
        echo $_vocabularies_length_;
        echo " results</small></div>

            <hr/>
            <div id=\"vocabulary-list\">
              ";
        // line 42
        if (isset($context["vocabularies"])) { $_vocabularies_ = $context["vocabularies"]; } else { $_vocabularies_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_vocabularies_);
        foreach ($context['_seq'] as $context["_key"] => $context["vocabulary"]) {
            // line 43
            echo "                <div class=\"media\" id=\"vocabulary-list-";
            if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
            echo $this->getAttribute($_vocabulary_, "id");
            echo "\">

                  
                  <div class=\"media-body\">
                    <h4 class=\"media-heading\"><a href=\"/exercise/";
            // line 47
            if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
            echo $this->getAttribute($_vocabulary_, "id");
            echo "\">";
            if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
            echo $this->getAttribute($_vocabulary_, "title");
            echo "</a></h4>
                    <h5>";
            // line 48
            if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
            echo $this->getAttribute($_vocabulary_, "source");
            echo "</h5>
                    <small>
                      

                      ";
            // line 52
            $context["vocabulary_user"] = "";
            // line 53
            echo "                      ";
            if (isset($context["users"])) { $_users_ = $context["users"]; } else { $_users_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($_users_);
            foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
                // line 54
                echo "                        ";
                if (isset($context["user"])) { $_user_ = $context["user"]; } else { $_user_ = null; }
                if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
                if (($this->getAttribute($_user_, "id") == $this->getAttribute($_vocabulary_, "user_id"))) {
                    // line 55
                    echo "                          ";
                    if (isset($context["user"])) { $_user_ = $context["user"]; } else { $_user_ = null; }
                    $context["vocabulary_user"] = $_user_;
                    // line 56
                    echo "                        ";
                }
                // line 57
                echo "                      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 58
            echo "
                      created <strong>";
            // line 59
            if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
            echo $this->getAttribute($_vocabulary_, "elasped_time");
            echo "</strong>

                      ";
            // line 61
            if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
            if ($this->getAttribute($_vocabulary_, "source")) {
                // line 62
                echo "                      for <strong>";
                if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
                echo $this->getAttribute($_vocabulary_, "source");
                echo "</strong>
                        ";
                // line 63
                if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
                if ($this->getAttribute($_vocabulary_, "source_url")) {
                    // line 64
                    echo "                        for <a href=\"http://";
                    if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
                    echo $this->getAttribute($_vocabulary_, "source_url");
                    echo "\" target=\"_blank\"><strong>";
                    if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
                    echo $this->getAttribute($_vocabulary_, "source");
                    echo "</strong></a>
                        ";
                } else {
                    // line 66
                    echo "                        for <strong>";
                    if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
                    echo $this->getAttribute($_vocabulary_, "source");
                    echo "</strong>
                        ";
                }
                // line 67
                echo " 
                      ";
            }
            // line 68
            echo " 

                      from user <a href=\"/vocabularies/user/";
            // line 70
            if (isset($context["vocabulary_user"])) { $_vocabulary_user_ = $context["vocabulary_user"]; } else { $_vocabulary_user_ = null; }
            echo $this->getAttribute($_vocabulary_user_, "id");
            echo "\">";
            if (isset($context["vocabulary_user"])) { $_vocabulary_user_ = $context["vocabulary_user"]; } else { $_vocabulary_user_ = null; }
            echo $this->getAttribute($_vocabulary_user_, "name");
            echo "</a>, 

                      consists <strong>";
            // line 72
            if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
            echo $this->getAttribute($_vocabulary_, "num_translations");
            echo "</strong> Words 

                      and user has <strong>";
            // line 74
            if (isset($context["vocabulary_user"])) { $_vocabulary_user_ = $context["vocabulary_user"]; } else { $_vocabulary_user_ = null; }
            echo $this->getAttribute($_vocabulary_user_, "num_subscribes");
            echo "</strong> subscribers

                    </small>

                    <span class=\"label label-info\">
                      ";
            // line 79
            if (isset($context["langs"])) { $_langs_ = $context["langs"]; } else { $_langs_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($_langs_);
            foreach ($context['_seq'] as $context["_key"] => $context["lang"]) {
                // line 80
                echo "                        ";
                if (isset($context["lang"])) { $_lang_ = $context["lang"]; } else { $_lang_ = null; }
                if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
                if (($this->getAttribute($_lang_, "id") == $this->getAttribute($_vocabulary_, "lang_1_id"))) {
                    // line 81
                    echo "                          ";
                    if (isset($context["lang"])) { $_lang_ = $context["lang"]; } else { $_lang_ = null; }
                    echo $this->getAttribute($_lang_, "title");
                    echo "
                        ";
                }
                // line 83
                echo "                      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lang'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 84
            echo "                    </span>

                    <span class=\"label label-info\">
                      ";
            // line 87
            if (isset($context["langs"])) { $_langs_ = $context["langs"]; } else { $_langs_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($_langs_);
            foreach ($context['_seq'] as $context["_key"] => $context["lang"]) {
                // line 88
                echo "                        ";
                if (isset($context["lang"])) { $_lang_ = $context["lang"]; } else { $_lang_ = null; }
                if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
                if (($this->getAttribute($_lang_, "id") == $this->getAttribute($_vocabulary_, "lang_2_id"))) {
                    // line 89
                    echo "                          ";
                    if (isset($context["lang"])) { $_lang_ = $context["lang"]; } else { $_lang_ = null; }
                    echo $this->getAttribute($_lang_, "title");
                    echo "
                        ";
                }
                // line 91
                echo "                      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lang'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 92
            echo "                    </span>
                    
                    ";
            // line 94
            if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_split_filter($this->getAttribute($_vocabulary_, "labels"), ","));
            foreach ($context['_seq'] as $context["_key"] => $context["label"]) {
                // line 95
                echo "                    <span class=\"label\">";
                if (isset($context["label"])) { $_label_ = $context["label"]; } else { $_label_ = null; }
                echo $_label_;
                echo "</span>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['label'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 97
            echo "                  </div>
                </div>

              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['vocabulary'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 101
        echo "            </div><!-- /#vocabulary-list -->
            ";
        // line 102
        if (isset($context["pages"])) { $_pages_ = $context["pages"]; } else { $_pages_ = null; }
        if (($_pages_ > 1)) {
            // line 103
            echo "            ";
            if (isset($context["orderby"])) { $_orderby_ = $context["orderby"]; } else { $_orderby_ = null; }
            if ($_orderby_) {
                // line 104
                echo "              ";
                if (isset($context["orderby"])) { $_orderby_ = $context["orderby"]; } else { $_orderby_ = null; }
                if (isset($context["ordertype"])) { $_ordertype_ = $context["ordertype"]; } else { $_ordertype_ = null; }
                $context["order"] = ((("/orderby/" . $_orderby_) . "|") . $_ordertype_);
                // line 105
                echo "            ";
            } else {
                // line 106
                echo "              ";
                $context["order"] = "";
                // line 107
                echo "            ";
            }
            // line 108
            echo "            <div class=\"pagination pagination-centered\">
              <div class=\"btn-group btn-centered\" data-toggle=\"btn-radio\">
                ";
            // line 110
            if (isset($context["currentPage"])) { $_currentPage_ = $context["currentPage"]; } else { $_currentPage_ = null; }
            if (($_currentPage_ != 1)) {
                // line 111
                echo "                <a href=\"/vocabularies/search/";
                if (isset($context["vocabularyQuery"])) { $_vocabularyQuery_ = $context["vocabularyQuery"]; } else { $_vocabularyQuery_ = null; }
                echo $_vocabularyQuery_;
                echo "/1";
                if (isset($context["order"])) { $_order_ = $context["order"]; } else { $_order_ = null; }
                echo $_order_;
                echo "\" class=\"btn btn-small control first-page\">«</a>
                ";
            }
            // line 113
            echo "                ";
            if (isset($context["currentPage"])) { $_currentPage_ = $context["currentPage"]; } else { $_currentPage_ = null; }
            if ((($_currentPage_ - 1) > 0)) {
                // line 114
                echo "                <a href=\"/vocabularies/search/";
                if (isset($context["vocabularyQuery"])) { $_vocabularyQuery_ = $context["vocabularyQuery"]; } else { $_vocabularyQuery_ = null; }
                echo $_vocabularyQuery_;
                echo "/";
                if (isset($context["currentPage"])) { $_currentPage_ = $context["currentPage"]; } else { $_currentPage_ = null; }
                echo ($_currentPage_ - 1);
                if (isset($context["order"])) { $_order_ = $context["order"]; } else { $_order_ = null; }
                echo $_order_;
                echo "\" class=\"btn btn-small page prev\">‹</a>
                ";
            }
            // line 116
            echo "                ";
            if (isset($context["pages"])) { $_pages_ = $context["pages"]; } else { $_pages_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, $_pages_));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 117
                echo "                <a href=\"/vocabularies/search/";
                if (isset($context["vocabularyQuery"])) { $_vocabularyQuery_ = $context["vocabularyQuery"]; } else { $_vocabularyQuery_ = null; }
                echo $_vocabularyQuery_;
                echo "/";
                if (isset($context["i"])) { $_i_ = $context["i"]; } else { $_i_ = null; }
                echo $_i_;
                if (isset($context["order"])) { $_order_ = $context["order"]; } else { $_order_ = null; }
                echo $_order_;
                echo "\" class=\"btn btn-small page ";
                if (isset($context["i"])) { $_i_ = $context["i"]; } else { $_i_ = null; }
                if (isset($context["currentPage"])) { $_currentPage_ = $context["currentPage"]; } else { $_currentPage_ = null; }
                if (($_i_ == $_currentPage_)) {
                    echo "active";
                }
                echo "\">";
                if (isset($context["i"])) { $_i_ = $context["i"]; } else { $_i_ = null; }
                echo $_i_;
                echo "</a>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 119
            echo "                ";
            if (isset($context["currentPage"])) { $_currentPage_ = $context["currentPage"]; } else { $_currentPage_ = null; }
            if (isset($context["pages"])) { $_pages_ = $context["pages"]; } else { $_pages_ = null; }
            if ((($_currentPage_ + 1) <= $_pages_)) {
                // line 120
                echo "                <a href=\"/vocabularies/search/";
                if (isset($context["vocabularyQuery"])) { $_vocabularyQuery_ = $context["vocabularyQuery"]; } else { $_vocabularyQuery_ = null; }
                echo $_vocabularyQuery_;
                echo "/";
                if (isset($context["currentPage"])) { $_currentPage_ = $context["currentPage"]; } else { $_currentPage_ = null; }
                echo ($_currentPage_ + 1);
                if (isset($context["order"])) { $_order_ = $context["order"]; } else { $_order_ = null; }
                echo $_order_;
                echo "\" type=\"button\" class=\"btn btn-small  page next\">›</a>
                ";
            }
            // line 122
            echo "                ";
            if (isset($context["currentPage"])) { $_currentPage_ = $context["currentPage"]; } else { $_currentPage_ = null; }
            if (isset($context["pages"])) { $_pages_ = $context["pages"]; } else { $_pages_ = null; }
            if (($_currentPage_ != $_pages_)) {
                // line 123
                echo "                <a href=\"/vocabularies/search/";
                if (isset($context["vocabularyQuery"])) { $_vocabularyQuery_ = $context["vocabularyQuery"]; } else { $_vocabularyQuery_ = null; }
                echo $_vocabularyQuery_;
                echo "/";
                if (isset($context["pages"])) { $_pages_ = $context["pages"]; } else { $_pages_ = null; }
                echo $_pages_;
                if (isset($context["order"])) { $_order_ = $context["order"]; } else { $_order_ = null; }
                echo $_order_;
                echo "\" type=\"button\" class=\"btn btn-small  control last-page\">»</a>
                ";
            }
            // line 125
            echo "              </div>
              <center style=\"padding-top: 5px;\">";
            // line 126
            if (isset($context["vocabularies_length"])) { $_vocabularies_length_ = $context["vocabularies_length"]; } else { $_vocabularies_length_ = null; }
            echo $_vocabularies_length_;
            echo " results</center>
            </div>  <!-- /.pagination -->
            ";
        }
        // line 129
        echo "          </div> <!-- /#vocabularies -->
      </div><!-- /#content -->
            
";
        // line 132
        $this->env->loadTemplate("_footer.html")->display($context);
        // line 133
        echo "\t<link rel=\"stylesheet\" type=\"text/css\" href=\"/js/lib/jquery.tags_input_master/jquery.tagsinput.css\" />
\t<script>
    window.is_logged = ";
        // line 135
        if (isset($context["is_logged"])) { $_is_logged_ = $context["is_logged"]; } else { $_is_logged_ = null; }
        if ($_is_logged_) {
            echo "1;";
        } else {
            echo "0;";
        }
        // line 136
        echo "
    ";
        // line 137
        if (isset($context["currentUser"])) { $_currentUser_ = $context["currentUser"]; } else { $_currentUser_ = null; }
        if ($_currentUser_) {
            // line 138
            echo "    window.currentUser = { id: \"";
            if (isset($context["currentUser"])) { $_currentUser_ = $context["currentUser"]; } else { $_currentUser_ = null; }
            echo $this->getAttribute($_currentUser_, "id");
            echo "\", email: \"";
            if (isset($context["currentUser"])) { $_currentUser_ = $context["currentUser"]; } else { $_currentUser_ = null; }
            echo $this->getAttribute($_currentUser_, "email");
            echo "\", name: \"";
            if (isset($context["currentUser"])) { $_currentUser_ = $context["currentUser"]; } else { $_currentUser_ = null; }
            echo $this->getAttribute($_currentUser_, "name");
            echo "\", lang_id: \"";
            if (isset($context["currentUser"])) { $_currentUser_ = $context["currentUser"]; } else { $_currentUser_ = null; }
            echo $this->getAttribute($_currentUser_, "lang_id");
            echo "\" };
    ";
        } else {
            // line 140
            echo "    window.currentUser = new Array();
    ";
        }
        // line 142
        echo "    
  </script>
  <script src=\"/js/lib/require.js\"></script>
  <script src=\"/js/home.js\"></script>
\t
";
        // line 147
        $this->env->loadTemplate("_bottom.html")->display($context);
    }

    public function getTemplateName()
    {
        return "vocabularies.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  499 => 147,  492 => 142,  488 => 140,  472 => 138,  469 => 137,  466 => 136,  459 => 135,  455 => 133,  453 => 132,  448 => 129,  441 => 126,  438 => 125,  426 => 123,  421 => 122,  409 => 120,  404 => 119,  380 => 117,  374 => 116,  362 => 114,  358 => 113,  348 => 111,  345 => 110,  341 => 108,  338 => 107,  335 => 106,  332 => 105,  327 => 104,  323 => 103,  320 => 102,  317 => 101,  308 => 97,  298 => 95,  293 => 94,  289 => 92,  283 => 91,  276 => 89,  271 => 88,  266 => 87,  261 => 84,  255 => 83,  248 => 81,  243 => 80,  238 => 79,  229 => 74,  223 => 72,  214 => 70,  210 => 68,  206 => 67,  199 => 66,  189 => 64,  186 => 63,  180 => 62,  177 => 61,  171 => 59,  168 => 58,  162 => 57,  159 => 56,  155 => 55,  150 => 54,  144 => 53,  142 => 52,  134 => 48,  126 => 47,  117 => 43,  112 => 42,  104 => 38,  101 => 37,  97 => 35,  93 => 33,  89 => 32,  85 => 30,  81 => 29,  77 => 27,  73 => 26,  69 => 24,  65 => 23,  62 => 22,  55 => 19,  50 => 18,  45 => 17,  40 => 16,  27 => 5,  25 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}

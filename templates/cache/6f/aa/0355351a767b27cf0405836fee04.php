<?php

/* user_vocabularies.html */
class __TwigTemplate_6faa0355351a767b27cf0405836fee04 extends Twig_Template
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
            <!--
            var pages = Math.ceil(vocabularies_length/10);
            var user_id = users[0].id;
            -->
            ";
        // line 13
        if (isset($context["users"])) { $_users_ = $context["users"]; } else { $_users_ = null; }
        $context["page_user"] = $this->getAttribute($_users_, 0, array(), "array");
        // line 14
        echo "            
            <div id=\"user-vocabularies-header\">
              <div class=\"row-fluid\">
                <div class=\"span6\">
                  <h3 style=\"margin: 0 0 5px 0;\">
                    <a href=\"/vocabularies/user/";
        // line 19
        if (isset($context["page_user"])) { $_page_user_ = $context["page_user"]; } else { $_page_user_ = null; }
        echo $this->getAttribute($_page_user_, "id");
        echo "\"><img src=\"";
        if (isset($context["page_user"])) { $_page_user_ = $context["page_user"]; } else { $_page_user_ = null; }
        echo $this->getAttribute($_page_user_, "photo");
        echo "\" class=\"user-image\" /></a> 
                    <a href=\"/vocabularies/user/";
        // line 20
        if (isset($context["page_user"])) { $_page_user_ = $context["page_user"]; } else { $_page_user_ = null; }
        echo $this->getAttribute($_page_user_, "id");
        echo "\">";
        if (isset($context["page_user"])) { $_page_user_ = $context["page_user"]; } else { $_page_user_ = null; }
        echo $this->getAttribute($_page_user_, "name");
        echo "</a>
                  </h3>
                  ";
        // line 22
        if (isset($context["is_logged"])) { $_is_logged_ = $context["is_logged"]; } else { $_is_logged_ = null; }
        if (isset($context["currentUser"])) { $_currentUser_ = $context["currentUser"]; } else { $_currentUser_ = null; }
        if ((($_is_logged_ == 1) && $this->getAttribute($_currentUser_, "id"))) {
            // line 23
            echo "                    ";
            if (isset($context["currentUser"])) { $_currentUser_ = $context["currentUser"]; } else { $_currentUser_ = null; }
            if (isset($context["page_user"])) { $_page_user_ = $context["page_user"]; } else { $_page_user_ = null; }
            if (($this->getAttribute($_currentUser_, "id") != $this->getAttribute($_page_user_, "id"))) {
                // line 24
                echo "                    <div id=\"subscribe-controls\"></div>
                    ";
            }
            // line 26
            echo "                  ";
        }
        // line 27
        echo "                  ";
        if (isset($context["is_logged"])) { $_is_logged_ = $context["is_logged"]; } else { $_is_logged_ = null; }
        if (($_is_logged_ == 0)) {
            // line 28
            echo "                  <a href=\"/signup\" class=\"btn btn-mini btn-info _tooltip\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"If you are logged in, you can subscribe user's (";
            if (isset($context["page_user"])) { $_page_user_ = $context["page_user"]; } else { $_page_user_ = null; }
            echo $this->getAttribute($_page_user_, "name");
            echo ") vocabularies\"><span class=\"icon icon-bookmark icon-white\"></span> Subscribe</a>
                  ";
        }
        // line 30
        echo "                </div>
                <div class=\"span6\" id=\"user-statistics\">

                  <div class=\"pull-right\">
                    <h5>";
        // line 34
        if (isset($context["page_user"])) { $_page_user_ = $context["page_user"]; } else { $_page_user_ = null; }
        echo $this->getAttribute($_page_user_, "num_vocabularies");
        echo " Vocabularies</h5>
                    <hr>
                    <h5><span id=\"user_num_subscribes\">";
        // line 36
        if (isset($context["page_user"])) { $_page_user_ = $context["page_user"]; } else { $_page_user_ = null; }
        echo $this->getAttribute($_page_user_, "num_subscribes");
        echo "</span> Subscribers</h5>
                    
                  </div>
                </div><!-- /.span6 -->
              </div><!-- /.row-fluid -->
             
            </div><!-- /#user-vocabularies-header -->
            <hr style=\"margin: 5px 0;\">

    
   

            <form id=\"user-vocabulary-search\" >
              <input type=\"hidden\" name=\"user_id\" required=\"\" value=\"";
        // line 49
        if (isset($context["page_user"])) { $_page_user_ = $context["page_user"]; } else { $_page_user_ = null; }
        echo $this->getAttribute($_page_user_, "id");
        echo "\">
              <div class=\"input-append input-prepend \">
                ";
        // line 51
        if (isset($context["vocabularyQuery"])) { $_vocabularyQuery_ = $context["vocabularyQuery"]; } else { $_vocabularyQuery_ = null; }
        if (($_vocabularyQuery_ != "")) {
            // line 52
            echo "                <a href=\"/vocabularies/user/";
            if (isset($context["page_user"])) { $_page_user_ = $context["page_user"]; } else { $_page_user_ = null; }
            echo $this->getAttribute($_page_user_, "id");
            echo "\" class=\"btn\" >Show All</a>
                ";
        }
        // line 54
        echo "                
                <input type=\"text\" class=\"search-query span3\" placeholder=\"Search\" name=\"vocabularyQuery\"  value=\"";
        // line 55
        if (isset($context["vocabularyQuery"])) { $_vocabularyQuery_ = $context["vocabularyQuery"]; } else { $_vocabularyQuery_ = null; }
        echo $_vocabularyQuery_;
        echo "\">
               <button type=\"submit\" class=\"btn\">Search</button> 
                
              </div>
            </form>
            <hr style=\"margin: 0;\">
            <div id=\"vocabulary-list\">
              ";
        // line 62
        if (isset($context["vocabularies"])) { $_vocabularies_ = $context["vocabularies"]; } else { $_vocabularies_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_vocabularies_);
        foreach ($context['_seq'] as $context["_key"] => $context["vocabulary"]) {
            // line 63
            echo "                <div class=\"media\" id=\"vocabulary-list-";
            if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
            echo $this->getAttribute($_vocabulary_, "id");
            echo "\">

                  
                  <div class=\"media-body\">
                    <h4 class=\"media-heading\"><a href=\"/exercise/";
            // line 67
            if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
            echo $this->getAttribute($_vocabulary_, "id");
            echo "\">";
            if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
            echo $this->getAttribute($_vocabulary_, "title");
            echo "</a></h4>
                    <h5>";
            // line 68
            if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
            echo $this->getAttribute($_vocabulary_, "source");
            echo "</h5>
                    <small>
                      

                      ";
            // line 72
            $context["vocabulary_user"] = "";
            // line 73
            echo "                      ";
            if (isset($context["users"])) { $_users_ = $context["users"]; } else { $_users_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($_users_);
            foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
                // line 74
                echo "                        ";
                if (isset($context["user"])) { $_user_ = $context["user"]; } else { $_user_ = null; }
                if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
                if (($this->getAttribute($_user_, "id") == $this->getAttribute($_vocabulary_, "user_id"))) {
                    // line 75
                    echo "                          ";
                    if (isset($context["user"])) { $_user_ = $context["user"]; } else { $_user_ = null; }
                    $context["vocabulary_user"] = $_user_;
                    // line 76
                    echo "                        ";
                }
                // line 77
                echo "                      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 78
            echo "
                      created <strong>";
            // line 79
            if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
            echo $this->getAttribute($_vocabulary_, "elasped_time");
            echo "</strong>

                      ";
            // line 81
            if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
            if ($this->getAttribute($_vocabulary_, "source")) {
                // line 82
                echo "                      for <strong>";
                if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
                echo $this->getAttribute($_vocabulary_, "source");
                echo "</strong>
                        ";
                // line 83
                if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
                if ($this->getAttribute($_vocabulary_, "source_url")) {
                    // line 84
                    echo "                        for <a href=\"http://";
                    if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
                    echo $this->getAttribute($_vocabulary_, "source_url");
                    echo "\" target=\"_blank\"><strong>";
                    if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
                    echo $this->getAttribute($_vocabulary_, "source");
                    echo "</strong></a>
                        ";
                } else {
                    // line 86
                    echo "                        for <strong>";
                    if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
                    echo $this->getAttribute($_vocabulary_, "source");
                    echo "</strong>
                        ";
                }
                // line 87
                echo " 
                      ";
            }
            // line 88
            echo " 

                      from user <a href=\"/vocabularies/user/";
            // line 90
            if (isset($context["vocabulary_user"])) { $_vocabulary_user_ = $context["vocabulary_user"]; } else { $_vocabulary_user_ = null; }
            echo $this->getAttribute($_vocabulary_user_, "id");
            echo "\">";
            if (isset($context["vocabulary_user"])) { $_vocabulary_user_ = $context["vocabulary_user"]; } else { $_vocabulary_user_ = null; }
            echo $this->getAttribute($_vocabulary_user_, "name");
            echo "</a>, 

                      consists <strong>";
            // line 92
            if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
            echo $this->getAttribute($_vocabulary_, "num_translations");
            echo "</strong> Words 

                      and user has <strong>";
            // line 94
            if (isset($context["vocabulary_user"])) { $_vocabulary_user_ = $context["vocabulary_user"]; } else { $_vocabulary_user_ = null; }
            echo $this->getAttribute($_vocabulary_user_, "num_subscribes");
            echo "</strong> subscribers

                    </small>

                    <span class=\"label label-info\">
                      ";
            // line 99
            if (isset($context["langs"])) { $_langs_ = $context["langs"]; } else { $_langs_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($_langs_);
            foreach ($context['_seq'] as $context["_key"] => $context["lang"]) {
                // line 100
                echo "                        ";
                if (isset($context["lang"])) { $_lang_ = $context["lang"]; } else { $_lang_ = null; }
                if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
                if (($this->getAttribute($_lang_, "id") == $this->getAttribute($_vocabulary_, "lang_1_id"))) {
                    // line 101
                    echo "                          ";
                    if (isset($context["lang"])) { $_lang_ = $context["lang"]; } else { $_lang_ = null; }
                    echo $this->getAttribute($_lang_, "title");
                    echo "
                        ";
                }
                // line 103
                echo "                      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lang'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 104
            echo "                    </span>

                    <span class=\"label label-info\">
                      ";
            // line 107
            if (isset($context["langs"])) { $_langs_ = $context["langs"]; } else { $_langs_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($_langs_);
            foreach ($context['_seq'] as $context["_key"] => $context["lang"]) {
                // line 108
                echo "                        ";
                if (isset($context["lang"])) { $_lang_ = $context["lang"]; } else { $_lang_ = null; }
                if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
                if (($this->getAttribute($_lang_, "id") == $this->getAttribute($_vocabulary_, "lang_2_id"))) {
                    // line 109
                    echo "                          ";
                    if (isset($context["lang"])) { $_lang_ = $context["lang"]; } else { $_lang_ = null; }
                    echo $this->getAttribute($_lang_, "title");
                    echo "
                        ";
                }
                // line 111
                echo "                      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lang'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 112
            echo "                    </span>
                    
                    ";
            // line 114
            if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_split_filter($this->getAttribute($_vocabulary_, "labels"), ","));
            foreach ($context['_seq'] as $context["_key"] => $context["label"]) {
                // line 115
                echo "                    <span class=\"label\">";
                if (isset($context["label"])) { $_label_ = $context["label"]; } else { $_label_ = null; }
                echo $_label_;
                echo "</span>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['label'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 117
            echo "                  </div>
                </div>

              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['vocabulary'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 121
        echo "            </div><!-- /#vocabulary-list -->
            
            ";
        // line 123
        if (isset($context["pages"])) { $_pages_ = $context["pages"]; } else { $_pages_ = null; }
        if (($_pages_ > 1)) {
            // line 124
            echo "            <div class=\"pagination pagination-centered\">
              <div class=\"btn-group btn-centered\" data-toggle=\"btn-radio\">
                ";
            // line 126
            if (isset($context["currentPage"])) { $_currentPage_ = $context["currentPage"]; } else { $_currentPage_ = null; }
            if (($_currentPage_ != 1)) {
                // line 127
                echo "                <a href=\"/vocabularies/user/";
                if (isset($context["page_user"])) { $_page_user_ = $context["page_user"]; } else { $_page_user_ = null; }
                echo $this->getAttribute($_page_user_, "id");
                echo "/1\" class=\"btn btn-small control first-page\">«</a>
                ";
            }
            // line 129
            echo "                ";
            if (isset($context["currentPage"])) { $_currentPage_ = $context["currentPage"]; } else { $_currentPage_ = null; }
            if ((($_currentPage_ - 1) > 0)) {
                // line 130
                echo "                <a href=\"/vocabularies/user/";
                if (isset($context["page_user"])) { $_page_user_ = $context["page_user"]; } else { $_page_user_ = null; }
                echo $this->getAttribute($_page_user_, "id");
                echo "/";
                if (isset($context["currentPage"])) { $_currentPage_ = $context["currentPage"]; } else { $_currentPage_ = null; }
                echo ($_currentPage_ - 1);
                echo "\" class=\"btn btn-small page prev\">‹</a>
                ";
            }
            // line 132
            echo "                ";
            if (isset($context["pages"])) { $_pages_ = $context["pages"]; } else { $_pages_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, $_pages_));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 133
                echo "                <a href=\"/vocabularies/user/";
                if (isset($context["page_user"])) { $_page_user_ = $context["page_user"]; } else { $_page_user_ = null; }
                echo $this->getAttribute($_page_user_, "id");
                echo "/";
                if (isset($context["i"])) { $_i_ = $context["i"]; } else { $_i_ = null; }
                echo $_i_;
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
            // line 135
            echo "                ";
            if (isset($context["currentPage"])) { $_currentPage_ = $context["currentPage"]; } else { $_currentPage_ = null; }
            if (isset($context["pages"])) { $_pages_ = $context["pages"]; } else { $_pages_ = null; }
            if ((($_currentPage_ + 1) <= $_pages_)) {
                // line 136
                echo "                <a href=\"/vocabularies/user/";
                if (isset($context["page_user"])) { $_page_user_ = $context["page_user"]; } else { $_page_user_ = null; }
                echo $this->getAttribute($_page_user_, "id");
                echo "/";
                if (isset($context["currentPage"])) { $_currentPage_ = $context["currentPage"]; } else { $_currentPage_ = null; }
                echo ($_currentPage_ + 1);
                echo "\" type=\"button\" class=\"btn btn-small  page next\">›</a>
                ";
            }
            // line 138
            echo "                ";
            if (isset($context["currentPage"])) { $_currentPage_ = $context["currentPage"]; } else { $_currentPage_ = null; }
            if (isset($context["pages"])) { $_pages_ = $context["pages"]; } else { $_pages_ = null; }
            if (($_currentPage_ != $_pages_)) {
                // line 139
                echo "                <a href=\"/vocabularies/user/";
                if (isset($context["page_user"])) { $_page_user_ = $context["page_user"]; } else { $_page_user_ = null; }
                echo $this->getAttribute($_page_user_, "id");
                echo "/";
                if (isset($context["pages"])) { $_pages_ = $context["pages"]; } else { $_pages_ = null; }
                echo $_pages_;
                echo "\" type=\"button\" class=\"btn btn-small  control last-page\">»</a>
                ";
            }
            // line 141
            echo "              </div>
              <span class=\"pull-right\">";
            // line 142
            if (isset($context["vocabularies_length"])) { $_vocabularies_length_ = $context["vocabularies_length"]; } else { $_vocabularies_length_ = null; }
            echo $_vocabularies_length_;
            echo " results</span>
            </div>  <!-- /.pagination -->
            ";
        }
        // line 145
        echo "
            
          </div> <!-- /#vocabularies -->
      </div><!-- /#content -->
            
";
        // line 150
        $this->env->loadTemplate("_footer.html")->display($context);
        // line 151
        echo "\t<link rel=\"stylesheet\" type=\"text/css\" href=\"/js/lib/jquery.tags_input_master/jquery.tagsinput.css\" />
\t<script>
    window.is_logged = ";
        // line 153
        if (isset($context["is_logged"])) { $_is_logged_ = $context["is_logged"]; } else { $_is_logged_ = null; }
        if ($_is_logged_) {
            echo "1;";
        } else {
            echo "0;";
        }
        // line 154
        echo "
    ";
        // line 155
        if (isset($context["currentUser"])) { $_currentUser_ = $context["currentUser"]; } else { $_currentUser_ = null; }
        if ($_currentUser_) {
            // line 156
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
            // line 158
            echo "    window.currentUser = new Array();
    ";
        }
        // line 160
        echo "
    window.user_id = ";
        // line 161
        if (isset($context["vocabularyUser"])) { $_vocabularyUser_ = $context["vocabularyUser"]; } else { $_vocabularyUser_ = null; }
        echo $_vocabularyUser_;
        echo ";

    ";
        // line 163
        if (isset($context["users"])) { $_users_ = $context["users"]; } else { $_users_ = null; }
        if (twig_length_filter($this->env, $_users_)) {
            // line 164
            echo "    window.listusers = [";
            if (isset($context["users"])) { $_users_ = $context["users"]; } else { $_users_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($_users_);
            foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
                echo "{ id: \"";
                if (isset($context["user"])) { $_user_ = $context["user"]; } else { $_user_ = null; }
                echo $this->getAttribute($_user_, "id");
                echo "\", name: \"";
                if (isset($context["user"])) { $_user_ = $context["user"]; } else { $_user_ = null; }
                echo $this->getAttribute($_user_, "name");
                echo "\",  num_vocabularies: ";
                if (isset($context["user"])) { $_user_ = $context["user"]; } else { $_user_ = null; }
                echo $this->getAttribute($_user_, "num_vocabularies");
                echo ",  num_subscribes: ";
                if (isset($context["user"])) { $_user_ = $context["user"]; } else { $_user_ = null; }
                echo $this->getAttribute($_user_, "num_subscribes");
                echo " }, ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "];
    ";
        }
        // line 166
        echo "
\t</script>
  <script src=\"/js/lib/require.js\"></script>
  <script src=\"/js/user_vocabularies.js\"></script>
\t
";
        // line 171
        $this->env->loadTemplate("_bottom.html")->display($context);
    }

    public function getTemplateName()
    {
        return "user_vocabularies.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  549 => 171,  542 => 166,  516 => 164,  513 => 163,  507 => 161,  504 => 160,  500 => 158,  484 => 156,  481 => 155,  478 => 154,  471 => 153,  467 => 151,  465 => 150,  458 => 145,  451 => 142,  448 => 141,  438 => 139,  433 => 138,  423 => 136,  418 => 135,  396 => 133,  390 => 132,  380 => 130,  376 => 129,  369 => 127,  366 => 126,  362 => 124,  359 => 123,  355 => 121,  346 => 117,  336 => 115,  331 => 114,  327 => 112,  321 => 111,  314 => 109,  309 => 108,  304 => 107,  299 => 104,  293 => 103,  286 => 101,  281 => 100,  276 => 99,  267 => 94,  261 => 92,  252 => 90,  248 => 88,  244 => 87,  237 => 86,  227 => 84,  224 => 83,  218 => 82,  215 => 81,  209 => 79,  206 => 78,  200 => 77,  197 => 76,  193 => 75,  188 => 74,  182 => 73,  180 => 72,  172 => 68,  164 => 67,  155 => 63,  150 => 62,  139 => 55,  136 => 54,  129 => 52,  126 => 51,  120 => 49,  103 => 36,  97 => 34,  91 => 30,  84 => 28,  80 => 27,  77 => 26,  73 => 24,  68 => 23,  64 => 22,  55 => 20,  47 => 19,  40 => 14,  37 => 13,  27 => 5,  25 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}

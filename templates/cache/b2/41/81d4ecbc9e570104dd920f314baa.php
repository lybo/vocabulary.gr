<?php

/* exercises.html */
class __TwigTemplate_b24181d4ecbc9e570104dd920f314baa extends Twig_Template
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
        $this->env->loadTemplate("_right_sidebar_exercise.html")->display($context);
        // line 5
        echo "      
\t\t  <div id=\"content\">
          <div style=\"width: 0; height:0; overflow: hidden;\" id=\"speaker_phones\"><div id=\"speaker_player\"></div></div><!--  -->
          <h4 id=\"vocabularyTitle\">";
        // line 8
        if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
        echo $this->getAttribute($_vocabulary_, "title");
        echo "</h4>
          ";
        // line 9
        if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
        if ($this->getAttribute($_vocabulary_, "source")) {
            echo " 
            ";
            // line 10
            if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
            if ($this->getAttribute($_vocabulary_, "source_url")) {
                // line 11
                echo "            <h6 id=\"vocabularySource\"><a href=\"http://";
                if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
                echo $this->getAttribute($_vocabulary_, "source_url");
                echo "\" target=\"_blank\">";
                if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
                echo $this->getAttribute($_vocabulary_, "source");
                echo "</a></h6>
            ";
            } else {
                // line 13
                echo "            <h6 id=\"vocabularySource\">";
                if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
                echo $this->getAttribute($_vocabulary_, "source");
                echo "</h6>
            ";
            }
            // line 15
            echo "          ";
        }
        // line 16
        echo "          <!-- AddThis Button END -->
          
            <hr/>
            <!-- Modal -->
            <div id=\"howitworks\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
              <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
                <h3 id=\"myModalLabel\">How it works</h3>
              </div>
              <div class=\"modal-body\">
                <p>Under construction</p>
              </div>
              <div class=\"modal-footer\">
                <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
              </div>
            </div>
            <div id=\"library-controls\" class=\"";
        // line 32
        if (isset($context["vocabularyLibrary"])) { $_vocabularyLibrary_ = $context["vocabularyLibrary"]; } else { $_vocabularyLibrary_ = null; }
        if ($_vocabularyLibrary_) {
            echo "include-library";
        } else {
            echo "exclude-library";
        }
        echo "\">

              <a href=\"#\" id=\"help-button\" class=\"btn btn-mini btn-info _tooltip\"  data-placement=\"top\" title=\"Watch a small introduction about this page\" ><span class=\"icon icon-info-sign icon-white\"></span> Introduction</a>

              <a href=\"#howitworks\"  class=\"btn btn-mini btn-info _tooltip\"  data-placement=\"top\" title=\"Read how you can exercise a vocabulary\" data-toggle=\"modal\"><span class=\"icon icon-info-sign icon-white\"></span> How it works</a>
             
              
            ";
        // line 39
        if (isset($context["is_logged"])) { $_is_logged_ = $context["is_logged"]; } else { $_is_logged_ = null; }
        if ($_is_logged_) {
            // line 40
            echo "              <button id=\"add-library\" class=\"btn btn-mini btn-info  _tooltip\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Add to your Library for your convenience\" data-vocabularyId=\"";
            if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
            echo $this->getAttribute($_vocabulary_, "id");
            echo "\"><span class=\"icon icon-bookmark icon-white\"></span> Add to your Library</button>

              <button id=\"remove-library\" class=\"btn btn-mini btn-danger  _tooltip\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"This Vocabulary belongs into your Library. Remove it from your Library\" ";
            // line 42
            if (isset($context["vocabularyLibrary"])) { $_vocabularyLibrary_ = $context["vocabularyLibrary"]; } else { $_vocabularyLibrary_ = null; }
            if ($_vocabularyLibrary_) {
                echo "data-libraryid=\"";
                if (isset($context["vocabularyLibrary"])) { $_vocabularyLibrary_ = $context["vocabularyLibrary"]; } else { $_vocabularyLibrary_ = null; }
                echo $this->getAttribute($_vocabularyLibrary_, "id");
                echo "\"";
            }
            echo "><span class=\"icon icon-bookmark icon-white\"></span> Remove from your Library</button>
            ";
        }
        // line 44
        echo "            </div>
          
          


          <div id=\"execise_loader\">Please wait...<br/><img src=\"/images/loader.gif\" /></div>
          <div id=\"all-exercises\">
            
            <div id=\"exercise-recommendations\"></div>  
            <div id=\"exercise-overall-scoring\"></div>

            <div class=\"tabbable\" id=\"exercise_tabs\"> <!-- Only required for left/right tabs -->
              <ul class=\"nav nav-tabs\">
                <li class=\"active\"><a href=\"#exercises\" data-toggle=\"tab\">Exercise <span class=\"icon icon-eye-open\"></span></a></li>
                <li><a href=\"#exercises2\" data-toggle=\"tab\">Exercise <span class=\"icon icon-headphones\"></span></a></li>
                <li><a href=\"#comments\" data-toggle=\"tab\">Comments <span class=\"icon icon-comment\"></span></a></li>
                
              </ul>
              <div class=\"tab-content\">

                <div class=\"tab-pane active\" id=\"exercises\">
                  <div class=\"translation practice\" id=\"exercise-list\">
                    <table class=\"table table-striped table-condensed\" style=\"width: 448px;\">
                      <thead>
                        
                        <tr id=\"header-langs\"></tr>
                      </thead>
                      <tbody id=\"exercise-list-body\">
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan=\"4\">
                            <button class=\"btn btn-inverse span4\" id=\"validation\"><span class=\"icon icon-question-sign icon-white\"></span> Validate </button>
                            <button class=\"btn span4\" id=\"try_again\"><span class=\"icon icon-repeat\"></span> Try again! </button>
                          </th>
                        </tr>
                        
                      </tfoot>
                    </table>

                  </div>
                </div>
                <div class=\"tab-pane\" id=\"exercises2\">
                  <div class=\"translation practice\" id=\"exercise2-list\">
                    <table class=\"table table-striped table-condensed\" style=\"width: 448px;\">
                      <thead>
                        
                        <tr id=\"header-langs2\">
                            <th></th>
                            <th></th>
                            <th><span class=\"header2\"></span></th>
                            <th></th>
                        </tr>
                      </thead>
                      <tbody id=\"exercise2-list-body\">
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan=\"4\">
                            <button class=\"btn btn-inverse span4\" id=\"validation2\"><span class=\"icon icon-question-sign icon-white\"></span> Validate </button>
                            <button class=\"btn span4\" id=\"try_again2\"><span class=\"icon icon-repeat\"></span> Try again! </button>
                          </th>
                        </tr>
                        
                      </tfoot>
                    </table>
                  </div>
                </div>
                <div class=\"tab-pane\" id=\"comments\">
                  <div style=\"padding:10px;\">
                    <h3>Comments</h3>
                    Under Construction
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div><!-- /#content -->

      
                       
";
        // line 125
        $this->env->loadTemplate("_footer.html")->display($context);
        // line 126
        echo "\t<link rel=\"stylesheet\" type=\"text/css\" href=\"/js/lib/jquery.tags_input_master/jquery.tagsinput.css\" />
\t<script>

    window.is_logged = ";
        // line 129
        if (isset($context["is_logged"])) { $_is_logged_ = $context["is_logged"]; } else { $_is_logged_ = null; }
        if ($_is_logged_) {
            echo "1;";
        } else {
            echo "0;";
        }
        // line 130
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
    window.vocabularyOwner = { id: \"";
        // line 131
        if (isset($context["vocabularyOwner"])) { $_vocabularyOwner_ = $context["vocabularyOwner"]; } else { $_vocabularyOwner_ = null; }
        echo $this->getAttribute($_vocabularyOwner_, "id");
        echo "\", email: \"";
        if (isset($context["vocabularyOwner"])) { $_vocabularyOwner_ = $context["vocabularyOwner"]; } else { $_vocabularyOwner_ = null; }
        echo $this->getAttribute($_vocabularyOwner_, "email");
        echo "\", name: \"";
        if (isset($context["vocabularyOwner"])) { $_vocabularyOwner_ = $context["vocabularyOwner"]; } else { $_vocabularyOwner_ = null; }
        echo $this->getAttribute($_vocabularyOwner_, "name");
        echo "\", num_subscribes: \"";
        if (isset($context["vocabularyOwner"])) { $_vocabularyOwner_ = $context["vocabularyOwner"]; } else { $_vocabularyOwner_ = null; }
        echo $this->getAttribute($_vocabularyOwner_, "num_subscribes");
        echo "\" };

    ";
        // line 133
        if (isset($context["vocabularyLibrary"])) { $_vocabularyLibrary_ = $context["vocabularyLibrary"]; } else { $_vocabularyLibrary_ = null; }
        if ($_vocabularyLibrary_) {
            // line 134
            echo "    window.vocabularyLibrary = {id: \"";
            if (isset($context["vocabularyLibrary"])) { $_vocabularyLibrary_ = $context["vocabularyLibrary"]; } else { $_vocabularyLibrary_ = null; }
            echo $this->getAttribute($_vocabularyLibrary_, "id");
            echo "\" };
    ";
        }
        // line 136
        echo "
\t\t";
        // line 137
        if (isset($context["translations"])) { $_translations_ = $context["translations"]; } else { $_translations_ = null; }
        if (twig_length_filter($this->env, $_translations_)) {
            // line 138
            echo "\t\twindow.translations = [";
            if (isset($context["translations"])) { $_translations_ = $context["translations"]; } else { $_translations_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($_translations_);
            foreach ($context['_seq'] as $context["_key"] => $context["translation"]) {
                // line 139
                echo "      {id: \"";
                if (isset($context["translation"])) { $_translation_ = $context["translation"]; } else { $_translation_ = null; }
                echo $this->getAttribute($_translation_, "id");
                echo "\", word_1: \"";
                if (isset($context["translation"])) { $_translation_ = $context["translation"]; } else { $_translation_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_translation_, "word_1"));
                echo "\", word_2: \"";
                if (isset($context["translation"])) { $_translation_ = $context["translation"]; } else { $_translation_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_translation_, "word_2"));
                echo "\" },
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['translation'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 140
            echo "];
\t\t";
        } else {
            // line 142
            echo "    window.translations = new Array();  
    ";
        }
        // line 144
        echo "
    ";
        // line 145
        if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
        if ($_vocabulary_) {
            // line 146
            echo "    window.vocabulary = { id: ";
            if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
            echo $this->getAttribute($_vocabulary_, "id");
            echo ", title: \"";
            if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_vocabulary_, "title"));
            echo "\", user_id: ";
            if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
            echo $this->getAttribute($_vocabulary_, "user_id");
            echo ", source: \"";
            if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_vocabulary_, "source"));
            echo "\", source_url: \"";
            if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_vocabulary_, "source_url"));
            echo "\", lang_1_id: ";
            if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
            echo $this->getAttribute($_vocabulary_, "lang_1_id");
            echo ", lang_2_id: ";
            if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
            echo $this->getAttribute($_vocabulary_, "lang_2_id");
            echo ", date_in: ";
            if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
            echo $this->getAttribute($_vocabulary_, "date_in");
            echo ", labels: \"";
            if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_vocabulary_, "labels"));
            echo "\", num_translations: ";
            if (isset($context["vocabulary"])) { $_vocabulary_ = $context["vocabulary"]; } else { $_vocabulary_ = null; }
            echo $this->getAttribute($_vocabulary_, "num_translations");
            echo " };
    ";
        }
        // line 148
        echo "
    window.langs = [ {id: \"1\", title: \"AFRIKAANS\", short_title: \"af\"}, {id: \"2\", title: \"ALBANIAN\", short_title: \"sq\"}, {id: \"3\", title: \"AMHARIC\", short_title: \"am\"}, {id: \"4\", title: \"ARABIC\", short_title: \"ar\"}, {id: \"5\", title: \"ARMENIAN\", short_title: \"hy\"}, {id: \"6\", title: \"AZERBAIJANI\", short_title: \"az\"}, {id: \"7\", title: \"BASQUE\", short_title: \"eu\"}, {id: \"8\", title: \"BELARUSIAN\", short_title: \"be\"}, {id: \"9\", title: \"BENGALI\", short_title: \"bn\"}, {id: \"10\", title: \"BIHARI\", short_title: \"bh\"}, {id: \"11\", title: \"BRETON\", short_title: \"br\"}, {id: \"12\", title: \"BULGARIAN\", short_title: \"bg\"}, {id: \"13\", title: \"BURMESE\", short_title: \"my\"}, {id: \"14\", title: \"CATALAN\", short_title: \"ca\"}, {id: \"15\", title: \"CHEROKEE\", short_title: \"chr\"}, {id: \"16\", title: \"CHINESE\", short_title: \"zh\"}, {id: \"17\", title: \"CHINESE_SIMPLIFIED\", short_title: \"zh-CN\"}, {id: \"18\", title: \"CHINESE_TRADITIONAL\", short_title: \"zh-TW\"}, {id: \"19\", title: \"CORSICAN\", short_title: \"co\"}, {id: \"20\", title: \"CROATIAN\", short_title: \"hr\"}, {id: \"21\", title: \"CZECH\", short_title: \"cs\"}, {id: \"22\", title: \"DANISH\", short_title: \"da\"}, {id: \"23\", title: \"DHIVEHI\", short_title: \"dv\"}, {id: \"24\", title: \"DUTCH\", short_title: \"nl\"}, {id: \"25\", title: \"ENGLISH\", short_title: \"en\"}, {id: \"26\", title: \"ESPERANTO\", short_title: \"eo\"}, {id: \"27\", title: \"ESTONIAN\", short_title: \"et\"}, {id: \"28\", title: \"FAROESE\", short_title: \"fo\"}, {id: \"29\", title: \"FILIPINO\", short_title: \"tl\"}, {id: \"30\", title: \"FINNISH\", short_title: \"fi\"}, {id: \"31\", title: \"FRENCH\", short_title: \"fr\"}, {id: \"32\", title: \"FRISIAN\", short_title: \"fy\"}, {id: \"33\", title: \"GALICIAN\", short_title: \"gl\"}, {id: \"34\", title: \"GEORGIAN\", short_title: \"ka\"}, {id: \"35\", title: \"GERMAN\", short_title: \"de\"}, {id: \"36\", title: \"GREEK\", short_title: \"el\"}, {id: \"37\", title: \"GUJARATI\", short_title: \"gu\"}, {id: \"38\", title: \"HAITIAN_CREOLE\", short_title: \"ht\"}, {id: \"39\", title: \"HEBREW\", short_title: \"iw\"}, {id: \"40\", title: \"HINDI\", short_title: \"hi\"}, {id: \"41\", title: \"HUNGARIAN\", short_title: \"hu\"}, {id: \"42\", title: \"ICELANDIC\", short_title: \"is\"}, {id: \"43\", title: \"INDONESIAN\", short_title: \"id\"}, {id: \"44\", title: \"INUKTITUT\", short_title: \"iu\"}, {id: \"45\", title: \"IRISH\", short_title: \"ga\"}, {id: \"46\", title: \"ITALIAN\", short_title: \"it\"}, {id: \"47\", title: \"JAPANESE\", short_title: \"ja\"}, {id: \"48\", title: \"JAVANESE\", short_title: \"jw\"}, {id: \"49\", title: \"KANNADA\", short_title: \"kn\"}, {id: \"50\", title: \"KAZAKH\", short_title: \"kk\"}, {id: \"51\", title: \"KHMER\", short_title: \"km\"}, {id: \"52\", title: \"KOREAN\", short_title: \"ko\"}, {id: \"53\", title: \"KURDISH\", short_title: \"ku\"}, {id: \"54\", title: \"KYRGYZ\", short_title: \"ky\"}, {id: \"55\", title: \"LAO\", short_title: \"lo\"}, {id: \"56\", title: \"LATIN\", short_title: \"la\"}, {id: \"57\", title: \"LATVIAN\", short_title: \"lv\"}, {id: \"58\", title: \"LITHUANIAN\", short_title: \"lt\"}, {id: \"59\", title: \"LUXEMBOURGISH\", short_title: \"lb\"}, {id: \"60\", title: \"MACEDONIAN\", short_title: \"mk\"}, {id: \"61\", title: \"MALAY\", short_title: \"ms\"}, {id: \"62\", title: \"MALAYALAM\", short_title: \"ml\"}, {id: \"63\", title: \"MALTESE\", short_title: \"mt\"}, {id: \"64\", title: \"MAORI\", short_title: \"mi\"}, {id: \"65\", title: \"MARATHI\", short_title: \"mr\"}, {id: \"66\", title: \"MONGOLIAN\", short_title: \"mn\"}, {id: \"67\", title: \"NEPALI\", short_title: \"ne\"}, {id: \"68\", title: \"NORWEGIAN\", short_title: \"no\"}, {id: \"69\", title: \"OCCITAN\", short_title: \"oc\"}, {id: \"70\", title: \"ORIYA\", short_title: \"or\"}, {id: \"71\", title: \"PASHTO\", short_title: \"ps\"}, {id: \"72\", title: \"PERSIAN\", short_title: \"fa\"}, {id: \"73\", title: \"POLISH\", short_title: \"pl\"}, {id: \"74\", title: \"PORTUGUESE\", short_title: \"pt\"}, {id: \"75\", title: \"PORTUGUESE_PORTUGAL\", short_title: \"pt-PT\"}, {id: \"76\", title: \"PUNJABI\", short_title: \"pa\"}, {id: \"77\", title: \"QUECHUA\", short_title: \"qu\"}, {id: \"78\", title: \"ROMANIAN\", short_title: \"ro\"}, {id: \"79\", title: \"RUSSIAN\", short_title: \"ru\"}, {id: \"80\", title: \"SANSKRIT\", short_title: \"sa\"}, {id: \"81\", title: \"SCOTS_GAELIC\", short_title: \"gd\"}, {id: \"82\", title: \"SERBIAN\", short_title: \"sr\"}, {id: \"83\", title: \"SINDHI\", short_title: \"sd\"}, {id: \"84\", title: \"SINHALESE\", short_title: \"si\"}, {id: \"85\", title: \"SLOVAK\", short_title: \"sk\"}, {id: \"86\", title: \"SLOVENIAN\", short_title: \"sl\"}, {id: \"87\", title: \"SPANISH\", short_title: \"es\"}, {id: \"88\", title: \"SUNDANESE\", short_title: \"su\"}, {id: \"89\", title: \"SWAHILI\", short_title: \"sw\"}, {id: \"90\", title: \"SWEDISH\", short_title: \"sv\"}, {id: \"91\", title: \"SYRIAC\", short_title: \"syr\"}, {id: \"92\", title: \"TAJIK\", short_title: \"tg\"}, {id: \"93\", title: \"TAMIL\", short_title: \"ta\"}, {id: \"94\", title: \"TATAR\", short_title: \"tt\"}, {id: \"95\", title: \"TELUGU\", short_title: \"te\"}, {id: \"96\", title: \"THAI\", short_title: \"th\"}, {id: \"97\", title: \"TIBETAN\", short_title: \"bo\"}, {id: \"98\", title: \"TONGA\", short_title: \"to\"}, {id: \"99\", title: \"TURKISH\", short_title: \"tr\"}, {id: \"103\", title: \"UIGHUR\", short_title: \"ug\"}, {id: \"100\", title: \"UKRAINIAN\", short_title: \"uk\"}, {id: \"101\", title: \"URDU\", short_title: \"ur\"}, {id: \"102\", title: \"UZBEK\", short_title: \"uz\"}, {id: \"104\", title: \"VIETNAMESE\", short_title: \"vi\"}, {id: \"105\", title: \"WELSH\", short_title: \"cy\"}, {id: \"106\", title: \"YIDDISH\", short_title: \"yi\"}, {id: \"107\", title: \"YORUBA\", short_title: \"yo\"}  ];

    
    
\t</script>
\t<script src=\"/js/lib/require.js\"></script>
\t<script src=\"/js/exercise.js\"></script>
";
        // line 156
        $this->env->loadTemplate("_bottom.html")->display($context);
    }

    public function getTemplateName()
    {
        return "exercises.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  342 => 156,  332 => 148,  298 => 146,  295 => 145,  292 => 144,  288 => 142,  284 => 140,  268 => 139,  262 => 138,  259 => 137,  256 => 136,  249 => 134,  246 => 133,  231 => 131,  216 => 130,  209 => 129,  204 => 126,  202 => 125,  119 => 44,  108 => 42,  101 => 40,  98 => 39,  83 => 32,  65 => 16,  62 => 15,  55 => 13,  45 => 11,  42 => 10,  37 => 9,  32 => 8,  27 => 5,  25 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}

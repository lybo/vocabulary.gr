<?php

/* myvocabularies.html */
class __TwigTemplate_85d0b7959960b68e365cacd5fd5e903b extends Twig_Template
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
            <div  id=\"content-header\" > <!-- data-spy=\"affix\" data-offset-top=\"50\" data-offset-bottom=\"150\" -->
              <h3>My Vocabularies</h3>
                <div class=\"control-group\">
            \t    <div class=\"controls form-inline\">
                    <div class=\"input-prepend input-append\">
                      <span class=\"add-on\"><i class=\"icon-search\"></i></span>
                      <input class=\"span3\" id=\"search-input\" type=\"text\" placeholder=\"search\">
                      <div class=\"btn-group\">
                        <button class=\"btn dropdown-toggle\" data-toggle=\"dropdown\">
                          <span class=\"icon-cog\"></span>
                          <span class=\"caret\"></span>
                        </button>
                        <ul class=\"dropdown-menu pull-right\">
                          <li class=\"disabled\"><a tabindex=\"-1\" href=\"#\">Order By</a></li>
                          <li><a href=\"#\" class=\"orderby\" data-field=\"title\" data-sorttype=\"asc\"><i class=\"icon icon-arrow-up\"></i> Title <span class=\"muted\">(A-Z)</span></a></li>
                          <li><a href=\"#\" class=\"orderby\" data-field=\"title\" data-sorttype=\"desc\"><i class=\"icon icon-arrow-down\"></i> Title <span class=\"muted\">(Z-A)</span></a></li>
                          <li><a href=\"#\" class=\"orderby\" data-field=\"date_in\" data-sorttype=\"asc\"><i class=\"icon icon-arrow-up\"></i> Date <span class=\"muted\">(old)</span></a></li> 
                          <li><a href=\"#\" class=\"orderby\" data-field=\"date_in\" data-sorttype=\"desc\"><i class=\"icon icon-arrow-down\"></i> Date <span class=\"muted\">(recent)</span></a></li> 
                        </ul>
                      </div>
                    </div>
                    <!-- <button class=\"btn\" type=\"button\" data-toggle=\"modal\" data-target=\"#addvocabulary\" id=\"vocabulary-add\"><i class=\"icon-plus\"></i> Add New</button> -->
                  </div>
                </div>
                <hr>
            </div>


            <div id=\"vocabulary-list\">
 
            </div><!-- /.media -->
          </div>
      </div><!-- /#content -->

      <!-- Modal confirmbox -->
      <div class=\"modal hide fade\" role=\"dialog\" aria-hidden=\"true\" tabindex=\"-1\" id=\"confirmbox\">
        <div class=\"modal-header\">
          <a class=\"close\" data-dismiss=\"modal\">×</a>
          <h3>Are sure that you want to delete this vocabulary?</h3>
        </div>
        <div class=\"modal-body\">
          <p>Be certain!</p>
        </div>
        <div class=\"modal-footer\">
          <button class=\"btn\" id=\"confirmFalse\">Cancel</button>
          <button class=\"btn btn-primary\" id=\"confirmTrue\">OK</button>
        </div>
      </div>
      <!-- /Modal confirmbox -->

      <!-- Modal editvocabulary -->
      <div id=\"editvocabulary\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\" style=\"width: 700px;\">
      </div>
      <!-- /Modal editvocabulary -->

      <!-- Modal addvocabulary -->
      <div id=\"addvocabulary\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\" style=\"width: 600px;\">
        <form class=\"\" >
          <div class=\"modal-header\">
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
            <h3 id=\"myModalLabel\">Add a New Vocabulary</h3>
          </div>
          <div class=\"modal-body\" >


            <div class=\"row-fluid\">

            <!-- Form Name -->

              <div class=\"span6\">
                <!-- Text input-->
                <div class=\"control-group\">
                  <label class=\"control-label\" for=\"inputAddTitle\">Title</label>
                  <div class=\"controls\">
                    <input id=\"inputAddTitle\" name=\"title\" type=\"text\" placeholder=\"title\" class=\"input-large\" required=\"\">
                    <p class=\"help-block\">type vocabulary's title</p>
                  </div>
                </div>

                <!-- Select Basic -->
                <div class=\"control-group\">
                  <label class=\"control-label\" for=\"selecAddLang1\">Your Study Language</label>
                  <div class=\"controls\">
                    <select id=\"selecAddLang1\" name=\"lang_1_id\" class=\"input-large\" required=\"Please select Your Study Language\">
                      <option value=\"\">Select</option>
                      ";
        // line 93
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["langs"]) ? $context["langs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["lang"]) {
            echo "<option value=\"";
            echo $this->getAttribute((isset($context["lang"]) ? $context["lang"] : null), "id");
            echo "\">";
            echo $this->getAttribute((isset($context["lang"]) ? $context["lang"] : null), "title");
            echo "</option>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lang'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 94
        echo "                    </select>
                  </div>
                </div>

                <!-- Select Basic -->
                <div class=\"control-group\">
                  <label class=\"control-label\" for=\"selectAddLang2\">Your native Language</label>
                  <div class=\"controls\">
                    <select id=\"selectAddLang2\" name=\"lang_2_id\" class=\"input-large\" required=\"Please select Your native Language\">
                      <option value=\"\">Select</option>
                      ";
        // line 104
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["langs"]) ? $context["langs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["lang"]) {
            echo "<option value=\"";
            echo $this->getAttribute((isset($context["lang"]) ? $context["lang"] : null), "id");
            echo "\"  >";
            echo $this->getAttribute((isset($context["lang"]) ? $context["lang"] : null), "title");
            echo "</option>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lang'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 105
        echo "                    </select>
                  </div>
                </div>

                <!-- Text input Labels-->
                <div class=\"control-group\">
                  <label class=\"control-label\" for=\"inputEditLabels\">Labels</label>
                  <div class=\"controls\">
                    <input id=\"inputAddLabels\" name=\"labels\" type=\"text\"  class=\"input-large\"  value=\"\">
                    <p class=\"help-block\">type vocabulary's labels</p>
                  </div>
                </div>

              

              </div>

              <div class=\"span6\">
                <!-- Text input-->
                <div class=\"control-group\">
                  <label class=\"control-label\" for=\"textAddSource\">Source Title</label>
                  <div class=\"controls\">
                    <input id=\"textAddSource\" name=\"source\" type=\"text\" placeholder=\"title\" class=\"input-large\" >
                    <p class=\"help-block\">type source title of current vocabulary</p>
                  </div>
                </div>

                <!-- Prepended text-->
                <div class=\"control-group\">
                  <label class=\"control-label\" for=\"inputAddSourceUrl\">Source Url</label>
                  <div class=\"controls\">
                    <div class=\"input-prepend\">
                      <span class=\"add-on\">http://</span>
                      <input id=\"inputAddSourceUrl\" name=\"source_url\" class=\"input-large\" placeholder=\"source url\" type=\"text\">
                    </div>
                    <p class=\"help-block\">type source url</p>
                  </div>
                </div>

                <!-- Multiple Radios (inline) -->
                <div class=\"control-group\">
                  <label class=\"control-label\" for=\"radios\">Source Type</label>
                  <div class=\"controls\" id=\"radioAddSourceType\">
                    <label class=\"radio inline\" for=\"sourceTypeAdd-0\">
                      <input type=\"radio\" name=\"sourceType\" id=\"sourceTypeAdd-0\" value=\"Book\" name=\"source_type\" checked=\"checked\">
                      Book
                    </label>
                    <label class=\"radio inline\" for=\"sourceTypeAdd-1\">
                      <input type=\"radio\" name=\"sourceType\" id=\"sourceTypeAdd-1\" name=\"source_type\" value=\"Magazine\">
                      Magazine
                    </label>
                    <label class=\"radio inline\" for=\"sourceTypeAdd-2\">
                      <input type=\"radio\" name=\"sourceType\" id=\"sourceTypeAdd-2\" name=\"source_type\" value=\"Website\">
                      Website
                    </label>
                  </div>
                </div>

              </div>

            </div>



          </div>
          <div class=\"modal-footer\">
            <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
            <button class=\"btn btn-primary\">Save changes</button>
          </div>
        </form>
      </div>
      <!-- /Modal addvocabulary -->
                       
";
        // line 178
        $this->env->loadTemplate("_footer.html")->display($context);
        // line 179
        echo "\t<link rel=\"stylesheet\" type=\"text/css\" href=\"/js/lib/jquery.tags_input_master/jquery.tagsinput.css\" />
\t<script>
    window.is_logged = ";
        // line 181
        if ((isset($context["is_logged"]) ? $context["is_logged"] : null)) {
            echo "1;";
        } else {
            echo "0;";
        }
        // line 182
        echo "
    window.currentUser = { id: \"";
        // line 183
        echo $this->getAttribute((isset($context["currentUser"]) ? $context["currentUser"] : null), "id");
        echo "\", email: \"";
        echo $this->getAttribute((isset($context["currentUser"]) ? $context["currentUser"] : null), "email");
        echo "\", name: \"";
        echo $this->getAttribute((isset($context["currentUser"]) ? $context["currentUser"] : null), "name");
        echo "\", lang_id: \"";
        echo $this->getAttribute((isset($context["currentUser"]) ? $context["currentUser"] : null), "lang_id");
        echo "\" };

\t\t";
        // line 185
        if (twig_length_filter($this->env, (isset($context["vocabularies"]) ? $context["vocabularies"] : null))) {
            // line 186
            echo "\t\twindow.vocabularies = [";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["vocabularies"]) ? $context["vocabularies"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["vocabulary"]) {
                // line 187
                echo "    {id: \"";
                echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "id");
                echo "\", title: \"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "title"));
                echo "\", source: \"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "source"));
                echo "\", source_url: \"";
                echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "source_url");
                echo "\", lang_1_id: ";
                echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "lang_1_id");
                echo ", lang_2_id: ";
                echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "lang_2_id");
                echo ", date_in: ";
                echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "date_in");
                echo ", num_translations: ";
                echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "num_translations");
                echo ", labels: \"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "labels"));
                echo "\", user_id: ";
                echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "user_id");
                echo ", type_id: ";
                echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "type_id");
                echo ", is_published: ";
                echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "is_published");
                echo " },
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['vocabulary'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 188
            echo "];
\t\t";
        } else {
            // line 190
            echo "    window.vocabularies = new Array();
    ";
        }
        // line 192
        echo "
    ";
        // line 193
        if (twig_length_filter($this->env, (isset($context["users"]) ? $context["users"] : null))) {
            // line 194
            echo "    window.users = [";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
                echo "{ id: \"";
                echo $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id");
                echo "\", name: \"";
                echo $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "name");
                echo "\", num_subscribes: ";
                echo $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "num_subscribes");
                echo " }, ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "];
    ";
        } else {
            // line 196
            echo "    window.users = new Array();
    ";
        }
        // line 198
        echo "
\t\twindow.langs = [{ id:\"1\", title: \"AFRIKAANS\" }, { id:\"2\", title: \"ALBANIAN\" }, { id:\"3\", title: \"AMHARIC\" }, { id:\"4\", title: \"ARABIC\" }, { id:\"5\", title: \"ARMENIAN\" }, { id:\"6\", title: \"AZERBAIJANI\" }, { id:\"7\", title: \"BASQUE\" }, { id:\"8\", title: \"BELARUSIAN\" }, { id:\"9\", title: \"BENGALI\" }, { id:\"10\", title: \"BIHARI\" }, { id:\"11\", title: \"BRETON\" }, { id:\"12\", title: \"BULGARIAN\" }, { id:\"13\", title: \"BURMESE\" }, { id:\"14\", title: \"CATALAN\" }, { id:\"15\", title: \"CHEROKEE\" }, { id:\"16\", title: \"CHINESE\" }, { id:\"17\", title: \"CHINESE_SIMPLIFIED\" }, { id:\"18\", title: \"CHINESE_TRADITIONAL\" }, { id:\"19\", title: \"CORSICAN\" }, { id:\"20\", title: \"CROATIAN\" }, { id:\"21\", title: \"CZECH\" }, { id:\"22\", title: \"DANISH\" }, { id:\"23\", title: \"DHIVEHI\" }, { id:\"24\", title: \"DUTCH\" }, { id:\"25\", title: \"ENGLISH\" }, { id:\"26\", title: \"ESPERANTO\" }, { id:\"27\", title: \"ESTONIAN\" }, { id:\"28\", title: \"FAROESE\" }, { id:\"29\", title: \"FILIPINO\" }, { id:\"30\", title: \"FINNISH\" }, { id:\"31\", title: \"FRENCH\" }, { id:\"32\", title: \"FRISIAN\" }, { id:\"33\", title: \"GALICIAN\" }, { id:\"34\", title: \"GEORGIAN\" }, { id:\"35\", title: \"GERMAN\" }, { id:\"36\", title: \"GREEK\" }, { id:\"37\", title: \"GUJARATI\" }, { id:\"38\", title: \"HAITIAN_CREOLE\" }, { id:\"39\", title: \"HEBREW\" }, { id:\"40\", title: \"HINDI\" }, { id:\"41\", title: \"HUNGARIAN\" }, { id:\"42\", title: \"ICELANDIC\" }, { id:\"43\", title: \"INDONESIAN\" }, { id:\"44\", title: \"INUKTITUT\" }, { id:\"45\", title: \"IRISH\" }, { id:\"46\", title: \"ITALIAN\" }, { id:\"47\", title: \"JAPANESE\" }, { id:\"48\", title: \"JAVANESE\" }, { id:\"49\", title: \"KANNADA\" }, { id:\"50\", title: \"KAZAKH\" }, { id:\"51\", title: \"KHMER\" }, { id:\"52\", title: \"KOREAN\" }, { id:\"53\", title: \"KURDISH\" }, { id:\"54\", title: \"KYRGYZ\" }, { id:\"55\", title: \"LAO\" }, { id:\"56\", title: \"LATIN\" }, { id:\"57\", title: \"LATVIAN\" }, { id:\"58\", title: \"LITHUANIAN\" }, { id:\"59\", title: \"LUXEMBOURGISH\" }, { id:\"60\", title: \"MACEDONIAN\" }, { id:\"61\", title: \"MALAY\" }, { id:\"62\", title: \"MALAYALAM\" }, { id:\"63\", title: \"MALTESE\" }, { id:\"64\", title: \"MAORI\" }, { id:\"65\", title: \"MARATHI\" }, { id:\"66\", title: \"MONGOLIAN\" }, { id:\"67\", title: \"NEPALI\" }, { id:\"68\", title: \"NORWEGIAN\" }, { id:\"69\", title: \"OCCITAN\" }, { id:\"70\", title: \"ORIYA\" }, { id:\"71\", title: \"PASHTO\" }, { id:\"72\", title: \"PERSIAN\" }, { id:\"73\", title: \"POLISH\" }, { id:\"74\", title: \"PORTUGUESE\" }, { id:\"75\", title: \"PORTUGUESE_PORTUGAL\" }, { id:\"76\", title: \"PUNJABI\" }, { id:\"77\", title: \"QUECHUA\" }, { id:\"78\", title: \"ROMANIAN\" }, { id:\"79\", title: \"RUSSIAN\" }, { id:\"80\", title: \"SANSKRIT\" }, { id:\"81\", title: \"SCOTS_GAELIC\" }, { id:\"82\", title: \"SERBIAN\" }, { id:\"83\", title: \"SINDHI\" }, { id:\"84\", title: \"SINHALESE\" }, { id:\"85\", title: \"SLOVAK\" }, { id:\"86\", title: \"SLOVENIAN\" }, { id:\"87\", title: \"SPANISH\" }, { id:\"88\", title: \"SUNDANESE\" }, { id:\"89\", title: \"SWAHILI\" }, { id:\"90\", title: \"SWEDISH\" }, { id:\"91\", title: \"SYRIAC\" }, { id:\"92\", title: \"TAJIK\" }, { id:\"93\", title: \"TAMIL\" }, { id:\"94\", title: \"TATAR\" }, { id:\"95\", title: \"TELUGU\" }, { id:\"96\", title: \"THAI\" }, { id:\"97\", title: \"TIBETAN\" }, { id:\"98\", title: \"TONGA\" }, { id:\"99\", title: \"TURKISH\" }, { id:\"103\", title: \"UIGHUR\" }, { id:\"100\", title: \"UKRAINIAN\" }, { id:\"101\", title: \"URDU\" }, { id:\"102\", title: \"UZBEK\" }, { id:\"104\", title: \"VIETNAMESE\" }, { id:\"105\", title: \"WELSH\" }, { id:\"106\", title: \"YIDDISH\" }, { id:\"107\", title: \"YORUBA\" } ];

    

\t</script>
\t<script src=\"/js/lib/require.js\"></script>
\t<script src=\"/js/myvocabularies.js\"></script>
";
        // line 206
        $this->env->loadTemplate("_bottom.html")->display($context);
    }

    public function getTemplateName()
    {
        return "myvocabularies.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  340 => 206,  330 => 198,  326 => 196,  307 => 194,  305 => 193,  302 => 192,  298 => 190,  294 => 188,  263 => 187,  258 => 186,  256 => 185,  245 => 183,  242 => 182,  236 => 181,  232 => 179,  230 => 178,  155 => 105,  142 => 104,  130 => 94,  117 => 93,  27 => 5,  25 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}

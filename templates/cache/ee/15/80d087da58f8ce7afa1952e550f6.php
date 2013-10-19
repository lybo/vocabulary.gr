<?php

/* library.html */
class __TwigTemplate_ee1580d087da58f8ce7afa1952e550f6 extends Twig_Template
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
      <div id=\"content\">
          <div id=\"vocabularies\">
            <div  id=\"content-header\" > <!-- data-spy=\"affix\" data-offset-top=\"50\" data-offset-bottom=\"150\" -->
              <h3>My Bookmarks</h3>
                <div class=\"control-group\">
                  <div class=\"controls form-inline\">
                    <div class=\"input-prepend input-append\">
                      <span class=\"add-on\"><i class=\"icon-search\"></i></span>
                      <input class=\"span4\" id=\"search-input\" type=\"text\" placeholder=\"search\">
                    </div>    
                  </div>
                </div>
                <hr>
            </div>

            <div id=\"vocabulary-list\">
                <div class=\"alert alert-info\">
                    This is your Library. You can find the vocabularies that you would like to practice with them. This is the button <button title=\"\" data-placement=\"top\" data-toggle=\"tooltip\" class=\"btn btn-mini btn-info _tooltip\" data-original-title=\"Add to your Library for your convenience\"><span class=\"icon icon-bookmark icon-white\"></span> Add to your Library</button> which there is in any exercise in order to add the current vocabulary in your Library.
                </div>
            </div><!-- /.media -->
          </div>
      </div><!-- /#content -->

      <!-- Modal confirmbox -->
      <div class=\"modal hide fade\" role=\"dialog\" aria-hidden=\"true\" tabindex=\"-1\" id=\"confirmbox\">
        <div class=\"modal-header\">
          <a class=\"close\" data-dismiss=\"modal\">×</a>
          <h3>Remove this vocabulary from your library?</h3>
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


                       
";
        // line 47
        $this->env->loadTemplate("_footer.html")->display($context);
        // line 48
        echo "  <link rel=\"stylesheet\" type=\"text/css\" href=\"/js/lib/jquery.tags_input_master/jquery.tagsinput.css\" />
  <script>
    window.is_logged = ";
        // line 50
        if ((isset($context["is_logged"]) ? $context["is_logged"] : null)) {
            echo "1;";
        } else {
            echo "0;";
        }
        // line 51
        echo "
    window.currentUser = { id: \"";
        // line 52
        echo $this->getAttribute((isset($context["currentUser"]) ? $context["currentUser"] : null), "id");
        echo "\", email: \"";
        echo $this->getAttribute((isset($context["currentUser"]) ? $context["currentUser"] : null), "email");
        echo "\", name: \"";
        echo $this->getAttribute((isset($context["currentUser"]) ? $context["currentUser"] : null), "name");
        echo "\", lang_id: \"";
        echo $this->getAttribute((isset($context["currentUser"]) ? $context["currentUser"] : null), "lang_id");
        echo "\" };

    ";
        // line 54
        if (twig_length_filter($this->env, (isset($context["vocabularies"]) ? $context["vocabularies"] : null))) {
            // line 55
            echo "    window.vocabularies = [";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["vocabularies"]) ? $context["vocabularies"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["vocabulary"]) {
                // line 56
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
                echo ", library_id: ";
                echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "library_id");
                echo " },
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['vocabulary'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 57
            echo "];
    ";
        }
        // line 59
        echo "
    window.langs = [{ id:\"1\", title: \"AFRIKAANS\" }, { id:\"2\", title: \"ALBANIAN\" }, { id:\"3\", title: \"AMHARIC\" }, { id:\"4\", title: \"ARABIC\" }, { id:\"5\", title: \"ARMENIAN\" }, { id:\"6\", title: \"AZERBAIJANI\" }, { id:\"7\", title: \"BASQUE\" }, { id:\"8\", title: \"BELARUSIAN\" }, { id:\"9\", title: \"BENGALI\" }, { id:\"10\", title: \"BIHARI\" }, { id:\"11\", title: \"BRETON\" }, { id:\"12\", title: \"BULGARIAN\" }, { id:\"13\", title: \"BURMESE\" }, { id:\"14\", title: \"CATALAN\" }, { id:\"15\", title: \"CHEROKEE\" }, { id:\"16\", title: \"CHINESE\" }, { id:\"17\", title: \"CHINESE_SIMPLIFIED\" }, { id:\"18\", title: \"CHINESE_TRADITIONAL\" }, { id:\"19\", title: \"CORSICAN\" }, { id:\"20\", title: \"CROATIAN\" }, { id:\"21\", title: \"CZECH\" }, { id:\"22\", title: \"DANISH\" }, { id:\"23\", title: \"DHIVEHI\" }, { id:\"24\", title: \"DUTCH\" }, { id:\"25\", title: \"ENGLISH\" }, { id:\"26\", title: \"ESPERANTO\" }, { id:\"27\", title: \"ESTONIAN\" }, { id:\"28\", title: \"FAROESE\" }, { id:\"29\", title: \"FILIPINO\" }, { id:\"30\", title: \"FINNISH\" }, { id:\"31\", title: \"FRENCH\" }, { id:\"32\", title: \"FRISIAN\" }, { id:\"33\", title: \"GALICIAN\" }, { id:\"34\", title: \"GEORGIAN\" }, { id:\"35\", title: \"GERMAN\" }, { id:\"36\", title: \"GREEK\" }, { id:\"37\", title: \"GUJARATI\" }, { id:\"38\", title: \"HAITIAN_CREOLE\" }, { id:\"39\", title: \"HEBREW\" }, { id:\"40\", title: \"HINDI\" }, { id:\"41\", title: \"HUNGARIAN\" }, { id:\"42\", title: \"ICELANDIC\" }, { id:\"43\", title: \"INDONESIAN\" }, { id:\"44\", title: \"INUKTITUT\" }, { id:\"45\", title: \"IRISH\" }, { id:\"46\", title: \"ITALIAN\" }, { id:\"47\", title: \"JAPANESE\" }, { id:\"48\", title: \"JAVANESE\" }, { id:\"49\", title: \"KANNADA\" }, { id:\"50\", title: \"KAZAKH\" }, { id:\"51\", title: \"KHMER\" }, { id:\"52\", title: \"KOREAN\" }, { id:\"53\", title: \"KURDISH\" }, { id:\"54\", title: \"KYRGYZ\" }, { id:\"55\", title: \"LAO\" }, { id:\"56\", title: \"LATIN\" }, { id:\"57\", title: \"LATVIAN\" }, { id:\"58\", title: \"LITHUANIAN\" }, { id:\"59\", title: \"LUXEMBOURGISH\" }, { id:\"60\", title: \"MACEDONIAN\" }, { id:\"61\", title: \"MALAY\" }, { id:\"62\", title: \"MALAYALAM\" }, { id:\"63\", title: \"MALTESE\" }, { id:\"64\", title: \"MAORI\" }, { id:\"65\", title: \"MARATHI\" }, { id:\"66\", title: \"MONGOLIAN\" }, { id:\"67\", title: \"NEPALI\" }, { id:\"68\", title: \"NORWEGIAN\" }, { id:\"69\", title: \"OCCITAN\" }, { id:\"70\", title: \"ORIYA\" }, { id:\"71\", title: \"PASHTO\" }, { id:\"72\", title: \"PERSIAN\" }, { id:\"73\", title: \"POLISH\" }, { id:\"74\", title: \"PORTUGUESE\" }, { id:\"75\", title: \"PORTUGUESE_PORTUGAL\" }, { id:\"76\", title: \"PUNJABI\" }, { id:\"77\", title: \"QUECHUA\" }, { id:\"78\", title: \"ROMANIAN\" }, { id:\"79\", title: \"RUSSIAN\" }, { id:\"80\", title: \"SANSKRIT\" }, { id:\"81\", title: \"SCOTS_GAELIC\" }, { id:\"82\", title: \"SERBIAN\" }, { id:\"83\", title: \"SINDHI\" }, { id:\"84\", title: \"SINHALESE\" }, { id:\"85\", title: \"SLOVAK\" }, { id:\"86\", title: \"SLOVENIAN\" }, { id:\"87\", title: \"SPANISH\" }, { id:\"88\", title: \"SUNDANESE\" }, { id:\"89\", title: \"SWAHILI\" }, { id:\"90\", title: \"SWEDISH\" }, { id:\"91\", title: \"SYRIAC\" }, { id:\"92\", title: \"TAJIK\" }, { id:\"93\", title: \"TAMIL\" }, { id:\"94\", title: \"TATAR\" }, { id:\"95\", title: \"TELUGU\" }, { id:\"96\", title: \"THAI\" }, { id:\"97\", title: \"TIBETAN\" }, { id:\"98\", title: \"TONGA\" }, { id:\"99\", title: \"TURKISH\" }, { id:\"103\", title: \"UIGHUR\" }, { id:\"100\", title: \"UKRAINIAN\" }, { id:\"101\", title: \"URDU\" }, { id:\"102\", title: \"UZBEK\" }, { id:\"104\", title: \"VIETNAMESE\" }, { id:\"105\", title: \"WELSH\" }, { id:\"106\", title: \"YIDDISH\" }, { id:\"107\", title: \"YORUBA\" } ];

    ";
        // line 62
        if (twig_length_filter($this->env, (isset($context["users"]) ? $context["users"] : null))) {
            // line 63
            echo "    window.users = [";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
                echo "{ id: \"";
                echo $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id");
                echo "\", email: \"";
                echo $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "email");
                echo "\", name: \"";
                echo $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "name");
                echo "\", num_subscribes: ";
                echo $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "num_subscribes");
                echo " } ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "];
    ";
        }
        // line 65
        echo "
  </script>
  <script src=\"/js/lib/require.js\"></script>
  <script src=\"/js/user_library.js\"></script>
";
        // line 69
        $this->env->loadTemplate("_bottom.html")->display($context);
    }

    public function getTemplateName()
    {
        return "library.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 69,  165 => 65,  144 => 63,  142 => 62,  137 => 59,  133 => 57,  104 => 56,  99 => 55,  97 => 54,  86 => 52,  83 => 51,  77 => 50,  73 => 48,  71 => 47,  27 => 5,  25 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}

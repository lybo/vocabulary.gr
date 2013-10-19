<?php

/* translations.html */
class __TwigTemplate_154aee13d8c6d2c1310cdab45f369e78 extends Twig_Template
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
        echo "﻿";
        $this->env->loadTemplate("_head.html")->display($context);
        // line 2
        $this->env->loadTemplate("_header.html")->display($context);
        // line 3
        $this->env->loadTemplate("_left_sidebar.html")->display($context);
        // line 4
        $this->env->loadTemplate("_right_sidebar_translation.html")->display($context);
        // line 5
        echo "
\t\t  <div id=\"content\">
          <form class=\"translation\">
            <table class=\"table table-striped table-condensed\" style=\"width: 430px;\">
              <thead data-spy=\"affix\" data-offset-top=\"50\" data-offset-bottom=\"150\"> 
                
                <tr>
                  <th colspan=\"4\">
                    <h4 id=\"vocabularyTitle\">";
        // line 13
        echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "title");
        echo "</h5>
                    ";
        // line 14
        if ($this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "source_url")) {
            // line 15
            echo "                    <h5 id=\"vocabularySource\"><a href=\"http://";
            echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "source_url");
            echo "\" target=\"_blank\">";
            echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "source");
            echo "</a></h6>
                    ";
        } else {
            // line 17
            echo "                    <h5 id=\"vocabularySource\">";
            echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "source");
            echo "</h6>
                    ";
        }
        // line 19
        echo "                  </th>
                </tr>
                <tr class=\"rendered\">
                  <th colspan=\"4\">
                    <div class=\"control-group\">
                      <div class=\"controls form-inline\">
                        <div class=\"input-prepend\">
                          <span class=\"add-on\"><i class=\"icon-search\"></i></span>
                          <input class=\"span4\" id=\"search-input\" type=\"text\" placeholder=\"search\" data-placement=\"bottom\" title=\"\" data-original-title=\"Search translation\">
                        </div>
                      </div>
                    </div>
                    
                    <div class=\"pull-right\">

                      <a href=\"#import\" role=\"button\" class=\"btn btn-mini btn-info _tooltip\" data-toggle=\"modal\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Invite the current vocabulary to your subscribers\"><span class=\"icon icon-upload icon-white \"></span> Import </a>
                      <!--
                      data-toggle=\"tooltip\" data-placement=\"top\" title=\"Invite the current vocabulary to your subscribers\"

                      _tooltip
    data-toggle=\"tooltip\" data-placement=\"top\" title=\"Edit the current vocabulary\"
                       -->
                      <a href=\"#editvocabulary\" role=\"button\" class=\"btn btn-mini btn-info \"  data-toggle=\"modal\" ><span class=\"icon icon-wrench icon-white \"></span> Edit </a>

                      <span ";
        // line 43
        if (($this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "is_published") != "1")) {
            echo "class=\"is_publish\"";
        }
        echo " id=\"vocabulary_status\">
                        <a href=\"#\" id=\"is_publish\" class=\"btn btn-mini btn-info _tooltip\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Publish the current vocabulary when it is ready\"><span class=\"icon icon-ok icon-white\"></span> Publish </a>

                        <a href=\"#\" id=\"isnot_publish\" class=\"btn btn-mini btn-danger _tooltip\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Unpublish the current vocabulary\"><span class=\"icon icon-ok icon-white\"></span> Unpublish </a>
                      </span>
                    </div>
                  </th>
                  
                </tr>
                <tr id=\"header-langs\">
                  <th style=\"width: 180px;\">";
        // line 53
        echo $this->getAttribute((isset($context["lang_1"]) ? $context["lang_1"] : null), "title");
        echo "</th>
                  <th style=\"width: 8px;\"></th>
                  <th style=\"width: 180px;\">";
        // line 55
        echo $this->getAttribute((isset($context["lang_2"]) ? $context["lang_2"] : null), "title");
        echo "</th>
                  <th style=\"width: 22px;\"></th>
                </tr>
              </thead>
            </table>
          </form>
          <form class=\"translation\" id=\"add-new-translation\">
            <table class=\"table table-striped table-condensed\" style=\"width: 430px;\">
              <tbody  data-placement=\"top\" title=\"\" data-original-title=\"Add a new translation\">
                <tr>
                  <th style=\"width: 180px;\"></th>
                  <th style=\"width: 8px;\"></th>
                  <th style=\"width: 180px;\"></th>
                  <th style=\"width: 22px;\"></th>
                </tr>
                <tr class=\"selected add-new-translation\">
                  <td><input type=\"text\" name=\"word_1\" value=\"\" class=\"word_1 input-small tags\"></td>
                  <td valign=\"middle\">=</td>
                  <td><input type=\"text\" name=\"word_2\" value=\"\" class=\"word_2 input-small tags\"></td>
                  <td valign=\"middle\"><input type=\"hidden\" name=\"vocabulary_id\" value=\"";
        // line 74
        echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "id");
        echo "\">
                    <button type=\"submit\" data-toggle=\"tooltip\" title=\"insert a new translation\" class=\"btn btn-primary btn-mini btn-inverse\"><span class=\"icon icon-plus icon-white\"></span></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </form>
          <form class=\"translation\" id=\"translation-list\">
            <table class=\"table table-striped table-condensed\" style=\"width: 430px;\">
              <thead>
                <tr style=\"border: none; padding:0;\">
                  <th style=\"width: 180px; border: none;\"></th>
                  <th style=\"width: 8px; border: none;\"></th>
                  <th style=\"width: 180px; border: none;\"></th>
                  <th style=\"width: 22px; border: none;\"></th>
                </tr>
              </thead>
              <tbody id=\"translation-list-body\">
              </tbody>
            </table>
          </form>
      </div><!-- /#content -->

      <!-- Modal confirmbox -->
      <div class=\"modal hide fade\" role=\"dialog\" aria-hidden=\"true\" tabindex=\"-1\" id=\"confirmbox\">
        <div class=\"modal-header\">
          <a class=\"close\" data-dismiss=\"modal\">×</a>
          <h3>Delete this thing?</h3>
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

       <!-- Modal import -->
      <div id=\"import\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"importModalLabel\" aria-hidden=\"true\" style=\"width: 600px;\">
        <form id=\"import_form\" action=\"/import_translations/";
        // line 120
        echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "id");
        echo "/\" method=\"post\" enctype=\"multipart/form-data\">
          <div class=\"modal-header\">
            <a class=\"close\" data-dismiss=\"modal\">×</a>
            <h3>Import words</h3>
          </div>
          <div class=\"modal-body\">
            <p>under constraction</p>
            
              <label for=\"csv_file\">Upload CSV file:</label>
              <input type=\"file\" name=\"file\" id=\"csv_file\" />
              <br/><br/>
              <div class=\"progress\">
                  <div class=\"bar\"></div >
                  <div class=\"percent\">0%</div >
              </div>
              <hr/>
              <div class=\"row-fluid\">
                <div class=\"span4\">
                  <h5 class=\"text-info\">Settings</h5>
                  delimiter: <strong>Tab</strong><br/>
                  charset: <strong>utf-8</strong>
                </div>
                <div class=\"span8\">
                  <h5 class=\"text-info\">Example</h5>
                  <table class=\"table table-striped\">
                    <tr>
                      <th id=\"lang_1_expample\"></th>
                      <th id=\"lang_2_expample\"></th>
                    </tr>
                    <tr>
                      <td>word 1</td>
                      <td>word 1 definition/translation</td>
                    </tr>
                    <tr>
                      <td>word 2</td>
                      <td>word 2 definition/translation</td>
                    </tr>
                    <tr>
                      <td>word 3</td>
                      <td>word 3 definition/translation</td>
                    </tr>
                  </table>
                </div>
              </div>
 
          </div>
          <div class=\"modal-footer\">
            <button class=\"btn\" data-dismiss=\"modal\">Cancel</button>
            <button class=\"btn btn-primary\" id=\"confirmTrue\">Import</button>
          </div>
        </form>
      </div>
      <!-- /Modal import -->

      <!-- Modal import -->
      <div id=\"confirm_csv\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"importModalLabel\" aria-hidden=\"true\" style=\"width: 600px; \">
        <form id=\"confirm_csv_form\" action=\"/import_translations/";
        // line 176
        echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "id");
        echo "/\" method=\"post\" enctype=\"multipart/form-data\">
          <div class=\"modal-header\">
            <a class=\"close\" data-dismiss=\"modal\">×</a>
            <h3>Confirm import words</h3>
          </div>
          <div class=\"modal-body\" id=\"confirm_display\">
            
 
          </div>
          <div class=\"modal-footer\">
            <button class=\"btn\" data-dismiss=\"modal\">Cancel</button>
            <button class=\"btn btn-primary\" id=\"confirmTrue2\">Import</button>
          </div>
        </form>
      </div>
      <!-- /Modal import -->
                       
";
        // line 193
        $this->env->loadTemplate("_footer.html")->display($context);
        // line 194
        echo "\t<link rel=\"stylesheet\" type=\"text/css\" href=\"/js/lib/jquery.tags_input_master/jquery.tagsinput.css\" />
\t<script>
     window.is_logged = ";
        // line 196
        if ((isset($context["is_logged"]) ? $context["is_logged"] : null)) {
            echo "1;";
        } else {
            echo "0;";
        }
        // line 197
        echo "
    window.currentUser = { id: \"";
        // line 198
        echo $this->getAttribute((isset($context["currentUser"]) ? $context["currentUser"] : null), "id");
        echo "\", email: \"";
        echo $this->getAttribute((isset($context["currentUser"]) ? $context["currentUser"] : null), "email");
        echo "\", name: \"";
        echo $this->getAttribute((isset($context["currentUser"]) ? $context["currentUser"] : null), "name");
        echo "\", lang_id: \"";
        echo $this->getAttribute((isset($context["currentUser"]) ? $context["currentUser"] : null), "lang_id");
        echo "\" };

\t\t";
        // line 200
        if (twig_length_filter($this->env, (isset($context["translations"]) ? $context["translations"] : null))) {
            // line 201
            echo "    window.translations = [";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["translations"]) ? $context["translations"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["translation"]) {
                // line 202
                echo "      {id: \"";
                echo $this->getAttribute((isset($context["translation"]) ? $context["translation"] : null), "id");
                echo "\", word_1: \"";
                echo trim(twig_escape_filter($this->env, $this->getAttribute((isset($context["translation"]) ? $context["translation"] : null), "word_1")));
                echo "\", word_2: \"";
                echo trim(twig_escape_filter($this->env, $this->getAttribute((isset($context["translation"]) ? $context["translation"] : null), "word_2")));
                echo "\" },
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['translation'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 203
            echo "];
    ";
        } else {
            // line 205
            echo "    window.translations = new Array();  
    ";
        }
        // line 207
        echo "
    ";
        // line 208
        if ((isset($context["vocabulary"]) ? $context["vocabulary"] : null)) {
            // line 209
            echo "    window.vocabulary = { id: ";
            echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "id");
            echo ", title: \"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "title"));
            echo "\", user_id: ";
            echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "user_id");
            echo ", source: \"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "source"));
            echo "\", source_url: \"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "source_url"));
            echo "\", lang_1_id: ";
            echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "lang_1_id");
            echo ", lang_2_id: ";
            echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "lang_2_id");
            echo ", date_in: ";
            echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "date_in");
            echo ", labels: \"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "labels"));
            echo "\", num_translations: ";
            echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "num_translations");
            echo ", type_id: ";
            echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "type_id");
            echo ", is_published: ";
            echo $this->getAttribute((isset($context["vocabulary"]) ? $context["vocabulary"] : null), "is_published");
            echo " };
    ";
        }
        // line 211
        echo "
    window.langs = [{ id:\"1\", title: \"AFRIKAANS\" }, { id:\"2\", title: \"ALBANIAN\" }, { id:\"3\", title: \"AMHARIC\" }, { id:\"4\", title: \"ARABIC\" }, { id:\"5\", title: \"ARMENIAN\" }, { id:\"6\", title: \"AZERBAIJANI\" }, { id:\"7\", title: \"BASQUE\" }, { id:\"8\", title: \"BELARUSIAN\" }, { id:\"9\", title: \"BENGALI\" }, { id:\"10\", title: \"BIHARI\" }, { id:\"11\", title: \"BRETON\" }, { id:\"12\", title: \"BULGARIAN\" }, { id:\"13\", title: \"BURMESE\" }, { id:\"14\", title: \"CATALAN\" }, { id:\"15\", title: \"CHEROKEE\" }, { id:\"16\", title: \"CHINESE\" }, { id:\"17\", title: \"CHINESE_SIMPLIFIED\" }, { id:\"18\", title: \"CHINESE_TRADITIONAL\" }, { id:\"19\", title: \"CORSICAN\" }, { id:\"20\", title: \"CROATIAN\" }, { id:\"21\", title: \"CZECH\" }, { id:\"22\", title: \"DANISH\" }, { id:\"23\", title: \"DHIVEHI\" }, { id:\"24\", title: \"DUTCH\" }, { id:\"25\", title: \"ENGLISH\" }, { id:\"26\", title: \"ESPERANTO\" }, { id:\"27\", title: \"ESTONIAN\" }, { id:\"28\", title: \"FAROESE\" }, { id:\"29\", title: \"FILIPINO\" }, { id:\"30\", title: \"FINNISH\" }, { id:\"31\", title: \"FRENCH\" }, { id:\"32\", title: \"FRISIAN\" }, { id:\"33\", title: \"GALICIAN\" }, { id:\"34\", title: \"GEORGIAN\" }, { id:\"35\", title: \"GERMAN\" }, { id:\"36\", title: \"GREEK\" }, { id:\"37\", title: \"GUJARATI\" }, { id:\"38\", title: \"HAITIAN_CREOLE\" }, { id:\"39\", title: \"HEBREW\" }, { id:\"40\", title: \"HINDI\" }, { id:\"41\", title: \"HUNGARIAN\" }, { id:\"42\", title: \"ICELANDIC\" }, { id:\"43\", title: \"INDONESIAN\" }, { id:\"44\", title: \"INUKTITUT\" }, { id:\"45\", title: \"IRISH\" }, { id:\"46\", title: \"ITALIAN\" }, { id:\"47\", title: \"JAPANESE\" }, { id:\"48\", title: \"JAVANESE\" }, { id:\"49\", title: \"KANNADA\" }, { id:\"50\", title: \"KAZAKH\" }, { id:\"51\", title: \"KHMER\" }, { id:\"52\", title: \"KOREAN\" }, { id:\"53\", title: \"KURDISH\" }, { id:\"54\", title: \"KYRGYZ\" }, { id:\"55\", title: \"LAO\" }, { id:\"56\", title: \"LATIN\" }, { id:\"57\", title: \"LATVIAN\" }, { id:\"58\", title: \"LITHUANIAN\" }, { id:\"59\", title: \"LUXEMBOURGISH\" }, { id:\"60\", title: \"MACEDONIAN\" }, { id:\"61\", title: \"MALAY\" }, { id:\"62\", title: \"MALAYALAM\" }, { id:\"63\", title: \"MALTESE\" }, { id:\"64\", title: \"MAORI\" }, { id:\"65\", title: \"MARATHI\" }, { id:\"66\", title: \"MONGOLIAN\" }, { id:\"67\", title: \"NEPALI\" }, { id:\"68\", title: \"NORWEGIAN\" }, { id:\"69\", title: \"OCCITAN\" }, { id:\"70\", title: \"ORIYA\" }, { id:\"71\", title: \"PASHTO\" }, { id:\"72\", title: \"PERSIAN\" }, { id:\"73\", title: \"POLISH\" }, { id:\"74\", title: \"PORTUGUESE\" }, { id:\"75\", title: \"PORTUGUESE_PORTUGAL\" }, { id:\"76\", title: \"PUNJABI\" }, { id:\"77\", title: \"QUECHUA\" }, { id:\"78\", title: \"ROMANIAN\" }, { id:\"79\", title: \"RUSSIAN\" }, { id:\"80\", title: \"SANSKRIT\" }, { id:\"81\", title: \"SCOTS_GAELIC\" }, { id:\"82\", title: \"SERBIAN\" }, { id:\"83\", title: \"SINDHI\" }, { id:\"84\", title: \"SINHALESE\" }, { id:\"85\", title: \"SLOVAK\" }, { id:\"86\", title: \"SLOVENIAN\" }, { id:\"87\", title: \"SPANISH\" }, { id:\"88\", title: \"SUNDANESE\" }, { id:\"89\", title: \"SWAHILI\" }, { id:\"90\", title: \"SWEDISH\" }, { id:\"91\", title: \"SYRIAC\" }, { id:\"92\", title: \"TAJIK\" }, { id:\"93\", title: \"TAMIL\" }, { id:\"94\", title: \"TATAR\" }, { id:\"95\", title: \"TELUGU\" }, { id:\"96\", title: \"THAI\" }, { id:\"97\", title: \"TIBETAN\" }, { id:\"98\", title: \"TONGA\" }, { id:\"99\", title: \"TURKISH\" }, { id:\"103\", title: \"UIGHUR\" }, { id:\"100\", title: \"UKRAINIAN\" }, { id:\"101\", title: \"URDU\" }, { id:\"102\", title: \"UZBEK\" }, { id:\"104\", title: \"VIETNAMESE\" }, { id:\"105\", title: \"WELSH\" }, { id:\"106\", title: \"YIDDISH\" }, { id:\"107\", title: \"YORUBA\" } ];

\t</script>
\t<script src=\"/js/lib/require.js\"></script>
\t<script src=\"/js/translation.js\"></script>
";
        // line 217
        $this->env->loadTemplate("_bottom.html")->display($context);
    }

    public function getTemplateName()
    {
        return "translations.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  349 => 217,  341 => 211,  313 => 209,  311 => 208,  308 => 207,  304 => 205,  300 => 203,  287 => 202,  282 => 201,  280 => 200,  269 => 198,  266 => 197,  260 => 196,  256 => 194,  254 => 193,  234 => 176,  175 => 120,  126 => 74,  104 => 55,  99 => 53,  84 => 43,  58 => 19,  52 => 17,  44 => 15,  42 => 14,  38 => 13,  28 => 5,  26 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}

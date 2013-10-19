<?php

/* user_form.html */
class __TwigTemplate_5ecfbc7ae1e95dce5a428fd6430ca851 extends Twig_Template
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
        echo "
\t\t<div id=\"content\" class=\"large\">
      <div class=\"well\">
        <h3>Create a new Vocabulary</h3>
        <form method=\"post\" action=\"vocabularies\" id=\"add_vocabulary\" >
          
            <div class=\"row-fluid\">

            <!-- Form Name -->

              <div class=\"span6\" >
                <!-- Text input-->
                <div class=\"control-group\">
                  <label class=\"control-label\" for=\"inputAddTitle\">Title</label>
                  <div class=\"controls\">
                    <input id=\"inputAddTitle\" name=\"title\" type=\"text\" placeholder=\"title\" class=\"span12\" >
                    
                  </div>
                </div>

                <!-- Select Basic -->
                <div class=\"control-group\">
                  <label class=\"control-label\" for=\"selecAddLang1\">Your Study Language</label>
                  <div class=\"controls\">
                    <select id=\"selecAddLang1\" name=\"lang_1_id\" class=\"span12\">
                      <option value=\"\">Select</option>
                      ";
        // line 30
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
        // line 31
        echo "                    </select>
                  </div>
                </div>

                <!-- Select Basic -->
                <div class=\"control-group\">
                  <label class=\"control-label\" for=\"selectAddLang2\">Your Native Language</label>
                  <div class=\"controls\">
                    <select id=\"selectAddLang2\" name=\"lang_2_id\" class=\"span12\" >
                      <option value=\"\">Select</option>
                      ";
        // line 41
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
        // line 42
        echo "                    </select>
                  </div>
                </div>

                <!-- Text input Labels-->
                <div class=\"control-group\">
                  <label class=\"control-label\" for=\"inputEditLabels\">Labels</label>
                  <div class=\"controls\">
                    <input id=\"inputAddLabels\" name=\"labels\" type=\"text\"  class=\"span12\"  value=\"\">
                    
                  </div>
                </div>

              </div><!-- .span6 -->

              <div class=\"span1\">
                <div style=\"border-left: 1px solid #e6e6e6; height: 350px; margin: 0 auto; width: 1px;\"></div>
              </div>

              <div class=\"span5\" >

                <!-- Multiple Radios (inline) -->
                <div class=\"control-group\">
                  <label class=\"control-label\" for=\"radios\">Source Type</label>
                  <div class=\"controls\" id=\"radioAddSourceType\">
                    <label class=\"radio inline muted\" for=\"type_idAdd-0\">
                      <input type=\"radio\" name=\"type_id\" id=\"type_idAdd-0\" name=\"source_type\" data-info=\"0\" value=\"\">
                      No Source
                    </label>
                    <label class=\"radio inline\" for=\"type_idAdd-1\">
                      <input type=\"radio\" name=\"type_id\" id=\"type_idAdd-1\" value=\"1\" name=\"source_type\" data-info=\"1\" checked=\"checked\">
                      Book
                    </label>
                    <label class=\"radio inline\" for=\"type_idAdd-2\">
                      <input type=\"radio\" name=\"type_id\" id=\"type_idAdd-2\" name=\"source_type\" value=\"2\" data-info=\"2\">
                      Press
                    </label>
                    <label class=\"radio inline\" for=\"type_idAdd-3\">
                      <input type=\"radio\" name=\"type_id\" id=\"type_idAdd-3\" name=\"source_type\" value=\"3\" data-info=\"3\">
                      Website
                    </label>
                    <label class=\"radio inline\" for=\"type_idAdd-4\">
                      <input type=\"radio\" name=\"type_id\" id=\"type_idAdd-4\" name=\"source_type\" value=\"4\" data-info=\"4\">
                      Podcast
                    </label>
                    <label class=\"radio inline\" for=\"type_idAdd-5\">
                      <input type=\"radio\" name=\"type_id\" id=\"type_idAdd-5\" name=\"source_type\" value=\"5\" data-info=\"5\">
                      Video
                    </label>
                    
                  </div>
                </div>


                <div id=\"selection-info\">
                  <hr/>
                  <h4>Book</h4>
                  <p>Any <span class=\"text-info\">book</span> which is published.<br/> The source url can be related with the infomation about the book.</p>
                </div>
                <div id=\"source_inputs\">

                  <!-- Text input-->
                  <div class=\"control-group\">
                    <label class=\"control-label\" for=\"textAddSource\">Source Title</label>
                    <div class=\"controls\">
                      <input id=\"textAddSource\" name=\"source\" type=\"text\" placeholder=\"title\" class=\"span12\" >
                      
                    </div>
                  </div>

                  <!-- Prepended text-->
                  <div class=\"control-group\">
                    <label class=\"control-label\" for=\"inputAddSourceUrl\">Source Url</label>
                    <div class=\"controls\">
                      <div class=\"input-prepend\">
                        <span class=\"add-on\">http://</span>
                        <input id=\"inputAddSourceUrl\" name=\"source_url\" class=\"span12\" placeholder=\"source url\" type=\"text\">
                      </div>
                      
                      <div id=\"addSourceUrl\"></div>
                    </div>
                  </div>

                </div>
                
                <div style=\"display:none;\">

                  <div id=\"selection-0\">
                    <h4>No source</h4>
                    <p>The current vocabulary is not related with any source.</p>
                  </div>

                  <div id=\"selection-1\">
                    <h4>Book</h4>
                    <p>Any <span class=\"text-info\">book</span> which is published.<br/> The source url can be related with the infomation about the book.</p>
                  </div>

                  <div id=\"selection-2\">
                    <h4>Press</h4>
                    <p><span class=\"text-info\">Newspapers, magazines etc.</span><br/> The source url can be related with the infomation about the podcast.</p>
                  </div>

                  <div id=\"selection-3\">
                    <h4>Website</h4>
                    <p><span class=\"text-info\">Blogs, web newspaper/magazines, portals etc.</span><br/> Of cource the source url will explicitly be the url of the website.</p>
                  </div>

                  <div id=\"selection-4\">
                    <h4>Podcast</h4>
                    <p><span class=\"text-info\">Music tracks, radio programs etc.</span><br/> The source url can be related with the lyrics or the transctipt or infomation about the podcast.</p>
                  </div>

                  <div id=\"selection-5\">
                    <h4>Video</h4>
                    <p><span class=\"text-info\">Video on web, movie, serie etc.</span><br/> The source url can be related with the information about the video or directly with url of the video.</p>
                  </div>

                </div>

              </div><!-- .span6 -->

            </div><!-- .row-fluid -->
            <hr/>
            <button type=\"submit\" class=\"btn btn-large btn-primary pull-right\">Create and redirect to Adding words</button>
            <span class=\"clearfix\"></span>
        </form>
      </div><!-- .well -->

\t\t</div><!-- /#content -->
";
        // line 171
        $this->env->loadTemplate("_footer.html")->display($context);
        // line 172
        echo "\t<link rel=\"stylesheet\" type=\"text/css\" href=\"/js/lib/jquery.tags_input_master/jquery.tagsinput.css\" />
\t<script>
    window.is_logged = ";
        // line 174
        if ((isset($context["is_logged"]) ? $context["is_logged"] : null)) {
            echo "1;";
        } else {
            echo "0;";
        }
        // line 175
        echo "
    ";
        // line 176
        if ((isset($context["currentUser"]) ? $context["currentUser"] : null)) {
            // line 177
            echo "    window.currentUser = { id: \"";
            echo $this->getAttribute((isset($context["currentUser"]) ? $context["currentUser"] : null), "id");
            echo "\", email: \"";
            echo $this->getAttribute((isset($context["currentUser"]) ? $context["currentUser"] : null), "email");
            echo "\", name: \"";
            echo $this->getAttribute((isset($context["currentUser"]) ? $context["currentUser"] : null), "name");
            echo "\", lang_id: \"";
            echo $this->getAttribute((isset($context["currentUser"]) ? $context["currentUser"] : null), "lang_id");
            echo "\" };
    ";
        } else {
            // line 179
            echo "    window.currentUser = new Array();
    ";
        }
        // line 181
        echo "    
  </script>
  <script src=\"/js/lib/require.js\"></script>
  <script src=\"/js/vocabulary_form.js\"></script>
\t
";
        // line 186
        $this->env->loadTemplate("_bottom.html")->display($context);
    }

    public function getTemplateName()
    {
        return "user_form.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  262 => 186,  255 => 181,  251 => 179,  239 => 177,  237 => 176,  234 => 175,  228 => 174,  224 => 172,  222 => 171,  91 => 42,  78 => 41,  66 => 31,  53 => 30,  25 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}

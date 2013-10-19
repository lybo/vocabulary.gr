<?php

/* user.html */
class __TwigTemplate_7cd0c533563d7da5d6eeffb495beccc4 extends Twig_Template
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
        echo "      <div id=\"content\">
          ";
        // line 6
        if ((isset($context["userpassword_error"]) ? $context["userpassword_error"] : null)) {
            // line 7
            echo "            
            <div class=\"alert alert-error\">
              <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
              <h4>Log In Error</h4>
              Invalid username or password. Try again.    
            </div>
          ";
        }
        // line 14
        echo "          <h3>User Personal Details</h3>
          <div class=\"well\">
            <form method=\"post\" action=\"/user_details\" id=\"user_details\">
              
              <a href=\"#uploadImage\" role=\"button\" data-toggle=\"modal\">
                <img src=\"";
        // line 19
        echo $this->getAttribute((isset($context["currentUser"]) ? $context["currentUser"] : null), "photo");
        echo "\" class=\"user-image\" id=\"user-image\"><br/>Change image profile
              </a>
              <hr/>
              <label for=\"username\">Username</label>
              <input type=\"text\" id=\"username\" name=\"name\" placeholder=\"Username\" class=\"span4\" value=\"";
        // line 23
        echo $this->getAttribute((isset($context["currentUser"]) ? $context["currentUser"] : null), "name");
        echo "\"/>
              <label for=\"first_name\">First Name</label>
              <input type=\"text\" id=\"first_name\" name=\"first_name\" placeholder=\"First Name\" class=\"span4\" value=\"";
        // line 25
        echo $this->getAttribute((isset($context["currentUser"]) ? $context["currentUser"] : null), "first_name");
        echo "\"/>
              <label for=\"last_name\">Last Name</label>
              <input type=\"text\" id=\"last_name\" name=\"last_name\" placeholder=\"Last Name\" class=\"span4\" value=\"";
        // line 27
        echo $this->getAttribute((isset($context["currentUser"]) ? $context["currentUser"] : null), "last_name");
        echo "\"/>
              <br/><br/>
              <button class=\"btn btn-medium btn-primary\" type=\"submit\">Save</button>
            </form>
          </div>
          
          <!-- Modal uploadImage -->
          <div id=\"uploadImage\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\" style=\"width: 500px;\">
            <form id=\"user_image\" action=\"/user_image\" method=\"post\" enctype=\"multipart/form-data\">
              <div class=\"modal-header\">
                <a class=\"close\" data-dismiss=\"modal\">×</a>
                <h3>Change image</h3>
              </div>
              <div class=\"modal-body\">
                <label for=\"file\">Choose image from your computer</label>
                <input type=\"file\" name=\"image\" id=\"file\">
                <br/><br/>
                <div class=\"progress\">
                    <div class=\"bar\"></div >
                    <div class=\"percent\">0%</div >
                </div>
              </div>
              <div class=\"modal-footer\">
                <button class=\"btn btn-primary\" type=\"submit\">Upload</button>
              </div>
            </form>
          </div>
          <!-- /Modal uploadImage -->

          <!-- Modal uploadImage -->
          <div id=\"cropImage\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\" style=\"width: 500px;\">
            <form id=\"user_image_crop\" action=\"/user_image_crop\" method=\"post\" enctype=\"multipart/form-data\">
              <div class=\"modal-header\">
                <a class=\"close\" data-dismiss=\"modal\">×</a>
                <h3>Crop image</h3>
              </div>
              <div class=\"modal-body\">
                  <div id=\"jcrop_target_parent\">
                    <img id=\"jcrop_target\" />
                  </div>
                  <hr/>
                  <div style=\"width:60px;height:60px;overflow:hidden;\">
                    <img id=\"preview\" style=\"max-width: none;\"/>
                  </div>
                  <div class=\"progress\">
                      <div class=\"bar\"></div >
                      <div class=\"percent\">0%</div >
                  </div>
                  <div id=\"crop-info\" style=\"display:none;\">
                    <input type=\"hidden\" name=\"x1\" value=\"\" />
                    <input type=\"hidden\" name=\"y1\" value=\"\" />
                    <input type=\"hidden\" name=\"x2\" value=\"\" />
                    <input type=\"hidden\" name=\"y2\" value=\"\" />
                    <input type=\"hidden\" name=\"w\" value=\"\" />
                    <input type=\"hidden\" name=\"h\" value=\"\" />
                  </div>
                  <div id=\"crop_details\"></div>
              </div>
              <div class=\"modal-footer\">
                <button class=\"btn btn-primary\" type=\"submit\">Crop</button>
              </div>
            </form>
          </div>
          <!-- /Modal uploadImage -->
          
          <hr/>
          <h3>User LogIn Details</h3>
          <div class=\"well\"> 
            <form method=\"post\" action=\"/user_login\" id=\"change_password\">
              <label for=\"old_password\">Old Password</label>
              <input type=\"password\" id=\"old_password\" name=\"old_password\" placeholder=\"Old Password\" class=\"span4\" />

              <label for=\"password\">New Password</label>
              <input type=\"password\" id=\"password\" name=\"password\" placeholder=\"New Password\" class=\"span4\" />
              
              <label for=\"password2\">Confirm Password</label>
              <input type=\"password\" id=\"password2\" name=\"password2\" placeholder=\"Confirm Password\" class=\"span4\" />
              <br/><br/>
              <button class=\"btn btn-medium btn-primary\" type=\"submit\">Save</button>
            </form>
            <hr/>
            <form method=\"post\" action=\"/user_login_email\" id=\"change_email\">
              <label for=\"old_email\">Email</label>
              <input type=\"text\" id=\"old_email\" name=\"old_email\" placeholder=\"Email\" class=\"span4\"/>
              <label for=\"email\">New Email</label>
              <input type=\"text\" id=\"email\" name=\"email\" placeholder=\"New Email\" class=\"span4\"/>
              <label for=\"email2\">Confirm Email</label>
              <input type=\"text\" id=\"email2\" name=\"email2\" placeholder=\"Confirm Email\" class=\"span4\"/>
              <br/><br/>
              <button class=\"btn btn-medium btn-primary\" type=\"submit\">Save</button>
            </form>
          </div>  
      </div><!--/#content-->
      <div class=\"clearfix\"></div>
";
        // line 121
        $this->env->loadTemplate("_footer.html")->display($context);
        // line 122
        echo "  <link href=\"/js/lib/jquery.jcrop/css/jquery.jcrop.min.css\" rel=\"stylesheet\" type=\"text/css\" />
  <link rel=\"stylesheet\" type=\"text/css\" href=\"/js/lib/jquery.imgareaselect/css/imgareaselect-default.css\" />
  <script>
    window.is_logged = ";
        // line 125
        echo ((((isset($context["is_logged"]) ? $context["is_logged"] : null) == 1)) ? (1) : (0));
        echo ";
  </script> 
  <script src=\"js/lib/require.js\"></script>
  <script src=\"js/me.js\"></script>
";
        // line 129
        $this->env->loadTemplate("_bottom.html")->display($context);
    }

    public function getTemplateName()
    {
        return "user.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  176 => 129,  169 => 125,  164 => 122,  162 => 121,  65 => 27,  60 => 25,  55 => 23,  48 => 19,  41 => 14,  32 => 7,  30 => 6,  27 => 5,  25 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}

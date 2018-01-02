<?php

/* debut.html */
class __TwigTemplate_0cfe7083f99d32344cec5d1c0888e61ab5babc119c9c8011a76ff4760745dcc5 extends Twig_Template
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
        echo "<!DOCTYPE html>
<html>
    <head>
        <title>Page d'accueil</title>
        <link rel=\"stylesheet\" href=\"assets/css/bootstrap.min.css\">
        <link rel=\"stylesheet\" href=\"assets/css/toastr.min.css\">
    </head>
    <body>
        <div class=\"container\">
            <h1 class=\"page-header\">Page d'accueil</h1>
            <p class=\"alert alert-info\">
                Veuillez commencer votre developpement en supprimant ce route ou en changant de direction pour votre application.
            </p>
            <p class=\"page-footer\">
                &copy; Copyright 2017, ";
        // line 15
        echo twig_escape_filter($this->env, ($context["application"] ?? null), "html", null, true);
        echo "
            </p>
        </div>
    </body>

    <script src=\"assets/js/jquery.min.js\"></script>
    <script src=\"assets/js/scripts.js\"></script>
</html>
";
    }

    public function getTemplateName()
    {
        return "debut.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 15,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "debut.html", "D:\\Web\\xx_seveur\\xampp\\htdocs\\apps2\\application\\templates\\app\\debut.html");
    }
}

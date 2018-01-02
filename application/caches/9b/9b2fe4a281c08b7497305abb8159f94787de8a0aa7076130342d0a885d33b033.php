<?php

/* exception.html */
class __TwigTemplate_fb175c6ba55512b4b4e4c67df29b92ddf008b428fdeaabb9f80b7f1a750f5ee2 extends Twig_Template
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
        echo "<!DOCTYPE HTML>
<html>
    <head>
        <title>Erreur : ";
        // line 4
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</title>
        <link rel=\"stylesheet\" href=\"asset/css/bootstrap.min.css\">
    </head>
    <body>
        <div class=\"container\">
            <h1 class=\"page-header\">";
        // line 9
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</h1>
            <p>
                ";
        // line 11
        echo twig_escape_filter($this->env, ($context["content"] ?? null));
        echo "
            </p>
            <footer>
                &copy; 2017, Skatek Corporation
            </footer>
        </div>
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "exception.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 11,  32 => 9,  24 => 4,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "exception.html", "D:\\Web\\xx_seveur\\xampp\\htdocs\\apps2\\application\\templates\\router\\exception.html");
    }
}

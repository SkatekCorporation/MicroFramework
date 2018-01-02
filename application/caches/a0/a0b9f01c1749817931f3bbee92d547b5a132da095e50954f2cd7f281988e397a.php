<?php

/* debut.html */
class __TwigTemplate_8e51ca3dfb4c0596e1839ee606493e56af1bb86543c90360de2ee0e980c4f08f extends Twig_Template
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
    </head>
    <body>
        <h1>Page d'accueil</h1>
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "debut.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "debut.html", "D:\\Web\\xx_seveur\\xampp\\htdocs\\apps1\\application\\views\\templates\\app\\debut.html");
    }
}

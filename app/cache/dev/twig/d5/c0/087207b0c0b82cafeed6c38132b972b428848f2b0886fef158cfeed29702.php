<?php

/* testetesteBundle:Joeur:index.html.twig */
class __TwigTemplate_d5c0087207b0c0b82cafeed6c38132b972b428848f2b0886fef158cfeed29702 extends Twig_Template
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
        echo "<table border=\"1\">
<tr><th>Couleur</th><th>Valeur</th></tr>
";
        // line 3
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cards"]) ? $context["cards"] : $this->getContext($context, "cards")));
        foreach ($context['_seq'] as $context["_key"] => $context["card"]) {
            // line 4
            echo "<tr>
<td>";
            // line 5
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["card"]) ? $context["card"] : $this->getContext($context, "card")), "category"), "html", null, true);
            echo "</td>
<td>";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["card"]) ? $context["card"] : $this->getContext($context, "card")), "value"), "html", null, true);
            echo "</td>
</tr>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['card'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 9
        echo "</table>
";
    }

    public function getTemplateName()
    {
        return "testetesteBundle:Joeur:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 9,  34 => 6,  30 => 5,  27 => 4,  23 => 3,  19 => 1,);
    }
}

<?php

namespace Framework;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFunction;

class Controller
{
    private $templating;

    public function __construct()
    {
        $loader = new FilesystemLoader('../App/View');
        $this->templating = new Environment($loader);
        $this->templating->addFunction(new TwigFunction('session', function ($sessionKey) {
            if (isset($_SESSION[$sessionKey])) {
                return $_SESSION[$sessionKey];
            }

            throw new \Exception(sprintf('Could not find key "%s" in session', $sessionKey));
        }));
    }

    protected function renderTemplate(string $templateName, array $templateParameters = [])
    {
        echo $this->templating->render($templateName, $templateParameters);
    }
}

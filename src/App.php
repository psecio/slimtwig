<?php

namespace SlimTwig;

class App extends \Slim\App
{
    public function __construct($container = [])
    {
        $templatePath = getcwd().'/templates';
        if (isset($container['settings']['template_path'])) {
            $templatePath = $container['settings']['tempalate_path'];
        }
        $templatePath = realpath($templatePath);

        if ($templatePath === false || !is_dir($templatePath)) {
            throw new \InvalidArgumentException('Invalid template path!');
        }

        $container['view'] = function($container) use ($templatePath){
            // $view = new \Slim\Views\Twig($templatePath);
            $view = new \SlimTwig\View($templatePath);
            $view->container = $container;

            $router = $container->get('router');
            $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
            $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));

            return $view;
        };

        parent::__construct($container);
    }
}
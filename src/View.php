<?php

namespace SlimTwig;

use Psr\Http\Message\ResponseInterface;

class View extends \Slim\Views\Twig
{
    public function out($template, $data = [])
    {
        parent::render(
            $this->container->get('response'),
            $template, $data
        );
    }
}
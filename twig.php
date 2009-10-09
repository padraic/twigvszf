<?php

// edit for own path
require_once '/home/padraic/projects/misc/twig/Twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem(
    dirname(__FILE__) . '/twig_templates',
    dirname(__FILE__) . '/twig_templates/cache' // must be writable!
);
$twig = new Twig_Environment($loader);
$escaper = new Twig_Extension_Escaper(true);
$twig->addExtension($escaper);

$template = $twig->loadTemplate('index.phtml');

$vars = array(
    'navigation' => array(
        array(
            'href' => '/foo',
            'caption' => 'Foo'
        ),
        array(
            'href' => '/bar',
            'caption' => 'Bar'
        ),
        array(
            'href' => '/blog',
            'caption' => 'Blog&'
        )
    ),
    'foo' => 'Padraic Brady'
);

echo $template->render($vars);

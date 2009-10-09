<?php

require_once '/home/padraic/projects/misc/twig/Twig/Autoloader.php';
Twig_Autoloader::register();

$timeStart = microtime(true);

for ($i = 0; $i < 10000; $i++) {
    $loader = new Twig_Loader_Filesystem(
        dirname(__FILE__) . '/twig_templates',
        dirname(__FILE__) . '/twig_templates/cache'
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
        )
    );

    $template->render($vars);
}

$timeEnd = microtime(true);
$timeTotal = $timeEnd - $timeStart;
echo 'Total Time (s): ', $timeTotal, "\n",
     'Memory (kb): ', memory_get_peak_usage()/1024, "\n",
     'Templates (p/s): ', (10000/$timeTotal), "\n";

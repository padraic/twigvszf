<?php

function autoload($class) {
    require str_replace('_', '/', $class) . '.php';
    return true;
}
spl_autoload_register('autoload');

$timeStart = microtime(true);

for ($i = 0; $i < 10000; $i++) {
    $template = new Zend_View(
        array(
            'scriptPath' => dirname(__FILE__) . '/zf_templates'
        )
    );

    $template->navigation = array(
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
    );

    $template->render('index.phtml');
}

$timeEnd = microtime(true);
$timeTotal = $timeEnd - $timeStart;
echo 'Time (s): ', $timeTotal, "\n",
     'Memory (kb): ', memory_get_peak_usage()/1024, "\n",
     'Templates (p/s): ', (10000/$timeTotal), "\n";

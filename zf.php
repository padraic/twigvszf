<?php

function autoload($class) {
    require str_replace('_', '/', $class) . '.php';
    return $class;
}
spl_autoload_register('autoload');

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

$template->foo = 'Padraic Brady';

echo $template->render('index.phtml');

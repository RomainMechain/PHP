<?php

declare(strict_types=1);
require './Classes/Autoloader.php';
require './Classes/Factory.php';
Autoloader::register();

use Form\Type\Radio;
use Form\Type\Input;
use Form\GenericFormElement;
use Form\InputRenderInterface;

// $radio = new Radio('a','radio',  true, 'oui', 1, ['oui', 'non','peut etre'],"je suis un label");
// $radio2 = new Radio('abc','radio', true, 'oui', 1, ['oui', 'non'],"je suis un label");
// $test = new Provider('./Data/quizz.json');
// echo $radio.PHP_EOL;
// echo $radio2.PHP_EOL;
// $res = $test->getArray();

$factory = new Factory('./Data/quizz.json');
$lst_res = $factory->create();
foreach ($lst_res as $instance) {
    echo $instance.PHP_EOL;
}

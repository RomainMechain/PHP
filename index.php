<?php

declare(strict_types=1);
require './Classes/Autoloader.php';
Autoloader::register();

use Form\Type\RadioButtom;
use Form\Type\Input;
use Form\GenericFormElement;
use Form\InputRenderInterface;

$radio = new RadioButtom('a','radio',  true, 'oui', 1, ['oui', 'non','peut etre']);
$radio2 = new RadioButtom('abc','radio', true, 'oui', 1, ['oui', 'non']);
echo $radio.PHP_EOL;
echo $radio2.PHP_EOL;
<?php

declare(strict_types=1);
require './Classes/Autoloader.php';
Autoloader::register();

use Form\Type\RadioButtom;
use Form\Type\Input;
use Form\GenericFormElement;
use Form\InputRenderInterface;

$radio = new RadioButtom('a','radio',  true, 'oui', 1, ['oui', 'non','peut etre'],"je suis un label");
$radio2 = new RadioButtom('abc','radio', true, 'oui', 1, ['oui', 'non'],"je suis un label");
echo $radio.PHP_EOL;
echo $radio2.PHP_EOL;


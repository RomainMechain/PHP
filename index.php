<?php

declare(strict_types=1);
require './Classes/Autoloader.php';
Autoloader::register();

use Form\Type\RadioButtom;
use Form\Type\Input;
use Form\GenericFormElement;
use Form\InputRenderInterface;

$radio = new RadioButtom('radio', true);
echo $radio.PHP_EOL;
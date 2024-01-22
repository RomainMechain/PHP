<?php

declare(strict_types=1);
require './Classes/Autoloader.php';
require './Classes/Factory.php';
require './Actions/form.php';

Autoloader::register();

use Form\Type\Radio;
use Form\Type\Input;
use Form\GenericFormElement;
use Form\InputRenderInterface;


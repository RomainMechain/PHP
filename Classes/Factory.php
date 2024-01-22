<?php

require_once './Classes/Provider.php';
require_once './Classes/Autoloader.php';
Autoloader::register();

class Factory {
    private $string;

    public function __construct(string $string) {
        $this->string = $string;
    }

    public function create() {
        $dico = array();
        $provider = new Provider($this->string);
        $dico = $provider->getArray();
        $lst_res = [];
        foreach ($dico as $key => $value) {
            $className = 'Form\\Type\\'.ucfirst($value['type']);
            $instance = new $className($value['name'], $value['type'], $value['required'], $value['answer'], $value['score'], $value['choices'], $value['question']);
            $lst_res[] = $instance;
        }
        return $lst_res;
        
    }
}

?>
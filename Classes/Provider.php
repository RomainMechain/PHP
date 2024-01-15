<?php

class Provider {

    private $json;
    private $array;


    public function __construct(string $path) {
        $this->json = json_decode(file_get_contents($path), true);
        $this->array = array();
    }

    private function loadArray() {
        foreach ($this->json as $key => $value) {
            $this->array[$key] = $value;
        }
    }

    public function getArray() {
        $this->loadArray();
        return $this->array;
    }

    
    
}
?>
<?php

namespace App\Http;

class TratarCaracteres{

    private $Nome;

    public function nomeSlug($Nome){
        $this->Nome = (string) $Nome;

        $this->Nome = str_replace('/', '', $this->Nome); // substituindo o "/" pelo ""
        $this->Nome = str_replace('.', '', $this->Nome); // substituindo o "." pelo ""
        $this->Nome = str_replace('-', '', $this->Nome); // substituindo o "-" pelo ""
        $this->Nome = str_replace(' ', '', $this->Nome); // substituindo o " " pelo ""

        return $this->Nome;
    }

}

?>

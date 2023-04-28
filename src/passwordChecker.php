<?php

namespace App; #permet d'encaplsuler les noms de fct pour ne pas rentrer en conflit avec des fct dont le nom est le meme mais qui ne sont pas dans le meme namespace


class passwordChecker{

    private string $password;
    private int $nbr = 10;

    public function __construct($password){
        $this->password = $password; 
    }

    public function checkPassword(){
       if (strlen($this->password)>= $this->nbr ) {
           return true;
       }else {
           return false;
       }
    }

}


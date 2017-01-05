<?php

/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 04/01/2017
 * Time: 14:27
 */
class Philibert
{
    public $reponse = 42;

    public function lareponse($reponse){
        echo 'La réponse universelle est $reponse';
    }
}

    $phil1 = new Philibert();

    $phil1 -> lareponse();

var_dump($phil1);
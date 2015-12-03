<?php

/**
 * Upadate.class [ TIPO ]
 * Decricao     
 * @copyright (c) year, Marcio Marins Marins Produções
 */
class Upadate {

    private function combineUpdateDados($dados) {
        $keys = array_keys($atributes);
        $separaPorDoisPontos = ":" . implode("*:", $keys);
        $combina = array_combine($keys, explode("*", $separaPorDoisPontos));
        var_dump($combina);
    }

}

<?php

namespace App\filter;

abstract class Filter
{
    protected function passEncrypt($var)
    {
        //retornar o valor encryptado da senha
    }

    protected function postValidate($var)
    {
        //validar o post
        //retornar true caso passe pela validação ou não
    }

    /**
     * Se estiver vazio return false, se não...
     *
     * @param [type] $var
     * @return bool
     */
    protected function empty($var) : bool
    {
        #variavel local
        $bool = false;

        #operador ternário
        (empty($var)) ? $bool : $bool = true;

        return $bool;
    }

    /**
     * Removar espaço de string
     *
     * @param string $var
     * @return string
     */
    protected function trim($var) : string
    {
        return trim($var);
    }
}
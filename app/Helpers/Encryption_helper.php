<?php

function encrypt($value){//FUNÇÃO DE ENCRIPTAÇÃO

    if(empty($value)){//CASO A ENTRADA SEJA NULA
        return null;
    }

    try{

        $encryption = \Config\Services::encrypter();//CHAMANDO CLASSE DE ENCRIPTAÇÃO
        return bin2hex($encryption->encrypt($value));//RETORNANDO VALOR ENCRIPTADO E ADAPTANDO DE BINÁRIO PARA HEXADECIMAL

    }catch(\Exception $e){//EM CASO DE ERRO NA ENTRADA
        return null;
    }
}

function decrypt($value){//FUNÇÃO DE DESENCRIPTAÇÃO

    if(empty($value)){//CASO A ENTRADA SEJA NULA
        return null;
    }

    try{

        $encryption = \Config\Services::encrypter();//CHAMANDO CLASSE DE ENCRIPTAÇÃO
        return $encryption->decrypt(hex2bin($value));//RETORNANDO VALOR DESENCRIPTADO E ADAPTANDO DE HEXADECIMAL PARA BINÁRIO

    }catch(\Exception $e){//EM CASO DE ERRO NA ENTRADA
        return null;
    }
}

?>
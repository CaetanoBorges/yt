<?php

namespace Conta\Classes;

use Conta\Classes\DB\AX;

class Cadastrar
{
    protected $db;       
    protected $array;
    protected $funcoes;

    public function __construct($db, $array, $funcoes) 
    {
        $this->db = $db;
        $this->array = $array;
        $this->funcoes = $funcoes;
    }

    protected function _checkEmail()
    {
        $mail = AX::attr($this->array['email']);

        $res = $this->db->count("email")
        ->from(AX::tb("usuario"))
        ->where(["email = $mail"])
        ->pegaResultado();
        $par = (int) $res['email'];
        if($par > 0){
            return true;
        }else{
            return false;
        }
        
    }

    public function verificaEmail(){
        $user = $this->_checkEmail();
        if ($user) {
            return true;
        }else{
            return false;
        }
    }

    public function cadastrar()
    {
        $user = $this->_checkEmail();
        if ($user) {
            return false;
        }else{
            $res = $this->novoUser($this->array);
            return $res;
        }
        
    }

    public function novoUser($array)
    {
        $res = $this->db->insert("usuario",
        ["id" => AX::attr($this->funcoes::chaveDB()), 
        "nome" => AX::attr($array['nome']),
        "telefone" => AX::attr($array['telefone']),
        "email" => AX::attr($array['email']),
        "bairro" => AX::attr($array['bairro']),
        "rua" => AX::attr($array['rua']),
        "palavra_passe" => AX::attr($this->funcoes::fazHash($array['palavra_passe'])),
        "codigo_renova" => AX::attr(0)])
        ->executaQuery();

        if ($res) {
            return true;
        }
        return false;
    }

}
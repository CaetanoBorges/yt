<?php
namespace Conta\Classes;
use Conta\Classes\DB\AX;
use Conta\Classes\Funcoes;

class Recuperar
{
    protected $db;       

    public function __construct($pdo) 
    {
       $this->db = $pdo;
    }

    public function verificaEmail($email)
    {
        $mail = AX::attr($email);

        $res = $this->db->count("email")
        ->from(AX::tb("usuario"))
        ->where(["email = $mail"])
        ->pegaResultado();

        if($res['email'] > 0){
            return true;
        }else{
            return false;
        }
    }

    public function selecionaNumeroDeRecuperacao($email, $codigo)
    {
        $cod = AX::attr($codigo);
        $mail = AX::attr($email);

        $res = $this->db->update("usuario")
        ->set(["codigo_renova = $cod"])
        ->where(["email = $mail"])
        ->executaQuery();

        if ($res) {
            return true;
        }
        return false;
    }

    public function verificaNumeroEEmail($email, $codigo)
    {
        $cod = AX::attr($codigo);
        $mail = AX::attr($email);

        $res = $this->db->count("email")
        ->from(AX::tb("usuario"))
        ->where(["email = $mail","codigo_renova = $cod"])
        ->pegaResultado();

        if($res['email'] > 0){
            return true;
        }else{
            return false;
        }
    } 

    public function resetCodigoRenovacao($email, $codigo){

        $cod = AX::attr($codigo);
        $mail = AX::attr($email);

        $res = $this->db->update(AX::tb("usuario"))
        ->set(["codigo_renova = 0"])
        ->where(["email = $mail","codigo_renova = $cod"])
        ->executaQuery();
    
    }


    public function novaPasse($email, $codigo, $palavra_passe)
    {   
        $mail = AX::attr($email);
        $cod = AX::attr($codigo);
        $pass = AX::attr(Funcoes::fazHash($palavra_passe));

        $res = $this->db->update("usuario")
        ->set(["palavra_passe = $pass"])
        ->where(["email = $mail","codigo_renova = $cod"])
        ->executaQuery();

        if($res){
            $this->resetCodigoRenovacao($email, $codigo);
            return true;
        }else{
            return false;
        }
    }
    
    public function alteraPasse($user, $palavra_passe)
    {
        $us = AX::attr($user);
        $pass = AX::attr(Funcoes::fazHash($palavra_passe));

        $res = $this->db->update("usuario")
        ->set(["palavra_passe = $pass"])
        ->where(["id = $us"])
        ->executaQuery();
        if($res){
            return true;
        }else{
            return false;
        }
    }

}
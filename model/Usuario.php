<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author hevanderson.silva
 */
class Usuario extends DAO{
            
    private $email;
    private $login;
    private $pass;
    
    public function getLogin() {
        return $this->login;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getPass() {
        return $this->pass;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }
    
    public function getEmail() {
        $this->selectSingle("tbusua", "email_usua", "where cod");
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
  
}

?>

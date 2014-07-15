<?php

require_once  '/model/DAO.php';

class TaskControl extends Control{
    
    
    
    public function addTask($taskname,$taskdesk){
        
        
        $tabela  = 'task';
        $campos  = 'taskname,desc';
        $valores = "'$taskname','$taskdesk'";
        $this->model->insert($tabela, $campos, $valores);
        
    }
    
}


?>

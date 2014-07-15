<?php

require_once  '/model/DAO.php';
require_once  '/control/Control.php';


class TaskView {
    
    private $model;
    private $control;
    
    public function __construct(){
        
        $this->model   = new DAO();
        $this->control = new Control();                                        
    }
    
    public function allTasksFrame(){
        $resultado = $this->model->select("task", "");
       
        while ($linha = mysql_fetch_array($resultado)) {
            $codtask = $linha['cod'];
            
            echo "<div id='task'>".$linha['taskname'];
            
                $resultado2 = $this->model->select("step", "", "where codtask = $codtask order by cod desc");
                while ($linha2 = mysql_fetch_array($resultado2)) {

                    echo "<div id='step'>".$linha2['stepname']."</div>";

                } 
            
            echo "</div>";
        }
    }
    
    
        
}
?>

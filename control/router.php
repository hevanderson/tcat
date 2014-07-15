<?php



require_once "Control.php";
//require_once "TaskControl.php";



//$task = new TaskControl();
$control = new Control();

if (isset($_GET['doaction'])){
    $action = $_GET['doaction'];
}

if (isset($_POST['doaction'])){
   $action = $_POST['doaction'];
} 


if (isset($action))
{
    switch ($action) {
        case 'login':
                       
            $user = $_POST['txtemail'];
            $pass = $_POST['txtsenha'];
            $control->login($user, $pass);
            
            break;
        /////////////////////////////////////////////////////
        
        case 'register':
           // echo 'aaaaa';
            $control->register();
            break;

        default:
            break;
    }
    
}

?>

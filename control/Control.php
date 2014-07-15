<?php

require_once  '../model/DAO.php';
class Control{
    
    private $model;

    public function __construct(){
        
        $this->model = new DAO();
                                                
    }
       

    //********************************************
    //
    //Métodos de LOGIN 
    //
    //********************************************
    
    
     public function login($user, $pass){
       
        $login = $this->checkLogin($user, $pass);
        switch ($login) {
            case 0:
                $this->sessao($user,$pagina);
                $this->sessionRedirect($target);
                break;
            case 1:
                $erro = "Usuário Inexistente";
                break;
            case 2:
                $erro = "Senha Inválida";
                break;
            default:
                break;
        }
        
     }
    
     public function checkLogin($user,$pass)
     {
             
             $this->model->conect();
             
             $resultado = $this->model->selectSingle("tbusua", "email_usua", "where email_usua = '$user' ");
             if(!$resultado)
             {
                 // 1 - "usuario não existe";
                 return 1;
             }
             else
             {
                 $pass = md5($pass);
                 $resultado = $this->model->selectSingle("tbusua", "senha_usua", "where senha_usua = '$pass' ");
                 if(!$resultado)
                 { 
                     // 2 - "senha incorreta";
                 return 2;
                 }
                 else
                 {
                     // 0 - "Login com sucesso";
                     return 0;
                     
                 }
                 
             }
                                      
        }
                
    
    
    public function sessao($user,$pagina)
    {
        

        $_SESSION["email"]        = $user;

    }
    
    public function checkSession(){
        if (session_id() === ""){
            return false;
        }
        else{
            return true;
        }
    }

    
    //********************************************
    //
    //Métodos de Dados 
    //
    //********************************************
    
    //Método montaColunas
    //monta uma coluna HTML
      public function montaColunas($campos,$args="",$convdata="")
      {
            $colunas = "";
            foreach ($campos as $x)
            {
                    if($convdata == 1){
                        $x = $this->convDataSQL($x, 1);
                    }

                    $colunas .= "<td $args >";
                    $colunas .=	$x;
                    $colunas .= "</td>";
            }
            return $colunas;	
      }
    
    //Método montaColunas
    //monta uma linha HTML
    //o resultado do metodo montaColunas pode
    //ser usado como parâmetro 
    public function montaLinha($colunas,$args="")
    {
	echo "<tr $args >";
		echo $colunas;
	echo "</tr>";
    }
    
    //Método montaTabelas
    //monta uma linha HTML
    //o resultado dos metodos montaColuna
    //e montaLinha pode ser usado como parâmetro 
    public function montaTabela($resultado, $argtab="", $arglin="", $argcol="",$cab="",$argcab="",$zebra="",$zc1="") {
        
        if ($argtab != ""){
            echo "<table $argtab >";
            if (is_array($cab)){
            
                $colunas = $this->montaColunas($cab, $argcol);
                $this->montaLinha($colunas, $argcab);
                
            }
            
        }
        
        $zc2=$arglin;
        $i=0;
        while ($linha = mysql_fetch_row($resultado)) {
        
            
            $colunas = $this->montaColunas($linha, $argcol, 1);
            
            if($zebra==1){  
                if($i%2 == 0)
                   $arglin = $zc1; 
                else
                   $arglin = $zc2; 
            }
            
            $this->montaLinha($colunas, $arglin);   
            
            $i++; 
        }
        
        if ($argtab != ""){
            echo "</table>";
        }
        
    }
    
      //Método montaSelect
      //monta um combobox HTML automaticamente
      //só passar um vetor de resultaso Mysql 
      //como parâmetro
      public function montaSelect($resultado){
          while ($linha = mysql_fetch_array($resultado)) {
              echo "<option>".$linha["nome"]."</option>";
          }
      }
    
    //********************************************
    //
    //Métodos de validação  
    //
    //********************************************
    
    
      //Método redirect
      //redireciona uma pagina para outra
      public function redirect($target){
          header("Location: $target");
      }
     
       public function sessionRedirect($target){
          if ($this->checkSession()){ 
              header("Location: $target");
          }        
      }
      
      //Método convDate
      //Muda o separador da data
      //Ex: 01-01-2012 => 01/01/2012 
      public function convDate($data,$sepini,$sepfinal)
      {
		
		$dia  = explode($sepini,$data);
				
		$dt[0] = $dia[2]; //dia
		$dt[1] = $dia[1]; //mes
		$dt[2] = $dia[0]; //ano
		
		$dt = implode($sepfinal,$dt);
		
		return $dt;
			
       }
       
       
          
      //Método dateToSQLDate
      //Converte Datas gregorianas DD-MM-AAAA em datas
      //formato MySQL AAAA-MM-DD 
      //O separador das datas pode ser definido por parametro 
      public function dateToSQLDate($data,$sepini,$sepfinal)
      {
		
		$dia  = explode($sepini,$data);
				
		$dt[2] = $dia[2]; //dia
		$dt[1] = $dia[1]; //mes
		$dt[0] = $dia[0]; //ano
		
		$dt = implode($sepfinal,$dt);
		
		return $dt;
			
       }
       

      // Método convDataSQL
      //Converte Datas MySQL AAAA-MM-DD em datas
      //gregorianas DD/MM/AAAA 
        public function convDataSQL($data,$conv=""){
        
        $dataaux  = explode("-",$data);

        $dia  = $dataaux[2]; //dia
        $mes  = $dataaux[1]; //mes
        $ano  = $dataaux[0]; //ano
        
        if (checkdate($mes, $dia, $ano)){

            if ($conv == 1){
                
                $data = $this->convDate($data, "-", "/");
               
                return $data;
                
            } 
            
        }        
        else
                return $data;
        
        }
       
    
    // metodo somardata
    // o nome ja diz...
    public function somardata($data, $dias, $meses, $ano)
    {
        //passe a data no formato dd/mm/yyyy
        $data = explode("/", $data);
        $newData = date("d/m/Y", mktime(0, 0, 0, $data[1] + $meses,
        $data[0] + $dias, $data[2] + $ano) );
        return $newData;
    }
    
    
    // metodo subtraidata
    // o nome ja diz...
    public function subtraidata($data, $dias, $meses, $ano)
    {
        
        //passe a data no formato dd/mm/yyyy
        $data = explode("/", $data);
        $newData = date("d/m/Y", mktime(0, 0, 0, $data[1] - $meses,
        $data[0] - $dias, $data[2] - $ano) );
        return $newData;
        
    }
    
    // metodo valData
    // testa se é uma data válida
    // retorno booleano
    public function valData($data){
        
        $data = explode("/", $data);
        
        $dia  = $data[0]; //dia
        $mes  = $data[1]; //mes
        $ano  = $data[2]; //ano
        
        if(checkdate($mes, $dia, $ano))
            return true;
        else
            return false;    
        
    }
    
    public function register(){
       //sglobal $testing;
       $testing = "TESTE FRAMEWORK";
        include '../view/register.php';
    }
      
}

//new Control();
?>

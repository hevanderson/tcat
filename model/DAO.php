<?php


/**
 * Description of DAO
 * 
 * Manipular o Banco de Dados
 *
 * @author hevanderson.silva
 */
class DAO {
    
    private $server  = "127.0.0.1";
    private $user    = "root";
    private $pass    = "";
    private $bd      = "bdtask";
    private $conexao = "";


    public function __construct(){        
        $this->conect();       
    }
    
    public function conect(){       
        $this->conexao = mysql_connect($this->server,$this->user,$this->pass);
        mysql_select_db($this->bd);       
    }
    
    public function close(){       
        mysql_close($this->conexao);       
    }
    
    public function select($tabela,$campos,$cond='',$debug=''){
	
	if($campos == '')
	{
		$campos='*';	
	}
	
	$sql="select ".$campos." from ".$tabela." ".$cond;
	
	$resultado=mysql_query($sql);
	
	if($debug == 1)
	{	
		echo $sql;
		echo mysql_error();
	}
	
	return $resultado;
        
    }
    
    public function selectSingle($tabela,$campo,$cond)
    {
            $resultado = $this->select($tabela,$campo,$cond,"");
            $numrows = mysql_numrows($resultado);
            if($numrows == 1)
            {
                    while($linha=mysql_fetch_array($resultado))
                    {
                            return $linha[$campo];
                    }
            }
            else
            {
                    return false;
            }
    }
    
    public function update($tabela,$campo,$valor,$cod,$debug="")
    {

        $sql="update ".$tabela." set ".$campo." = '".$valor."' where cod = ".$cod;
	
	$resultado=mysql_query($sql);
	
	if($debug == 1)
	{	
		echo $sql."<br>";
		echo mysql_error()."<br>";
	}
	
	inserelog($sql);
	
	return $resultado;
    }
    
    
    public function insert($tabela,$campos,$valores,$debug = "")
    {
            $sql="insert into ".$tabela."(".$campos.") values(".$valores.")";
            //echo $sql;
            mysql_query($sql);

            if($debug == 1)
            {
                    echo mysql_error();
            }
    }

    
}

?>

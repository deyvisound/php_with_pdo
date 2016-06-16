<?php

/**
 * Description of Conexao com PDO
 *
 * @author Deyvison Rodrigo B. Estevam <deyvison_rodrigo@hotmail.com>
 * @date Jun 16, 2016
 * 
 */
class Conexao {
    private $host = "localhost";
    private $user = "deyvison";
    private $pass = "vida";
    private $db = "almoxarifado";
    
    /*@var $conn \PDO*/
    private $conn = "";
    
    /**
     * @return \PDO
     */
    function __construct() {
        
        try{
            
            $this->conn = new \PDO("mysql:host={$this->host};dbname={$this->db}",  $this->user, $this->pass);        
            
        } catch (\PDOException $ex) {        
            print $ex->getCode() . " - " . $ex->getMessage();
            exit(0);            
        }
                
        return $this->conn;
    }

    public function exec_sql($statement) {
        try{
            $retorno = $this->conn->query($statement);
            
        } catch (Exception $ex) {
            print $ex->getCode() . " - " . $ex->getMessage();
            exit(0);
        }
        
    }
    
}

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

    /* @var $conn \PDO */
    private $conn = "";

    /**
     * @return \PDO
     */
    function __construct() {

        try {

            $this->conn = new \PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
        } catch (\PDOException $ex) {
            print $ex->getCode() . " - " . $ex->getMessage();
            exit(0);
        }

        return $this->conn;
    }

    /**
     * 
     * @param type $statement
     * @return \PDOStatement
     */
    public function query_sql($statement) {
        try {
            $stmt_query = $this->conn->query($statement);
        } catch (Exception $ex) {
            print $ex->getCode() . " - " . $ex->getMessage();
            exit(0);
        }

        return $stmt_query;
    }

    /**
     * 
     * @param string $statement
     * @return ArrayIterator
     */
    public function exec_fetch($statement) {
        try {
            $resultSet = $this->query_sql($statement);
            $arrayData = array();
            $id = 0;

            foreach ($resultSet->fetchAll(\PDO::FETCH_ASSOC) as $row) {
                $arrayData = array($id++ => $row);
            }
        } catch (Exception $ex) {
            print $ex->getCode() . " - " . $ex->getMessage();
            exit(0);
        }

        return $arrayData;
    }

    public function insert_sql($statement) {
        $stmt = $this->conn->prepare($statement);
        $stmt->execute();        
    }

}

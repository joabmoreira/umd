<?php
/**
 * Created by PhpStorm.
 * User: joab
 * Date: 25/05/2018
 * Time: 22:20
 */
class Sql extends PDO {
    private  $conn;
    public  function __construct()
    {
        $banco = "moinhoteste";
        $servidor = "192.168.101.30";
        $usuario = "sa";
        $senha = "mygod&1000";
        $this->conn = new PDO("sqlsrv:Database=$banco;server=$servidor;ConnectionPooling=0", $usuario, $senha);
    }

    private  function  setParams($statement, $parameters = array()){
        foreach ($parameters as $key => $value){
            $this->setParam($statement, $key, $value);
        }
    }

    private  function  setParam($statement, $key, $value){
        $statement->bindParam($key, $value);
    }

    public function query($rawQuery, $params =array()){
        $stmt = $this->conn->prepare($rawQuery);
        $this->setParams($stmt, $params);

        $stmt->execute();
        return $stmt;
    }

    public  function  select($rawQuery, $params = array()):array
    {
        $stmt = $this->query($rawQuery, $params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>
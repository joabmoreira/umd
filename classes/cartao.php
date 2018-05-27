<?php
/** joab git mais alteracao
 * Created by PhpStorm.
 * User: joab
 * Date: 26/05/2018
 * Time: 09:02 ok alterado aqui
 */
class Cartao{
    private $UKEY;
    private $A04_001_C;
    private $A04_005_C;
    private $TIMESTAMP;


    public function getUkey(){
        return $this->UKEY;
    }
    public function setUkey($value){
        $this->UKEY = $value;
    }

    public function getTimestamp(){
        return $this->TIMESTAMP;
    }
    public function setTimestamp($value){
        $this->TIMESTAMP = $value;
    }

    public function getA04_001_c(){
        return $this->A04_001_C;
    }
    public function setA04_001_c($value){
        $this->A04_001_C = $value;
    }

    public function getA04_005_c(){
        return $this->A04_005_C;
    }
    public function setA04_005_c($value){
        $this->A04_005_C = $value;
    }

    public function loadByUkey($ukey){
        $sql = new Sql();

        $results = $sql->select("select * from a04 where ukey = :ukey",array(
            ":ukey"=>$ukey
        ));

        if(count($results)>0 ){
            $this->setData($results[0]);
        }
    }
    public static function getList(){
        $sql = new Sql();
        return $sql->select("select * from a04 order by a04_001_c;");
    }

    public static function search($a04_001_c){
        $sql= new Sql();
        return $sql->select("select * from a04 where a04_001_c LIKE :SEARCH ORDER BY a04_001_c",array(
            ':SEARCH'=>"%".$a04_001_c."%"
        ));
    }

    public function login($login,$senha){
        $sql = new Sql();

        $results = $sql->select("select * from a04 where a04_001_c = :LOGIN and a04_005_c = :SENHA",array(
            ":LOGIN"=>$login,
            ":SENHA"=>$senha
        ));

        if(count($results)>0 ){
            //print_r($results);
            $this->setData($results[0]);

        } else {
            throw new Exception("Login ou senha ivalido.");
        }
    }

    public function setData($data){
        $this->setUkey($data['UKEY']);
        $this->setTimestamp(new DateTime($data['TIMESTAMP']));
        $this->setA04_001_c($data['A04_001_C']);
        $this->setA04_005_c($data['A04_005_C']);
    }

    public function insert(){
        try {
            $sql = new Sql();

            /*$results = $sql->select("EXECUTE dbo.sp_a04_insert :UKEY,:A04_001_C,:A04_005_C ", array(
                ':UKEY' => $this->getUkey(),
                ':A04_001_C' => $this->getA04_001_c(),
                ':A04_005_C' => $this->getA04_005_c()
            ));*/

            $results = $sql->select("INSERT INTO A04 (UKEY,A04_001_C,A04_005_C) VALUES(:UKEY,:A04_001_C,:A04_005_C) ", array(
                ':UKEY' => $this->getUkey(),
                ':A04_001_C' => $this->getA04_001_c(),
                ':A04_005_C' => $this->getA04_005_c()
            ));


        }catch (Exception $e) {
            echo 'ERRO AO INSERIR: ',  $e->getMessage();
        }

        $results2 = $sql->select("select * from a04 where ukey =:UKEY",array(
            ':UKEY' => $this->getUkey()
        ));

        if (count($results2)>0){
            $this->setData($results2[0]);
        }else{
            echo "erro ao incluir";
        }
            
    }

    public function update($a04_001_c,$a04_005_c){
        $this->setA04_001_c($a04_001_c);
        $this->setA04_005_c($a04_005_c);

        $sql = new Sql();

        $sql->query("UPDATE A04 SET A04_001_C = :A04_001_C,A04_005_C =:A04_005_C WHERE UKEY =:UKEY",array(
            ':A04_001_C'=>$this->getA04_001_c(),
            ':A04_005_C'=>$this->getA04_005_c(),
            ':UKEY'=>$this->getUkey()
        ));

    }

    public function delete(){
        $sql = new Sql();
        $sql->query("delete a04 where ukey=:UKEY",array(
            ':UKEY'=>$this->getUkey()
        ));
        $this->setUkey("");
        $this->setA04_005_c("");
        $this->getA04_001_c("");
        $this->getTimestamp(new DateTime());
    }

    public  function __construct($ukey='',$a04_001_c='',$a04_005_c='')
    {
        $this->setUkey($ukey);
        $this->setA04_001_c($a04_001_c);
        $this->setA04_005_C($a04_005_c);
    }

    public function __toString()
    {
        return json_encode(array(
            "UKEY"=>$this->getUkey(),
           // "TIMESTAMP"=>$this->getTimestamp()->format("d/m/y H:i:s"),
            "A04_001_C"=>$this->getA04_001_c(),
            "A04_005_C"=>$this->getA04_005_c()
        ));
    }
}
?>

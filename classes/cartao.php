<?php
/** joab git
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
            //print_r($results);
            $row=$results[0];

            $this->setUkey($row['UKEY']);
            $this->setTimestamp(new DateTime($row['TIMESTAMP']));
            $this->setA04_001_c($row['A04_001_C']);
            $this->setA04_005_c($row['A04_005_C']);
        }
    }
    public function __toString()
    {
        return json_encode(array(
            "UKEY"=>$this->getUkey(),
            "TIMESTAMP"=>$this->getTimestamp()->format("d/m/y H:i:s"),
            "A04_001_C"=>$this->getA04_001_c(),
            "A04_005_C"=>$this->getA04_005_c()
        ));
    }
}
?>

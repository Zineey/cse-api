<?php
class GlobalMethods{
    protected $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function callNoData($proc){
        $data = null;
        $msg = "Unable to retrieve Data";
        $sys = "";
        $code = 400;
        $remarks = "Failed";
        $sql = "CALL ".$proc."()";
        $stmt = $this->pdo->prepare($sql);

        try{
            $stmt->execute();
            if($stmt->rowCount()>0){
                if($res = $stmt->fetchAll()): $data = $res; endif;
                    $msg = "Successfully Retrieved data";
                    $code = 200;
                    $remarks = "Success";      
                }else{
                    $data = null;
                    $msg = "Unable to retrieve Data";
                    $sys = "";
                    $code = 400;
                     
                }
        }catch(\PDOException $e){
            $code = 400;
            $sys = $e->getMessage();
        }
        $stmt->closeCursor();
        $status = array("rem" => $remarks, "msg" => $msg, "sys" => $sys);
        http_response_code($code);
        // return $data;
        return array(
            "status" => $status,
            "data" => $data,
            "stamp" => date_create(),
            "code" => $code,
            "Developers" => array("name" => "John Carlo D. Ramos"));
    }

    public function callWithData($proc, $dt){
        $params = $dt->payload;
        $data = null;
        $msg = "Unable to process Data";
        $sys = "";
        $code = 0;
        $remarks = "Failed";
        $values = array();

        foreach($params as $key => $value){
            array_push($values, $value);
        }
        $sql = "CALL $proc(".str_repeat("?", count($values)-1)."?);";
        $stmt = $this->pdo->prepare($sql);
        try {
            $stmt->execute($values);
            $data = $stmt->fetchAll();
            if (count($data) > 0) {
                $msg = "Successfully processed data";
                $code = 200;
                $remarks = "Success";
            }else{
                    $data = null;
                    $msg = "Unable to process Data";
                    $sys = "";
                    $code = 400;
                }
        }catch(\PDOException $e){
            $code = 400;
            $sys = $e->getMessage();
            }
        $stmt->closeCursor();
        $status = array("rem" => $remarks, "msg" => $msg, "sys" => $sys);
        http_response_code($code);
        return array(
            "status" => $status,
            "data" => $data,
            "stamp" => date_create(),
            "code" => $code,
            "Developers" => array("name" => "John Carlo D. Ramos"));
    }

}
?>
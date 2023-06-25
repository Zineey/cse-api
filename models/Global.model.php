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
        $sql = "Call ".$proc."()";
        $stmt = $this->pdo->prepare($sql);

        try{
            $stmt->execute();
            if($stmt->rowCount()>0){
                if($res = $stmt->fetchAll()): $data = $res; endif;
                    $msg = "Successfully Retrieved data";
                    $code = 200;
                    $res = null;
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
        $status = array("rem"=>$remarks, "msg"=>$msg, "sys"=>$sys);
        http_response_code($code);
        return array("status"=>$status,"data"=>$data, "stamp"=>date_create(), "Developers"=>array("name"=>"John Carlo D. Ramos"));
    }

}
?>
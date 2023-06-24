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
                if($res = $this->$stmt->fetchAll()){
                    $data = $res;
                    $msg = "Successfully Retrieved data";
                    $code = 200;
                    $remarks = "Success";      
                }else{
                    $data = null;
                    $msg = "Unable to retrieve Data";
                    $sys = "";
                    $code = 400;
                    $remarks = "Failed";
                    $sql = "Call ".$proc."()";
                    $stmt = $this->pdo->prepare($sql);
                }
            }
        }catch(\PDOException $e){

        }
        $stmt->closeCursor();
        $status = array("code"=>$code,"remarks"=>$remarks,"message"=>$msg,"system"=>$sys);
        return json_encode(array("status"=>$status,"payload"=>$data));
    }

}
?>
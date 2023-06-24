<?php
class Payroll{
    protected $gm, $auth, $pdo;

    public function __construct(\PDO $pdo, $gm, $auth)
    {
        $this->pdo = $pdo;
        $this->gm = $gm;
        $this->auth = $auth;
    }

    public function getEmployees(){
        $data = null;
        $msg = "Unable to retrieve Data";
        $sys = "";
        $code = 400;
        $remarks = "Failed";
        $sql = "Call getEmployees()";
        $stmt = $this->pdo->prepare($sql);

        try{
            $stmt->execute();
            if($stmt->rowCount()>0){
                if($res = $this->$stmt->fetchAll()){
                    $data = $res;
                    $msg = "Successfully Retrieved data";
                    $code = 200;
                    $remarks = "Success";      
                }
            }
        }catch(\PDOException $e){

        }
        return json_encode(array("payload=>$data"));
    }
}
?>
<?php
$dt = json_decode(file_get_contents("php://input"));
if($req[0] == 'getemployees'){ echo json_encode($gm->callRoutine("getEmployees")); return;}
if($req[0] == 'getemployee'){ echo json_encode($gm->callRoutine("getEmployee", $dt)); return;}
if($req[0] == 'changepass'){ echo json_encode($gm->callRoutine("changePass", $dt)); return;}
if($req[0] == 'addemployees'){ echo json_encode($gm->callRoutine("addEmployee", $dt)); return;}
if($req[0] == 'deleteemployee'){ echo json_encode($gm->callRoutine("deleteEmployees", $dt)); return;}
if($req[0] == 'login'){ echo json_encode($gm->callRoutine("authLogin", $dt)); return;}
if($req[0] == 'addpayroll'){ echo json_encode($gm->callRoutine("addPayroll", $dt)); return;}
if($req[0] == 'updateemployee'){ echo json_encode($gm->callRoutine("updateEmployeeInfo", $dt)); return;}
if($req[0] == 'updatepay'){ echo json_encode($gm->callRoutine("updatePayInfo", $dt)); return;}
?>
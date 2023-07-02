<?php
$dt = array();
if($req[0] == 'getemployees'){ echo json_encode($gm->callRoutine("getEmployees")); return;}
if($req[0] == 'getemployee'){ echo json_encode($gm->callRoutine("getEmployee", $dt)); return;}
if($req[0] == 'changepass'){ echo json_encode($gm->callRoutine("changePass", $dt)); return;}
if($req[0] == 'addemployees'){ echo json_encode($gm->callRoutine("addEmployee", $dt)); return;}
if($req[0] == 'deleteemployee'){ echo json_encode($gm->callRoutine("deleteEmployees", $dt)); return;}
?>
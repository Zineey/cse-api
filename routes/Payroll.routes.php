<?php
if($req[0] == 'getemployees'): return print_r(json_encode($gm->callNoData("getEmployees"))); return; endif;
if($req[0] == 'changepass'): echo json_encode($gm->callWithData("changePass")); return; endif;
if($req[0] == 'addemployees'): echo json_encode($gm->callWithData("getEmployees", $dt)); return; endif;
?>
<?php
if($req[0] == 'getemployees'): return json_encode($gm->callNoData("getEmployees")); return; endif;
?>
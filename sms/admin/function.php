<?php
function checkresult($sid)
{
$sql="SELECT * FROM `result` WHERE `student_id`='$sid'";
$result_stud=mysql_query($sql);
$total=mysql_num_rows($result_stud);
return $total;
}
?>
<?php
$totalOperators = mysql_result(mysql_query("SELECT COUNT(DISTINCT(id)) AS count FROM operators"), 0);
$totalOperators = number_format(floor($totalOperators/1000)*1000);

echo $totalOperators;
?>
<?php
$stats['totalOperators'] = mysql_result(mysql_query("SELECT COUNT(DISTINCT(id)) AS count FROM operators"), 0);
echo $stats['totalOperators'];
?>
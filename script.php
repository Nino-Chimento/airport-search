<?php
$host = "localhost";
$user = "root";
$password = "root";
$db = "airport";

$conn = new mysqli($host, $user, $password,$db);

function lowPrice($departue,$arrival) {
  $sql = "SELECT (IFNULL(alpha.price, 0) + IFNULL(bravo.price, 0)) AS cost 
  FROM flight AS alpha 
  LEFT JOIN flight AS bravo 
  ON alpha.code_arrival = bravo.code_departure 
  WHERE alpha.code_departure = $departue 
  AND ( bravo.code_arrival = $arrival OR alpha.code_arrival = $arrival ) 
  ORDER BY cost ASC LIMIT 1";
  $result=  $conn->query($sql);
  $lowPrice= mysql_fetch_array($result);
  var_dump($lowPrice);
}


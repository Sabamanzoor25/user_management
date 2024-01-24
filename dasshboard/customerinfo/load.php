<?php

include_once '../../DB/db.php';


$sql = "SELECT DISTINCT c.username,  c.email  FROM (( vworlduser as v
INNER JOIN registerclient AS c ON c.cid = v.cid)
INNER JOIN package AS p ON p.pid = v.pid)
where p.ptype= 'VM' OR p.ptype= 'VApps';";

$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

if(mysqli_num_rows($result) > 0 ){
  $output = mysqli_fetch_all($result, MYSQLI_ASSOC);

  echo json_encode($output);

}else{
  echo "No Record Found.";
}

?>

<?php

include_once '../../DB/db.php';
$email=$_POST['email'];

$sql = "SELECT c.cid,c.username,c.email, c.ctype,p.ptype, p.vname, p.appname, v.assigndate, v.duration FROM (( vworlduser as v
INNER JOIN registerclient AS c ON c.cid = v.cid)
INNER JOIN package AS p ON p.pid = v.pid) WHERE c.email = '$email'";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)){

  echo '<table border="0" width="100%"  cellpadding="10px">
              <tr>
                
              <tr> <th>User Name</th>
              <td>'; echo $row["username"]. '</td>
              </tr>
               <tr> 
                 <th>Email</th>
                 <td>'; echo $row["email"] . '</td>
                 </tr>
               <tr> 
                 <th>Pakage Type</th>
                 <td>'; echo $row["ptype"] . '</td>
                 </tr>
               <tr> 
                 <th>Vname</th>
                 <td> '; echo $row["vname"]. ' </td>
                 </tr>
               <tr> 
               <tr> 
               <th>C-Type</th>
               <td> '; echo $row["ctype"]. ' </td>
               </tr>
             <tr> 
                 <th>App Name</th>
                 <td>'; echo $row["appname"]. '</td>
                 </tr>
               <tr> 
                 <th>Assign Date</th>
                 <td> '; echo $row["assigndate"] . '</td>
                 </tr>
               <tr> 
                 <th>Duration</th>
                 <td >'; echo $row["duration"] . '</td>
                </tr>
               </tr>

  
  </table>';
  }}
   
else{
    echo "No
     Record Found.";
}

?>

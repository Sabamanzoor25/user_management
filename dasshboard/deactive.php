<?php
      include_once '../DB/db.php';
    $vids = array();
    // $ids = implode(",",$_POST["id"]);
    $vids = $_POST["vid"];
    
    
    // $deactive = "UPDATE inf SET active=0 where n_id IN(".$ids.")";
    $deactive = "UPDATE notification SET status=1 where status='0' and vid= ".$vids." ";
    
    $result = mysqli_query($conn,$deactive);
    echo mysqli_error($conn);

?>
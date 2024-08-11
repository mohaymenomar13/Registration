<?php
$conn = mysqli_connect('localhost','root','','test');


$id=$_GET['deleteid'];

    $sql = "DELETE FROM `data` WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        header ("location: /Registration/fData.php");
    }

?>
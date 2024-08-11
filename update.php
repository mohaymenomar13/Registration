<?php
$currentImg=$_POST['currentImg'];
$idddd=$_POST['id'];
$fn=$_POST['firstName'];
$mn=$_POST['middleName'];
$ln=$_POST['lastName'];
$em=$_POST['email'];
$pn=$_POST['phoneNumber'];
$bd=$_POST['birthDate'];
$gd=$_POST['gender'];
$DidChangePhoto=$_POST['DidChangePhoto'];

$pmName = $_FILES['changePhoto']['name'];
$pmTmp = $_FILES['changePhoto']['tmp_name'];

if($DidChangePhoto==true){
$fileExt = explode('.', $pmName);
$fileActualExt = strtolower(end($fileExt));
$pmNameNew = uniqid('IMG-', true).".".$fileActualExt;
$fileDestination = 'img/'.$pmNameNew;
move_uploaded_file($pmTmp, $fileDestination);

$imgg = "img/$currentImg";
unlink ($imgg);
}
//echo "$id,$fn,$mn,$ln,$em,$pn,$bd,$gd";

$conn = mysqli_connect('localhost','root','','test');

if($DidChangePhoto==true) {
$sql = "UPDATE `data` SET `firstName`='$fn',`middleName`='$mn',`lastName`='$ln',`email`='$em',`phoneNumber`='$pn',`birthDate`='$bd',`gender`='$gd',`photo`='$pmNameNew' WHERE id=$idddd";
$result=mysqli_query($conn,$sql);
} else {
    $sql = "UPDATE `data` SET `firstName`='$fn',`middleName`='$mn',`lastName`='$ln',`email`='$em',`phoneNumber`='$pn',`birthDate`='$bd',`gender`='$gd' WHERE id=$idddd";
    $result=mysqli_query($conn,$sql);
};
if($result) {
    header ("location: /Registration/fData.php");
};
?>
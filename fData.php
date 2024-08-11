<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"?v=<?php echo time(); ?>" >
</head>
<style>
    body {
        justify-content: center;
        font-size: 20px;
    }
    .displayD {
        width: 100%;
        height: 100%;
    }
    table, tr, th, td {
        border: 1px solid black;
    }
    table {
        width: 100%;
    }
    .wA {
        width: auto;
        border: 0;
        margin-top: 5px;
    }
    .table2 {
        padding-bottom:50px;
    }
    .wF {
        width: 100%;
    }
    .edit {
        cursor: pointer;
    }
    .spanText {
        position:absolute;text-overflow: ellipsis;width:120px;overflow:hidden;top:68%;
    }
    #test {
     display:none;   
    }
    #dialogC {
        position: absolute;
        cursor: pointer;
        top: 0px;
        left: 362px;
        text-decoration: none;
        color: black;
    }
    #dialogC:hover {
        color:red;
    }
    .blur > *:not(#dialog) {
        filter: blur(3px);
    }
    .submitDialog {
        position: absolute;
        left:45%;
        bottom:50px;
        transform: scale(1.2);
        text-align: center;
        height: 25px;
        width: auto;
        font-weight: lighter;
        transition: 0.2s;
        cursor: pointer;
        border-radius: 10px;
        background-color: lime;
        border: solid black 1px;
    }
    .center {
        top: 15%;
    }
</style>
<?php 
?>
<body>
<div class="homeM"><div class="homeC"><a href="index.php" class="home displayD homeA">Home</a><a href="fData.php" class="home displayD" style="color:white;">Data</a></div></div>
<?php
    $conn = mysqli_connect('localhost','root','','test');
?>
<div id="mother1">
    <div class="displayD">
    <table>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>email</th>
            <th>Phone Number</th>
            <th>Birthdate</th>
            <th>Gender</th>
            <th colspan="2">Operations</th>
        </tr>
        <?php
            $sql = 'SELECT * FROM `data` WHERE  1';
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $id=$row['id'];
                $photoo=$row['photo'];
                $firstName=$row['firstName'];
                $middleName=$row['middleName'];
                $lastName=$row['lastName'];
                $email=$row['email'];
                $phoneNumber=$row['phoneNumber'];
                $birthDate=$row['birthDate'];
                $gender=$row['gender'];

                echo '<tr>
                        <td>'.$id.'</td>
                        <td><img src="img/'.$photoo.'" style="width: 50px; height: 50px;"></td>
                        <td>'.$firstName.'</td>
                        <td>'.$middleName.'</td>
                        <td>'.$lastName.'</td>
                        <td>'.$email.'</td>
                        <td>'.$phoneNumber.'</td>
                        <td>'.$birthDate.'</td>
                        <td>'.$gender.'</td>
                        <td><a onclick="edit()" href="fData.php?id='.$id.'&firstName='.$firstName.'&middleName='.$middleName.'&lastName='.$lastName.'&email='.$email.'&phoneNumber='.$phoneNumber.'&birthDate='.$birthDate.'&gender='.$gender.'&photo='.$photoo.'" class="edit">Edit</a></td>
                        <td><a href="delete.php?deleteid='.$id.'">Delete</a></td>
                    </tr>';
            }
        ?>
    </table>
    </div>
</div>
    <dialog id="dialog" style="width:350px;" class="dialogMessage aniOpen center" open>
        <table class="wA table2" style="justify-content: start">
        
        <?php
        $iddd=$_GET['id'];
        $fn=$_GET['firstName'];
        $mn=$_GET['middleName'];
        $ln=$_GET['lastName'];
        $em=$_GET['email'];
        $pn=$_GET['phoneNumber'];
        $bd=$_GET['birthDate'];
        $gd=$_GET['gender'];
        $pm=$_GET['photo'];

        ?>
        <form action="update.php" method="post" enctype="multipart/form-data">
            <input type="text" name="id" id="id" style="display:none" value="<?php echo $iddd?>">
            <tr style="text-align:start">
                <th class="wA">Firstname:</th><td class="wA"><input class="box" style="width: 100%" type="text" name="firstName" id="firstName" value="<?php echo $fn?>"></td>
            </tr>
            <tr>
                <th class="wA">Middlename:</th><td class="wA"><input class="box" style="width: 100%" type="text" name="middleName" id="middlename" value="<?php echo $mn?>"></td>
            </tr>
            <tr>
                <th class="wA">Lastname:</th><td class="wA"><input class="box" style="width: 100%" type="text" name="lastName" id="lastName" value="<?php echo $ln?>"></td>
            </tr>
            <tr>
                <th class="wA">Email:</th><td class="wA"><input class="box" style="width: 100%" type="text" name="email" id="email" value="<?php echo $em?>"></td>
            </tr>
            <tr>
                <th class="wA">Phonenumber:</th><td class="wA"><input class="box" style="width: 100%" type="text" name="phoneNumber" id="phoneNumber" value="<?php echo $pn?>"></td>
            </tr>
            <tr>
                <th class="wA">Birthdate:</th><td class="wA"><input class="box" style="width: 100%" type="text" name="birthDate" id="birthDate" value="<?php echo $bd?>"></td>
            </tr>
            <tr>
                <th class="wA">Gender:</th><td class="wA"><select class="box" name="gender" id="gender"><option value="<?php echo $gd?>"><?php echo $gd?></option><option value="Male">Male</option><option value="Female">Female</option></select></td>
            </tr>
            <tr>
                <th class="wA">Photo:</th>
                <td class="wA">
                    <img id="imgUd" style="width: 100px; height: 100px;" onclick="chPhoto()">
                    <input type="file" name="changePhoto" id="changePhoto" onchange="chdPhoto()" hidden>
                    <?php $DidChangePhoto = false?>
                    <input type="text" id="DidChangePhoto" name="DidChangePhoto" value="<?php echo $DidChangePhoto;?>" hidden>
                    <span id="spanText" class="spanText"></span>
                    <input type="text" name="currentImg" hidden value="<?php echo $pm?>">
                </td>
            </tr>
            <input class="submitDialog" type="submit" value="SUBMIT" name="update">
            <tr>
        </form>
        </table>
        <a id="dialogC" href="fData.php">X</a>
    </dialog>


    <p type="text" id="test"><?php echo $fn?></p>



        <script>
            var dialog = document.getElementById("dialog");
            var test = document.getElementById("test");
            var mother1 = document.getElementById("mother1");

            var spanTxt = document.getElementById("spanText");
            var spanTextT = document.getElementById("changePhoto");
            var tryText = document.getElementById("try");
            var imgCurrent = "img/<?php echo $pm?>"
            imgUd.src = imgCurrent;
            spanTxt.innerHTML = "<?php echo $pm?>";



            if (test.innerHTML === "") {
                dialog.close();
            } else {
                dialog.show();
                mother1.classList.add("blur");
                dialogMessage.classList.add("aniOpen");
            }
            function chdPhoto() {
                var imageURL = URL.createObjectURL(event.target.files[0]);
                imgUd.src = imageURL;
                document.getElementById("spanText").innerHTML = spanTextT.value.match (/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];    
                document.getElementById("DidChangePhoto").value = true;
            }
            function chPhoto() {
                document.getElementById("changePhoto").click();
            }
            function fileChng() {
                document.getElementById("photoButton").click();
            }
        </script>
</body>
</html>
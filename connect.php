<?php
        $firstName = $_POST['pFirstN'];
        $middleName = $_POST['pMiddleN'];
        $lastName = $_POST['pLastN'];
        $email = $_POST['pEmail'];
        $phoneNumber = $_POST['pPhoneNumber'];
        $birthDate = $_POST['pBirthdate'];
        $gender = $_POST['pGender'];
        //Image
        $image = $_FILES['image']['name'];
        $imageTmpName = $_FILES['image']['tmp_name'];

        $fileExt = explode('.', $image);
        $fileActualExt = strtolower(end($fileExt));
        $fileNameNew = uniqid('IMG-', true).".".$fileActualExt;
        $fileDestination = 'img/'.$fileNameNew;
        move_uploaded_file($imageTmpName, $fileDestination);
        //Image/


        $conn = mysqli_connect('localhost','root','','test');
        $sql = "INSERT INTO `data`(`firstName`, `middleName`, `lastName`, `email`, `phoneNumber`, `birthDate`, `gender`, `photo`) VALUES ('$firstName','$middleName','$lastName','$email','$phoneNumber','$birthDate','$gender','$fileNameNew')";
        $insert = mysqli_query($conn, $sql);
        if (!$insert) {
            echo "something went wrong";
        }
        else {
            header("Location: /Registration");
        }
?>
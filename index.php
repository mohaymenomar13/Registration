<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"?v=<?php echo time(); ?>" >
    <title>Registration</title>
</head>
<style>
</style>
<?php
    $conn = mysqli_connect('localhost','root','','test');
    $count = 0;
?>
<body>
    <div class="homeM"><div class="homeC"><a href="index.php" class="home displayD homeA" style="color:white;">Home</a><a href="fData.php" class="home displayD">Data</a></div></div>
    <div class="mother">
        <div class="displayD" class="displayD">
            <table> 
                <tr>
                    <th style="border-bottom: solid black 1px">ID</th>
                    <th style="border-bottom: solid black 1px">Name</th>
                    <th style="border-bottom: solid black 1px">L. Name</th>
                    <th style="border-bottom: solid black 1px">Gender</th>
                    <th style="border-bottom: solid black 1px" colspan="2">Operations</th>
                </tr>
                <?php
                    $sql = 'SELECT * FROM `data` WHERE  1';
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $count++;
                        $id=$row['id'];
                        echo '<tr>
                                <td>'.$id.'</td>
                                <td>'.$row['firstName'].'</td>
                                <td>'.$row['lastName'].'</td>
                                <td id="genderID">'.$row['gender'].'</td>
                                <td><a style="color: black; font-weight: bold;" href="fData.php">Edit</a></td>
                                <td><a style="color: black; font-weight: bold;" href="deletee.php?deleteid='.$id.'">Delete</a></td>
                            </tr>';
                    }
                ?>
            </table>
        </div>
        <div class="child">
            <div class="titlD"><h1 id="titl">Registration</h1></div>
            <div class="inputBox">
                <div class="divFirstN"><label for="firstName" class="name">Firstname:</label><input onchange="FEmpty()" type="text" name="firstName" id="firstName" class="box" required><p id="pFirstNEmpty" class="boxEmpty">Don't Empty this box</p></div></br>
                <div class="divFirstN"><label for="middleName" class="name">Middlename:</label><input onchange="MEmpty()" type="text" name="middleName" id="middleName" class="box" required><p id="pMiddleNEmpty" class="boxEmpty">Don't Empty this box</p></div><br>
                <div class="divFirstN"><label for="lastName" class="name">Lastname:</label><input onchange="LEmpty()" type="text" name="lastName" id="lastName" class="box" required><p id="pLastNEmpty" class="boxEmpty">Don't Empty this box</p></div><br>
                <div class="divFirstN"><label for="email" class="name">Email:</label><input onchange="autoEmail()" placeholder="@gmail.com" type="email" name="email" id="email" class="box" required><p id="pEmailEmpty" class="boxEmpty">Don't Empty this box</p></div><br>
                <div class="divFirstN"><label for="phoneNumber" class="name">Phonenumber:</label><input oninput="pLength()" onchange="PEmpty()" type="text" name="phoneNumber" id="phoneNumber" class="box" required><p id="pPhoneNumberEmpty" class="boxEmpty">Don't Empty this box</p></div><br>
                <div class="divFirstN"><label for="birthDate" class="name">Birthdate:</label><input onchange="BEmpty()" type="date" name="birthDate" id="birthDate" class="birthdate box" required><p id="pBirthDateEmpty" class="boxEmpty">Don't Empty this box</p></div><br>
                <div class="divFirstN"><label for="gender" class="name">Gender:</label>
                <select class="box" name="gender" id="gender" onchange="AEmpty()" style="width: auto;">
                    <option value=""></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>    <p id="pGenderEmpty" class="boxEmpty">Don't Empty this box</p></div><br>
                <form action="connect.php" method="POST" enctype="multipart/form-data">
                <div class="divFirstN"><span class="name">Photo 2x2 :</span><label for="phoneNumber"><span onclick="photo()" id="spanPhoto" class="spanPhoto">Select Photo</span><span id="spanText" class="spanText">No Photo selected</span></label><input type="file" name="image" id="image" accept=".png,.jpg" hidden="hidden"></div><br>
                <span class="submitButton" onclick="start()">Submit</span>
             </div>
        </div>
        <div class="displayD">
            <div>Number of users registered</div>
            <div style="font-size: 70px; font-weight: bold;"><?php echo $count;?></div>
         </div>
    </div>
    <dialog class="dialogMessage" id="dialogMessage" close>
                <div class="dialogMMother">
                    <div class="dialogM1">
                        <img id="photom1" src="userDefault.jpg" style="width: 90px; height: 90px; position: absolute;">
                        <p class="dialogDetails" style="margin-left: 95px;">Firstname: </p><br>
                        <p class="dialogDetails" style="margin-left: 95px;">Middlename: </p><br>
                        <p class="dialogDetails" style="margin-left: 95px;">Lastname: </p><br><br>
                        <p class="dialogDetails">Email: </p><br>
                        <p class="dialogDetails">Phonenumber: </p><br>
                        <p class="dialogDetails">Birthdate: </p><br>
                        <p class="dialogDetails">Gender: </p><br>
                    </div>
                    <div class="dialogM2">
                        <u><p class="dialogDetails" id="ppFirstN"></p></u><br>
                        <u><p class="dialogDetails" id="ppMiddleN"></p></u><br>
                        <u><p class="dialogDetails" id="ppLastN"></p></u><br><br>
                        <u><p class="dialogDetails" id="ppEmail"></p></u><br>
                        <u><p class="dialogDetails" id="ppPhoneNumber"></p></u><br>
                        <u><p class="dialogDetails" id="ppBirthdate"></p></u><br>
                        <u><p class="dialogDetails" id="ppGender"></p></u><br>
                    </div>
                </div>
                
                <input type="text" class="dialogInput" name="pFirstN" id="pFirstN"></p>
                <input type="text" class="dialogInput" name="pMiddleN" id="pMiddleN"></p>
                <input type="text" class="dialogInput" name="pLastN" id="pLastN"></p>
                <input type="text" class="dialogInputFGender" name="pEmail" id="pEmail"></p>
                <input type="text" class="dialogInput" name="pPhoneNumber" id="pPhoneNumber"></p>
                <input type="text" class="dialogInput" name="pBirthdate" id="pBirthdate"></p>
                <input type="text" class="dialogInputFGender" name="pGender" id="pGender"></p>
                <p class="dialogExit" onclick="no()">X</p>
                <p class="confirmP">Are you sure to submit this data?</p>
                <input class="submitDialog" type="submit" name="submit" value="yes">
                <p class="submitDialog submitDialogN" onclick="no()">no</p>
                </form>
                <p id="text"></p>
            </dialog>
    <script>

    var dialogMessage = document.querySelector(".dialogMessage");
    var title = document.getElementById("title");

    function photo() {
        image.click();
        image.addEventListener("change", function() {
            var photom1 = document.getElementById("photom1");
            var text = document.getElementById("text");
            var imageURL = URL.createObjectURL(event.target.files[0]);
            if (image.value === "") {
                document.getElementById("spanText").innerHTML = "No photo selected";
                image.value = "userDefault.jpg";
                photom1.src = "userDefault.jpg";
            } else {
                document.getElementById("spanText").innerHTML = image.value.match (/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
                document.getElementById("photom1").src = imageURL;
            }
        });
    }

    function autoEmail() {
        var email = document.getElementById("email").value;
        var cEmail = email.replace("@gmail.com", "");
        email.select()
        if (email == cEmail+"@gmail.com") {
        } else {
            document.getElementById("email").value = email+"@gmail.com";
        }
        var emailV = email+"@gmail.com";
        document.getElementById("email").classList.remove("boxEmptyActive");
        document.getElementById("pEmailEmpty").classList.remove("boxEmptyActive");
    }
    function no() {
        document.querySelector(".mother").classList.remove("test");
        dialogMessage.classList.remove('aniOpen');
        dialogMessage.close();
    }
    function start() {
    var fName = document.getElementById("firstName").value;
    var mName = document.getElementById("middleName").value;
    var lName = document.getElementById("lastName").value;
    var email = document.getElementById("email").value;
    var phoneNumber = document.getElementById("phoneNumber").value;
    var birthDate = document.getElementById("birthDate").value;
    var gender = document.getElementById("gender").value;
    
    
    if (fName == '' || fName == null) {
        document.getElementById("firstName").classList.add("boxEmptyActive");
        document.getElementById("pFirstNEmpty").classList.add("boxEmptyActive");
        return false;
    }
    if (mName == '' || mName == null) {
        document.getElementById("middleName").classList.add("boxEmptyActive");
        document.getElementById("pMiddleNEmpty").classList.add("boxEmptyActive");
        return false;
    }
    if (lName == '' || lName == null) {
        document.getElementById("lastName").classList.add("boxEmptyActive");
        document.getElementById("pLastNEmpty").classList.add("boxEmptyActive");
        return false;
    }
    if (email == '' || email == null) {
        document.getElementById("email").classList.add("boxEmptyActive");
        document.getElementById("pEmailEmpty").classList.add("boxEmptyActive");
        return false;
    }
    if (phoneNumber == '' || phoneNumber == null) {
        document.getElementById("phoneNumber").classList.add("boxEmptyActive");
        document.getElementById("pPhoneNumberEmpty").classList.add("boxEmptyActive");
        return false;
    }
    if (birthDate == '' || birthDate == null) {
        document.getElementById("birthDate").classList.add("boxEmptyActive");
        document.getElementById("pBirthDateEmpty").classList.add("boxEmptyActive");
        return false;
    }
    if (gender == '' || gender == null) {
        document.getElementById("gender").classList.add("boxEmptyActive");
        document.getElementById("pGenderEmpty").classList.add("boxEmptyActive");
        return false;
    } else {
        dialogMessage.show();
        dialogMessage.classList.add("aniOpen");
        document.getElementById("ppFirstN").innerHTML = fName;
        document.getElementById("ppMiddleN").innerHTML = mName;
        document.getElementById("ppLastN").innerHTML = lName;
        document.getElementById("ppEmail").innerHTML = email;
        document.getElementById("ppPhoneNumber").innerHTML = phoneNumber;
        document.getElementById("ppBirthdate").innerHTML = birthDate;
        document.getElementById("ppGender").innerHTML = gender;
        
        document.getElementById("pFirstN").value = fName;
        document.getElementById("pMiddleN").value = mName;
        document.getElementById("pLastN").value = lName;
        document.getElementById("pEmail").value = email;
        document.getElementById("pPhoneNumber").value = phoneNumber;
        document.getElementById("pBirthdate").value = birthDate;
        document.getElementById("pGender").value = gender;

        document.querySelector(".mother").classList.add("test");
        }
    }
    function FEmpty() {
        document.getElementById("firstName").classList.remove("boxEmptyActive");
        document.getElementById("pFirstNEmpty").classList.remove("boxEmptyActive");
    }
    function MEmpty() {
        document.getElementById("middleName").classList.remove("boxEmptyActive");
        document.getElementById("pMiddleNEmpty").classList.remove("boxEmptyActive");
    }
    function LEmpty() {
        document.getElementById("lastName").classList.remove("boxEmptyActive");
        document.getElementById("pLastNEmpty").classList.remove("boxEmptyActive");
    }
    function PEmpty() {
        document.getElementById("phoneNumber").classList.remove("boxEmptyActive");
        document.getElementById("pPhoneNumberEmpty").classList.remove("boxEmptyActive");
        var phoneNumberV = document.getElementById("phoneNumber").value;
        if (phoneNumberV.length > 11) {
            alert("Phonenumber Legnth must be in 11 numbers.");
        } if (phoneNumberV.length < 11) {
            alert("Phonenumber Length must be in 11 numbers.")
        }
    }
    function BEmpty() {
        document.getElementById("birthDate").classList.remove("boxEmptyActive");
        document.getElementById("pBirthDateEmpty").classList.remove("boxEmptyActive");
    }
    function AEmpty() {
        document.getElementById("gender").classList.remove("boxEmptyActive");
        document.getElementById("pGenderEmpty").classList.remove("boxEmptyActive");
    }
    </script>
</body>
</html>
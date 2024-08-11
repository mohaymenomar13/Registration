function start() {
    var fName = document.getElementById("firstName").value;
    var mName = document.getElementById("middleName").value;
    var lName = document.getElementById("lastName").value;
    var email = document.getElementById("email").value;
    var phoneNumber = document.getElementById("phoneNumber").value;
    var birthdate = document.getElementById("birthdate").value;
    var address = document.getElementById("address").value;
    if (fName == '' || mName == '' || lName == '' || email == '' || phoneNumber == '' || birthdate == '' || address == '') {

    } else {
        dialogMessage.show();
        document.getElementById("ppFirstN").innerHTML = "First Name: "+fName;
        document.getElementById("ppMiddleN").innerHTML = "Middle Name: "+mName;
        document.getElementById("ppLastN").innerHTML = "Last Name: "+lName;
        document.getElementById("ppEmail").innerHTML = "Email: "+email;
        document.getElementById("ppPhoneNumber").innerHTML = "Phone Number: "+phoneNumber;
        document.getElementById("ppBirthdate").innerHTML = "BirthDate: "+birthdate;
        document.getElementById("ppAddress").innerHTML = "Address: "+address;
        document.getElementById("firstName").classList.add
    }
}
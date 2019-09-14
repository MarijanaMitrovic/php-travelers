$(document).ready(function () {
    $("#btnRegister").click(function (event) {
        event.preventDefault();
        console.log("dugme radi");
    var arrayOk = [];
    var arrayNotOk = [];
    var firstName = document.querySelector("#tbFirstName").value;
    var reName = /^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/;
    var flag = true;
    if (!reName.test(firstName)) {
    document.querySelector("#tbFirstName").style.border = "1px solid red";
    arrayNotOk.push("First name is not ok");
    flag = false;
    } 
    else if (firstName===""){
        document.querySelector("#tbFirstName").style.border = "1px solid red";
    }
    else {
    document.querySelector("#tbFirstName").style.border = "1px solid #ccc";
    }
    var lastName = document.querySelector("#tbLastName").value;
    if (!reName.test(lastName)) {
    document.querySelector("#tbLastName").style.border = "1px solid red";
    arrayNotOk.push("Last name is not ok");
    flag = false;
    } 
    else if (lastName===""){
        document.querySelector("#tbLastName").style.border = "1px solid red";
    }
    else {
    document.querySelector("#tbLastName").style.border = "1px solid #ccc";
    }
    var email = document.querySelector("#tbEmail").value;
    var reEmail = /^[A-Za-z-_.]{2,15}@[A-Za-z._-]{2,10}\.[a-z]{2,5}$/;
    if (!reEmail.test(email)) {
    document.querySelector("#tbEmail").style.border = "1px solid red";
    arrayNotOk.push("Email is not ok");
    flag = false;
    } 
    else if (email===""){
        document.querySelector("#tbEmail").style.border = "1px solid red";
    }
    else {
    document.querySelector("#tbEmail").style.border = "1px solid #ccc";
    }
    var pass = document.querySelector("#tbLozinka").value;
    var rePassword = /^[\S]{2,50}$/;
    if (!rePassword.test(pass)) {
    document.querySelector("#tbLozinka").style.border = "1px solid red";
    arrayNotOk.push("Password is not ok");
    flag = false;
    } 
    else if (pass===""){
        document.querySelector("#tbLozinka").style.border = "1px solid red";
    }
    else {
    document.querySelector("#tbLozinka").style.border = "1px solid #ccc";
    }
    if (!flag) {
    return flag;
    }



    $.ajax({
    method: "POST",
    url: "models/users/register.php",
    data: {
    btnRegister: true,
    tbFirstName: firstName,
    tbLastName: lastName,
    tbEmail: email,
    tbLozinka: pass
    },
    success: function (podaci) {
    alert(podaci);
    },
    error: function (xhr, statusTxt, error) {
    var status = xhr.status;
    switch (status) {
    case 500:
    alert("Greska na serveru. Trenutno nije moguce uneti korisnika.");
    break;
    case 404:
    alert("Stranica nije pronadjena.");
    break;
    default:
    alert("Greska: " + status + " - " + statusTxt);
    break;
    }
    }
    });
    });
    });
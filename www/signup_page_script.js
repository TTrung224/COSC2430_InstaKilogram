var email_valid;
var pwd_valid;
var pwd_retype_valid;
var lname_valid;
var fname_valid;
var pfp_valid;

document.querySelector(".login-page-cover .email").addEventListener("keyup",function(){
    var email_input = document.querySelector(".login-page-cover .email");
    var email = email_input.value;

    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
        email_input.style.borderWidth = "2.5px";
        email_input.style.borderColor = 'green';
        email_input.style.outlineColor = 'green';
        email_valid = true;
    } else{
        email_input.style.borderWidth = "2.5px";
        email_input.style.borderColor = 'red';
        email_input.style.outlineColor = 'red';
    }
})

document.querySelector(".login-page-cover .pwd").addEventListener("keyup",function(){
    var pwd_input = document.querySelector(".login-page-cover .pwd");
    var pwd = pwd_input.value;
    if (/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,20}$/.test(pwd)){
        pwd_input.style.borderWidth = "2.5px";
        pwd_input.style.borderColor = 'green';
        pwd_input.style.outlineColor = 'green';
        pwd_valid = true;
    } else{
        pwd_input.style.borderWidth = "2.5px";
        pwd_input.style.borderColor = 'red';
        pwd_input.style.outlineColor = 'red';
        pwd_valid = false
    }
})

document.querySelector(".login-page-cover .pwd-retype").addEventListener("keyup",function(){
    var pwd_retype_input = document.querySelector(".login-page-cover .pwd-retype");
    var pwd_retype = pwd_retype_input.value;
    var pwd = document.querySelector(".login-page-cover .pwd").value;

    if(pwd == pwd_retype && pwd_valid){
        pwd_retype_input.style.borderWidth = "2.5px";
        pwd_retype_input.style.borderColor = 'green';
        pwd_retype_input.style.outlineColor = 'green';
        pwd_retype_valid = true;
    } else{
        pwd_retype_input.style.borderWidth = "2.5px";
        pwd_retype_input.style.borderColor = 'red';
        pwd_retype_input.style.outlineColor = 'red';
        pwd_retype_valid = false;
    }
})

document.querySelector(".login-page-cover .fname").addEventListener("keyup",function(){
    var fname_input = document.querySelector(".login-page-cover .fname");
    var fname_length = fname_input.value.length
    if(fname_length >=2 && fname_length <=20){
        fname_input.style.borderWidth = "2.5px";
        fname_input.style.borderColor = 'green';
        fname_input.style.outlineColor = 'green';
        fname_valid = true;
    } else{
        fname_input.style.borderWidth = "2.5px";
        fname_input.style.borderColor = 'red';
        fname_input.style.outlineColor = 'red';
    }
})

document.querySelector(".login-page-cover .lname").addEventListener("keyup",function(){
    var lname_input = document.querySelector(".login-page-cover .lname");
    var lname_length = lname_input.value.length
    if(lname_length >=2 && lname_length <=20){
        lname_input.style.borderWidth = "2.5px";
        lname_input.style.borderColor = 'green';
        lname_input.style.outlineColor = 'green';
        lname_valid = true;
    } else{
        lname_input.style.borderWidth = "2.5px";
        lname_input.style.borderColor = 'red';
        lname_input.style.outlineColor = 'red';
    }
})

document.querySelector(".login-box").addEventListener("mousemove",function(){
    if(document.querySelector(".login-page-cover #pfp-input").value != ""){
        pfp_valid = true;
    }

    if(pwd_valid && pwd_retype_valid && email_valid && pfp_valid && fname_valid && lname_valid){
        document.querySelector(".login-box .signup-submit-btn").disabled=false;
    } else {
        document.querySelector(".login-box .signup-submit-btn").disabled=true;
    }
})

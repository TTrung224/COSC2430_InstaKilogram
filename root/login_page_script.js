var submitBtn = document.querySelector(".login-page-cover .login-page-submit-btn");
submitBtn.addEventListener("click", function(){
    var email = document.querySelector(".login-page-cover .email").value;
    var pwd = document.querySelector(".login-page-cover .pwd").value;
    if(email == ""){
        alert("email is missing")
    };
    if(pwd == ""){
        alert("password is missing")
    };
})

document.querySelector(".login-page-cover .email").addEventListener("keyup",function(){
    var email = document.querySelector(".login-page-cover .email").value;
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
        document.querySelector(".login-page-cover .email").style.borderWidth = "2.5px";
        document.querySelector(".login-page-cover .email").style.borderColor = 'green';
    } else {
        document.querySelector(".login-page-cover .email").style.borderWidth = "2.5px";
        document.querySelector(".login-page-cover .email").style.borderColor = 'red';
    }
})

// document.querySelector(".login-page-cover .pwd").addEventListener("keyup",function(){
//     var pwd = document.querySelector(".login-page-cover .pwd").value;
//     if (/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,20}$/.test(pwd)){
//         document.querySelector(".login-page-cover .pwd").style.borderWidth = "2.5px";
//         document.querySelector(".login-page-cover .pwd").style.borderColor = 'green';
//     } else {
//         document.querySelector(".login-page-cover .pwd").style.borderWidth = "2.5px";
//         document.querySelector(".login-page-cover .pwd").style.borderColor = 'red';
//     }
// })
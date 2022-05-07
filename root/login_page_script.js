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
    var email_input = document.querySelector(".login-page-cover .email");
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
        email_input.style.borderWidth = "2.5px";
        email_input.style.borderColor = 'green';
        email_input.style.outlineColor = 'green';
        document.querySelector(".login-box .login-page-submit-btn").disabled=false;
    } else{
        var css = ".login-page-cover .login-page-submit-btn:hover{background-color: rgb(82, 158, 220);}";
        var style = document.createElement('style');

        if (style.styleSheet) {
            style.styleSheet.cssText = css;
        } else {
            style.appendChild(document.createTextNode(css));
        }

        document.querySelector(".login-box .login-page-submit-btn").appendChild(style);
        document.querySelector(".login-box .login-page-submit-btn").disabled=true;

        email_input.style.borderWidth = "2.5px";
        email_input.style.borderColor = 'red';
        email_input.style.outlineColor = 'red';
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
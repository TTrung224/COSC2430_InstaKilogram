document.querySelector(".page-number-form #page").addEventListener("keyup",function(){
    var page = document.querySelector(".page-number-form #page").value;
    var number_of_pages = document.querySelector(".page-number-form .number-of-pages").innerHTML;
    if(isNaN(page) || Number(page) < 1 || Number(page) > Number(number_of_pages)){
        document.querySelector(".page-number-form button").disabled=true;
        document.querySelector(".page-number-form #page").style.borderWidth = "2.5px";
        document.querySelector(".page-number-form #page").style.borderColor = 'red';
        document.querySelector(".page-number-form #page").style.outlineColor = 'red';
    } else {
        document.querySelector(".page-number-form button").disabled=false;
        document.querySelector(".page-number-form #page").style.outlineColor = 'rgba(42, 120, 203, 0.911)';
        document.querySelector(".page-number-form #page").style.borderWidth = '1px';
        document.querySelector(".page-number-form #page").style.borderColor = 'rgba(124, 124, 124, 0.604)';
    }
})
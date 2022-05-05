document.querySelector(".page-number-form #page").addEventListener("keyup",function(){
    var page = document.querySelector(".page-number-form #page").value;
    var number_of_pages = document.querySelector(".page-number-form .number-of-pages").innerHTML;
    var page_input = document.querySelector(".page-number-form #page");
    if(isNaN(page) || Number(page) < 1 || Number(page) > Number(number_of_pages)){
        document.querySelector(".page-number-form button").disabled=true;
        page_input.style.borderWidth = "2.5px";
        page_input.style.borderColor = 'red';
        page_input.style.outlineColor = 'red';
    } else {
        document.querySelector(".page-number-form button").disabled=false;
        page_input.style.outlineColor = 'rgba(42, 120, 203, 0.911)';
        page_input.style.borderWidth = '1px';
        page_input.style.borderColor = 'rgba(124, 124, 124, 0.604)';
    }
})
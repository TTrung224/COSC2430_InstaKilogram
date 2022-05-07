// Get the modal
var modal = document.querySelector(".cookie-consent-modal");

// Get the button that opens the modal
var btn = document.querySelector(".cookie-consent-modal .undetand-consent");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
if (document.cookie.indexOf("cookie_consent=") == -1){
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
btn.onclick = function() {
  modal.style.display = "none";
  document.cookie = "cookie_consent=1";
}
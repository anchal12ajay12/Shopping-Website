var navList = document.getElementById("nav-lists");
var x1 = document.getElementById("container_signup_name");
var x2 = document.getElementById("container_signup_email");
var x3 = document.getElementById("container_signup_pass");
var x4 = document.getElementById("container_signup_cpass");
var x5 = document.getElementById("container_signup_sub");


function Show() {
    navList.classList.add("_Menus-show");
    x1.style.visibility="hidden";
    x2.style.visibility="hidden";
    x3.style.visibility="hidden";
    x4.style.visibility="hidden";
    x5.style.visibility="hidden";
}

function Hide(){
    navList.classList.remove("_Menus-show");
    x1.style.visibility = "visible";
    x2.style.visibility = "visible";
    x3.style.visibility = "visible";
    x4.style.visibility = "visible";
    x5.style.visibility = "visible";
}

function index() {
    window.open("index.html");
  }

function otp() {
    window.open("otp.html");
 }



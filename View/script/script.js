// Function to toggle between dark and light mode.
$(document).ready(function () {
  if(localStorage.getItem("dark") === "true"){
    $('.navbar').addClass('dark-mode-navbar');
    $('body').addClass('dark-mode-body');
  }
});
function switchMode() {
  $('body').toggleClass('dark-mode-body');
  $('.navbar').toggleClass('dark-mode-navbar');
  if (localStorage.getItem("dark") === "false") {
    localStorage.setItem("dark", true);
  }
  else {
    localStorage.setItem("dark", false);
  }
}
// Function call.
$('.switch-mode').on("click",switchMode);

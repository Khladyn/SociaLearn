const navLinks = document.querySelectorAll(".sidebar li");
const url = window.location.href;

if (url.includes("dashboard")) {
  navLinks[0].classList.add("active");

} else if (url.includes("courses_my")) {
  navLinks[1].classList.add("active");

} else if (url.includes("courses_enrolled")) {
  navLinks[2].classList.add("active");

} else if (url.includes("courses_all")) {
  navLinks[3].classList.add("active");

} else if (url.includes("network")) {
  navLinks[4].classList.add("active");

} else if (url.includes("profile")) {
  navLinks[5].classList.add("active");

} else {
  // navLinks[0].classList.remove("active");
}

$('.open-btn').on('click', function() {
  $('.sidebar').toggleClass('toggled');
});

$('.close-btn').on('click', function() {
  $('.sidebar').removeClass('toggled');
});
//A Project by Sheshan Abeysekara for Computer Integrated Module of UOB. Registration ID: 2211344
// This JS file handles all event-driven functions related to the sign-in OR sign-up screen.
const inputs = document.querySelectorAll(".input-field");
const toggle_btn = document.querySelectorAll(".toggle");
const main = document.querySelector("main");
const bullets = document.querySelectorAll(".bullets span");
const images = document.querySelectorAll(".image");

inputs.forEach((inp) => {
  inp.addEventListener("focus", () => {
    inp.classList.add("active");
  });
  inp.addEventListener("blur", () => {
    if (inp.value != "") return;
    inp.classList.remove("active");
  });
});

toggle_btn.forEach((btn) => {
  btn.addEventListener("click", () => {
    main.classList.toggle("sign-up-mode");
  });
});

function moveSlider() {
  let index = this.dataset.value;

  let currentImage = document.querySelector(`.img-${index}`);
  images.forEach((img) => img.classList.remove("show"));
  currentImage.classList.add("show");

  const textSlider = document.querySelector(".text-group");
  textSlider.style.transform = `translateY(${-(index - 1) * 2.2}rem)`;

  bullets.forEach((bull) => bull.classList.remove("active"));
  this.classList.add("active");
}

bullets.forEach((bullet) => {
  bullet.addEventListener("click", moveSlider);
});


/**
 * The tooltip element provides more information about each input field, which is useful for enhancing the user
 * experience during platform sign-up.
 * Reference: 
 * https://stackoverflow.com/questions/1333546/how-can-i-display-a-tooltip-message-on-hover-using-jquery
 */

//Adding a Tooltip element for email
$("#email").attr('title', 'Your email should be a valid / recognised email address!');

//Adding a Tooltip element for Passowrd
$("#pwd1").attr('title', 'The Password length must be between 8 chracters to 10 characters long!');
$("#pwdc").attr('title', 'Confirm the above added password again!');

//Adding a Tooltip element for contact number
$("#contact").attr('title', 'When entering password enter your Country code, followed with the number: +94XXXXXXXX');
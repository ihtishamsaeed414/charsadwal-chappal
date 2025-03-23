"use strick";

const btnLogin = document.querySelector(".btn-login-left");
const btnSignUp = document.querySelector(".btn-signup-left");
const contLogin = document.querySelector(".sign-in-container");
const contSignUp = document.querySelector(".sign-up-container");

const openSignIn = function () {
  contLogin.classList.remove("hidden-cont");
  contSignUp.classList.add("hidden-cont");
};

const openSignUp = function () {
  contLogin.classList.add("hidden-cont");
  contSignUp.classList.remove("hidden-cont");
};

btnLogin.addEventListener("click", function () {
  openSignIn();
});

btnSignUp.addEventListener("click", function () {
  openSignUp();
});

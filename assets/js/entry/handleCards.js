import { hideError } from "../utils/setError.js";

export const handleCards = () => {
  const loginButton = document.querySelector("#loginToggle");
  const signupButton = document.querySelector("#signupToggle");
  const loginForm = document.querySelector("#loginForm");
  const signupForm = document.querySelector("#signupForm");

  loginButton.addEventListener("click", () => {
    hideError();
    loginButton.style.backgroundColor = "#263355";
    loginButton.style.color = "#fff";
    signupButton.style.backgroundColor = "#fff";
    signupButton.style.color = "#222";
    signupForm.style.display = "none";
    loginForm.style.display = "block";
  });
  signupButton.addEventListener("click", () => {
    hideError();
    loginButton.style.backgroundColor = "#fff";
    loginButton.style.color = "#222";
    signupButton.style.backgroundColor = "#263355";
    signupButton.style.color = "#fff";
    loginForm.style.display = "none";
    signupForm.style.display = "block";
  });
};

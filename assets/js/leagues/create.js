import {
    isEmpty,
    isPasswordInvalid,
    isUsernameInvalid
  } from "../utils/sanitize.js";
import { showError, hideError } from "../utils/setError.js";

const leagueNameField = document.querySelector(".createLeague .leagueName");
const passwordField = document.querySelector(".createLeague .password");
const createLeagueButton = document.querySelector(".createLeague button");

const hasErrors = () => {
  if (
    isEmpty([
      { element: leagueNameField, label: "Nome da Liga" },
      { element: passwordField, label: "Palavra-chave da liga" }
    ])
  )
    return true;
  else if (isUsernameInvalid(leagueNameField)) return true;
  else if (isPasswordInvalid(passwordField)) return true;
  return false;
};

export const handleSignup = () => {
  passwordField.value = passwordField.value.trim();
  leagueNameField.value = leagueNameField.value.trim();

  createLeagueButton.addEventListener("click", async (e) => {
    hideError();
    e.preventDefault();

    if (hasErrors()) return;

    const signup = await fetch("http://127.0.0.1:5200/leagues/create", {
      method: "POST",
      body: JSON.stringify({
        leagueName: leagueNameField.value,
        secretKey: passwordField.value,
      }),
    });

    const signupJson = await signup.json();

    if (!signupJson.error) {
      location.replace("/leagues");
    } else {
      switch (signupJson.element) {
        case "leagueName":
          showError(signupJson.message, leagueNameField);
          break;
        case "leaguePassword":
          showError(signupJson.message, passwordField);
          break;
      }
    }
  });
};

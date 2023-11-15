import {
  isEmpty,
  isPasswordInvalid,
  isUsernameInvalid,
} from "../utils/sanitize.js";

import { showError, hideError } from "../utils/setError.js";

const leagueNameField = document.querySelector(".loginLeague .leagueName");
const passwordField = document.querySelector(".loginLeague .password");
const loginLeagueButton = document.querySelector(".loginLeague button");

const hasErrors = () => {
  if (
    isEmpty(
      [
        { element: leagueNameField, label: "Nome da Liga" },
        { element: passwordField, label: "Palavra-chave da liga" },
      ],
      ".loginLeague .errorContainer"
    )
  )
    return true;
  else if (isUsernameInvalid(leagueNameField, ".loginLeague .errorContainer"))
    return true;
  else if (isPasswordInvalid(passwordField, ".loginLeague .errorContainer"))
    return true;
  return false;
};

export const handleLogin = () => {
  leagueNameField.value = leagueNameField.value.trim();
  passwordField.value = passwordField.value.trim();

  loginLeagueButton.addEventListener("click", async (e) => {
    e.preventDefault();

    hideError();

    if (hasErrors()) return;

    const login = await fetch("http://127.0.0.1:5200/leagues/login", {
      method: "POST",
      body: JSON.stringify({
        leagueName: leagueNameField.value,
        secretKey: passwordField.value,
      }),
    });

    const loginJson = await login.json();

    if (!loginJson.error) {
      location.replace("/leagues");
    } else {
      showError(
        loginJson.message,
        [leagueNameField, passwordField],
        ".loginLeague .errorContainer"
      );
    }
  });
};

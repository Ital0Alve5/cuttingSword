import {
  isEmpty,
  isEmailInvalid,
  isPasswordInvalid,
} from "../utils/sanitize.js";

import { showError, hideError } from "../utils/setError.js";

const emailField = document.querySelector("#loginForm .emailField");
const passwordField = document.querySelector("#loginForm .passwordField");
const loginButton = document.querySelector("#loginForm button");

const hasErrors = () => {
  if (
    isEmpty([
      { element: emailField, label: "Email" },
      { element: passwordField, label: "Senha" },
    ])
  )
    return true;
  else if (isEmailInvalid(emailField)) return true;
  else if (isPasswordInvalid(passwordField)) return true;
  return false;
};

export const handleLogin = () => {
  emailField.value = emailField.value.trim();
  passwordField.value = passwordField.value.trim();

  loginButton.addEventListener("click", async () => {
    hideError();

    if (hasErrors()) return;

    const login = await fetch("http://127.0.0.1:5200/login", {
      method: "POST",
      body: JSON.stringify({
        email: emailField.value,
        password: passwordField.value,
      }),
    });
    const loginJson = await login.json();

    if (!loginJson.error) {
      location.replace("/");
    } else {
      showError(loginJson.message, [emailField, passwordField]);
    }
  });
};

import {
  isEmpty,
  isEmailInvalid,
  isPasswordInvalid,
  isConfirmPasswordInvalid,
  isUsernameInvalid
} from "../utils/sanitize.js";
import { showError, hideError } from "../utils/setError.js";

const emailField = document.querySelector("#signupForm .emailField");
const userNameField = document.querySelector("#signupForm .userNameField");
const passwordField = document.querySelector("#signupForm .passwordField");
const confirmPasswordField = document.querySelector(
  "#signupForm .confirmPasswordField"
);
const signupButton = document.querySelector("#signupForm button");

const hasErrors = () => {
  if (
    isEmpty([
      { element: emailField, label: "Email" },
      { element: passwordField, label: "Senha" },
      { element: userNameField, label: "Nome de Usuário" },
      { element: confirmPasswordField, label: "Confirmação de Senha" },
    ])
  )
    return true;
  else if (isEmailInvalid(emailField)) return true;
  else if (isUsernameInvalid(userNameField)) return true;
  else if (isPasswordInvalid(passwordField)) return true;
  else if (isConfirmPasswordInvalid(passwordField, confirmPasswordField))
    return true;
  return false;
};

export const handleSignup = () => {
  emailField.value = emailField.value.trim();
  passwordField.value = passwordField.value.trim();
  userNameField.value = userNameField.value.trim();
  confirmPasswordField.value = confirmPasswordField.value.trim();

  signupButton.addEventListener("click", async () => {
    hideError();

    if (hasErrors()) return;

    const signup = await fetch("http://127.0.0.1:5200/signup", {
      method: "POST",
      body: JSON.stringify({
        name: userNameField.value,
        email: emailField.value,
        password: passwordField.value,
      }),
    });

    const signupJson = await signup.json();

    if (!signupJson.error) {
      location.replace("/game");
    } else {
      switch (signupJson.element) {
        case "email":
          showError(signupJson.message, emailField);
          break;
        case "password":
          showError(signupJson.message, passwordField);
          break;
        case "userName":
          showError(signupJson.message, userNameField);
          break;
      }
    }
  });
};

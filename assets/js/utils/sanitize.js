import { showError } from "../utils/setError.js";

export const isEmpty = (fields, errorElementClass = "") => {
  let result = false;

  fields.forEach((field) => {
    if (field.element.value.length === 0) {
      result = true;
      showError(
        `${field.label} é obrigatório.`,
        field.element,
        errorElementClass
      );
    }
  });

  return result;
};

export const isEmailInvalid = (email, errorElementClass = "") => {
  let emailRegex =
    /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

  if (!email.value.match(emailRegex))
    return showError("Email inválido.", email, errorElementClass);

  return false;
};

export const isPasswordInvalid = (password, errorElementClass = "") => {
  if (password.value.length < 6)
    return showError(
      "Senha deve conter mais de 6 caracteres.",
      password,
      errorElementClass
    );
  else if (password.value.length > 20)
    return showError(
      "Senha deve conter menos de 20 caracteres.",
      password,
      errorElementClass
    );

  return false;
};

export const isConfirmPasswordInvalid = (
  password,
  confirmPassword,
  errorElementClass = ""
) => {
  if (password.value !== confirmPassword.value)
    return showError("As senhas diferem.", confirmPassword, errorElementClass);
  return false;
};

export const isUsernameInvalid = (username, errorElementClass = "") => {
  if (username.value.length < 6)
    return showError(
      "Nome deve conter mais de 6 caracteres.",
      username,
      errorElementClass
    );
  else if (username.value.length > 20)
    return showError(
      "Nome deve conter menos de 20 caracteres.",
      username,
      errorElementClass
    );
  else if (username.value.match(" ")) {
    return showError("Nome inválido.", username, errorElementClass);
  }

  return false;
};

import { showError } from "../utils/setError.js";

export const isEmpty = (fields) => {
  let result = false;

  fields.forEach((field) => {
    if (field.element.value.length === 0) {
      result = true;
      showError(`${field.label} é obrigatório.`, field.element);
    }
  });

  return result;
};

export const isEmailInvalid = (email) => {
  let emailRegex =
    /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

  if (!email.value.match(emailRegex))
    return showError("Email inválido.", email);

  return false;
};

export const isPasswordInvalid = (password) => {
  if (password.value.length < 6)
    return showError("Senha deve conter mais de 6 caracteres.", password);
  else if (password.value.length > 20)
    return showError("Senha deve conter menos de 20 caracteres.", password);

  return false;
};

export const isConfirmPasswordInvalid = (password, confirmPassword) => {
  if (password.value !== confirmPassword.value)
    return showError("As senhas diferem.", confirmPassword);
  return false;
};

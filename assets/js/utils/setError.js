export const showError = (message, elements, errorElementClass = "") => {
  let error = document.querySelector(".errorContainer");

  if (errorElementClass.length > 0)
    error = document.querySelector(`${errorElementClass}`);

  error.classList.add("active");

  const li = document.createElement("li");
  li.innerText = message;
  error.appendChild(li);

  if (Array.isArray(elements)) {
    elements.forEach((element) => {
      element.classList.add("errorField");
    });
  } else {
    elements.classList.add("errorField");
  }

  return true;
};

export const hideError = (errorElementClass = "") => {
  let error;

  if (errorElementClass.length > 0) {
    error = document.querySelector(`${errorElementClass}`);
    error.classList.remove("active");
    error.innerHTML = "";
  } else {
    error = document.querySelectorAll(".errorContainer");
    Array.from(error).forEach((erro) => {
      erro.classList.remove("active");
      erro.innerHTML = "";
    });
  }

  Array.from(document.querySelectorAll(".errorField")).forEach((error) => {
    error.classList.remove("errorField");
  });
};

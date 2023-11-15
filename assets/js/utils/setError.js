const error = document.querySelector(".errorContainer");

export const showError = (message, elements) => {
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

export const hideError = () => {
  error.classList.remove("active");
  error.innerHTML = "";

  Array.from(document.querySelectorAll(".errorField")).forEach((error) => {
    error.classList.remove("errorField");
  });
};

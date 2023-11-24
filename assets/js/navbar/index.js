let userNameText = "";
(async function () {
  const getUserInfo = async () => {
    const userNameElement = document.querySelector(".userName");
    const navbarElement = document.querySelector("nav");
    const login = await fetch("http://127.0.0.1:5200/user/info");
    const loginJson = await login.json();
    userNameText = loginJson.userName;

    if (!loginJson.error) {
      userNameElement.innerHTML = `${loginJson.userName} <svg fill="white" width=20 height=20 xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>`;
      navbarElement.style.display = "block";
    } else navbarElement.style.display = "none";
  };

  await getUserInfo();
})();

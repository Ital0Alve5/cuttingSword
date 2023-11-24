let userNameText = "";
(async function () {
  const getUserInfo = async () => {
    const userNameElement = document.querySelector(".userName");
    const logoutButton = document.querySelector(".logout");
    const login = await fetch("http://127.0.0.1:5200/user/info");
    const loginJson = await login.json();
    userNameText = loginJson.userName;
    if (!loginJson.error) {
      userNameElement.innerHTML = `Olá, ${loginJson.userName}!`;
      userNameElement.style.margin = "20px";
      logoutButton.style.display = "block";
    } else {
      userNameElement.innerHTML = `
      <a href="/entry">
        <svg xmlns="http://www.w3.org/2000/svg" width=20 height=20 fill="white" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z"/></svg>
        Faça Login/Cadastro
      </a>
      `;
      logoutButton.style.display = "none";
    }
  };

  await getUserInfo();
})();

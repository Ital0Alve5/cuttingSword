let userNameText = "";
(async function () {
  const getUserInfo = async () => {
    const userNameElement = document.querySelector(".userName");
    const login = await fetch("http://127.0.0.1:5200/user/info");
    const loginJson = await login.json();
    userNameText = loginJson.userName;
    if (!loginJson.error) {
      userNameElement.innerText = `Olá, ${loginJson.userName}!`;
    } else {
      userNameElement.innerHTML = `<a href="/entry">Faça Login/Cadastro</a>`;
    }
  };

  await getUserInfo();
})();

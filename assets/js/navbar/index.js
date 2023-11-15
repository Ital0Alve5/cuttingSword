(async function () {
  const userNameElement = document.querySelector(".userName");

  const getUserInfo = async () => {
    const login = await fetch("http://127.0.0.1:5200/user/info");
    const loginJson = await login.json();

    if (!loginJson.error) {
      userNameElement.innerText = `Olá, ${loginJson.userName}!`;
    } else {
      location.replace("/entry");
    }
  };

  await getUserInfo();
})();

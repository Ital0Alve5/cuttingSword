let userNameText = "";
(async function () {
  const getUserInfo = async () => {
    const userNameElement = document.querySelector(".userName");
    const navbarElement = document.querySelector("nav");
    const login = await fetch("http://127.0.0.1:5200/user/info");
    const loginJson = await login.json();
    userNameText = loginJson.userName;

    if (!loginJson.error) {
      userNameElement.innerHTML = `Olá, ${loginJson.userName}!`;
      navbarElement.style.display = "block";
    } else navbarElement.style.display = "none";
  };

  await getUserInfo();
})();

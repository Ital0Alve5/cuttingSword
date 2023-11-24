(async function () {
  const getUserInfo = async () => {
    const playNowButton = document.querySelector(".playNow");
    const login = await fetch("http://127.0.0.1:5200/user/info");
    const loginJson = await login.json();

    if (!loginJson.error) {
      playNowButton.addEventListener("click", () => {
        location.replace("/game");
      });
    } else
      playNowButton.addEventListener("click", () => {
        location.replace("/entry");
      });
  };

  await getUserInfo();
})();

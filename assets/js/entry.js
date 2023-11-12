(async function () {
  async function makeLogin() {
    const login = await fetch("http://127.0.0.1:5200/login", {
      method: "POST",
      body: JSON.stringify({
        email: "italo_alves_@outlook.com",
        password: "pixEmail",
      }),
    });
    const loginJson = await login.json();
    console.log(loginJson)
    return loginJson;
  }

  await makeLogin();
})();

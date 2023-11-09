(async function () {
  async function getUser() {
    const response = await fetch("http://localhost:8000/teste", {
      method: "GET",
      headers: {
        "Access-Control-Allow-Origin": "*",
        "Access-Control-Allow-Methods": "GET, PUT, POST, DELETE, HEAD, OPTIONS",
      },
    });
    const user = await response.json();
    console.log(user);
  }

  async function postUser() {
    const response = await fetch("http://localhost:8000/teste", {
      method: "POST",
      headers: {
        "Access-Control-Allow-Origin": "*",
        "Access-Control-Allow-Methods": "GET, PUT, POST, DELETE, HEAD, OPTIONS",
      },
      body: JSON.stringify({
        name: "mozau",
        email: "mozau@outlook.com",
        password: "docinho",
      }),
    });
    const user = await response.json();
    console.log(user);
  }

  await getUser();
  //   await postUser();
})();

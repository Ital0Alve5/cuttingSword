(async function () {
  async function getUserLeagues() {
    const leagues = await fetch("http://127.0.0.1:5200/user/leagues");
    const leaguesJson = await leagues.json();
    console.log(leaguesJson);
    return leaguesJson;
  }

  async function mountList() {
    const listElement = document.querySelector(".leaguesList");
    const leagueList = await getUserLeagues();
    console.log(leagueList);
    leagueList.forEach((item) => {
      const liElement = document.createElement("li");
      const aElement = document.createElement("a");
      const spanElement = document.createElement("span");
      liElement.classList.add("leagueItem");
      spanElement.classList.add("leagueName");
      spanElement.innerText = item.name;
      aElement.appendChild(spanElement);
      liElement.appendChild(aElement);
      listElement.appendChild(liElement);
    });
  }

  await mountList();
})();

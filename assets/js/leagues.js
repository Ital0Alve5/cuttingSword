(async function () {
  async function getUserLeagues() {
    const leagues = await fetch("http://127.0.0.1:5200/leagues/list");
    const leaguesJson = await leagues.json();
    return leaguesJson;
  }

  async function mountList() {
    const listElement = document.querySelector(".leaguesList");
    const leagueList = await getUserLeagues();
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

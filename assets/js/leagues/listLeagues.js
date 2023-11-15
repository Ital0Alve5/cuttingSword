const getUserLeagues = async () => {
  const leagues = await fetch("http://127.0.0.1:5200/leagues/list");
  const leaguesJson = await leagues.json();
  return leaguesJson;
};

export const mountList = async () => {
  const listElement = document.querySelector(".leaguesList");
  const leagueList = await getUserLeagues();
  if (!leagueList) return;
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
};


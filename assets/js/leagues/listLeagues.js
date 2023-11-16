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
    const spanElement = document.createElement("span");
    const joinLeagueButton = document.createElement("button");

    joinLeagueButton.innerText = "Jogar";

    liElement.classList.add("leagueItem");
    spanElement.classList.add("leagueName");
    spanElement.innerText = item.name;

    liElement.appendChild(spanElement);
    liElement.appendChild(joinLeagueButton);

    listElement.appendChild(liElement);
  });
};

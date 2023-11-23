const getUserLeagues = async () => {
  const leagues = await fetch("http://127.0.0.1:5200/leagues/list");
  const leaguesJson = await leagues.json();
  return leaguesJson;
};

export const mountList = async () => {
  const listElement = document.querySelector(".leaguesList");
  const leagueNameInfoElement = document.querySelector(".warning .leagueName");

  const leagueList = await getUserLeagues();
  if (!leagueList) return;
  leagueList.forEach((item) => {
    const liElement = document.createElement("li");
    const spanElement = document.createElement("span");

    liElement.classList.add("leagueItem");
    spanElement.classList.add("leagueName");
    spanElement.innerText = item.name;

    liElement.appendChild(spanElement);

    if (
      leagueNameInfoElement.innerText.length === 0 ||
      (leagueNameInfoElement.innerText.length > 0 &&
        leagueNameInfoElement.innerText !== item.name)
    ) {
      const joinLeagueButton = document.createElement("button");

      joinLeagueButton.innerText = "Jogar";

      liElement.appendChild(joinLeagueButton);
    } else {
      liElement.classList.add("currentLeague");
    }

    listElement.appendChild(liElement);
  });
};

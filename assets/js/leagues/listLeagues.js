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

      joinLeagueButton.innerHTML = '<svg fill="#263355" width=20 height=20 xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><path d="M192 64C86 64 0 150 0 256S86 448 192 448H448c106 0 192-86 192-192s-86-192-192-192H192zM496 168a40 40 0 1 1 0 80 40 40 0 1 1 0-80zM392 304a40 40 0 1 1 80 0 40 40 0 1 1 -80 0zM168 200c0-13.3 10.7-24 24-24s24 10.7 24 24v32h32c13.3 0 24 10.7 24 24s-10.7 24-24 24H216v32c0 13.3-10.7 24-24 24s-24-10.7-24-24V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h32V200z" /></svg> Jogar';
      joinLeagueButton.classList.add('leaguePlayButton')

      liElement.appendChild(joinLeagueButton);
    } else {
      liElement.classList.add("currentLeague");
    }

    listElement.appendChild(liElement);
  });
};

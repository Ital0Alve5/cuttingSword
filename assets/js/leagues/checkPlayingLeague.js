export const checkPlayingLeague = async () => {
  const leagueInfoElement = document.querySelector(".leagueInfo");
  const leagueNameInfoElement = document.querySelector(".warning .leagueName");

  const checkedLeagueInfo = await fetch("http://127.0.0.1:5200/leagues/info");

  const checkedLeagueInfoJson = await checkedLeagueInfo.json();

  if (!checkedLeagueInfoJson.leagueId) {
    leagueInfoElement.classList.remove("leaguePlaying");
  } else {
    leagueNameInfoElement.innerText = checkedLeagueInfoJson.leagueName;
    leagueInfoElement.classList.add("leaguePlaying");
  }
};

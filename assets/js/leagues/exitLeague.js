export const handleExitLeague = () => {
  const exitLeagueButton = document.querySelector(".playCasual");

  exitLeagueButton.addEventListener("click", async (e) => {
    await fetch("http://127.0.0.1:5200/leagues/exit");

    location.replace("/leagues");
  });
};

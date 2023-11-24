export const handleJoingLeague = () => {
  const playLeagueButton = Array.from(
    document.querySelectorAll(".leaguePlayButton")
  );

  playLeagueButton.forEach((button) => {
    button.addEventListener("click", async (e) => {
      const leagueName = e.currentTarget.parentElement.firstChild.innerText;

      const joinedLeague = await fetch("http://127.0.0.1:5200/leagues/join", {
        method: "POST",
        body: JSON.stringify({
          leagueName: leagueName,
        }),
      });

      const joinedLeagueJson = await joinedLeague.json();

      if (!joinedLeagueJson.error) {
        location.replace("/leagues");
      }
    });
  });
};

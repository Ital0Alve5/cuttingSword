(async function () {
  const getLeagueTotalRanking = async () => {
    const ranking = await fetch("http://127.0.0.1:5200/ranking/league/total");
    const rankingJson = await ranking.json();
    return rankingJson;
  };

  getLeagueWeekRanking = async () => {
    const ranking = await fetch("http://127.0.0.1:5200/ranking/league/week");
    const rankingJson = await ranking.json();
    return rankingJson;
  };

  const setPageMessage = (condition, message) => {
    const leagueTablesElement = document.querySelector(".leagueTables");
    const warning = document.querySelector(".warning");

    if (condition) {
      leagueTablesElement.style.display = "none";
      warning.style.display = "flex";
      warning.innerText = message;
      return false;
    } else {
      leagueTablesElement.style.display = "flex";
      warning.style.display = "none";
      warning.innerText = "";
      return true;
    }
  };

  const checkPlayingLeague = async () => {
    const checkedLeagueInfo = await fetch("http://127.0.0.1:5200/leagues/info");

    const checkedLeagueInfoJson = await checkedLeagueInfo.json();

    return setPageMessage(
      !checkedLeagueInfoJson.leagueId,
      "Você não está jogando por nenhuma liga."
    );
  };

  const mountLeagueTables = async () => {
    const totalRankingTable = document.querySelector(
      ".totalRankingContainer tbody"
    );
    const weekRankingTable = document.querySelector(
      ".weekRankingContainer tbody"
    );

    const leagueTotalRanking = await getLeagueTotalRanking();
    const leagueWeekRanking = await getLeagueWeekRanking();

    if (
      !setPageMessage(
        leagueTotalRanking.length === 0,
        "Você ainda não jogou pela liga."
      )
    )
      return;

    leagueTotalRanking.forEach((row) => {
      const tr = document.createElement("tr");

      if (row.userName === userNameText) tr.style.background = "#d5f5e3";

      Object.keys(row).forEach((cell) => {
        const td = document.createElement("td");
        td.innerText = row[cell];
        tr.appendChild(td);
      });
      totalRankingTable.appendChild(tr);
    });

    leagueWeekRanking.forEach((row) => {
      const tr = document.createElement("tr");

      if (row.userName === userNameText) tr.style.background = "#d5f5e3";

      Object.keys(row).forEach((cell) => {
        const td = document.createElement("td");
        td.innerText = row[cell];
        tr.appendChild(td);
      });
      weekRankingTable.appendChild(tr);
    });
  };

  if (await checkPlayingLeague()) await mountLeagueTables();
})();

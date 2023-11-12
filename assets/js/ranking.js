(async function () {
  const leagueId = await getLeagueId();

  async function getCasualTotalHistory() {
    const ranking = await fetch("http://127.0.0.1:5200/ranking/total/0");
    const rankingJson = await ranking.json();
    return rankingJson;
  }

  async function getCasualWeekHistory() {
    const ranking = await fetch("http://127.0.0.1:5200/ranking/week/0");
    const rankingJson = await ranking.json();
    return rankingJson;
  }

  async function getLeagueTotalHistory() {
    const ranking = await fetch(
      `http://127.0.0.1:5200/ranking/total/${leagueId}`
    );
    const rankingJson = await ranking.json();
    return rankingJson;
  }

  async function getLeagueWeekHistory() {
    const ranking = await fetch(
      `http://127.0.0.1:5200/ranking/week/${leagueId}`
    );
    const rankingJson = await ranking.json();
    return rankingJson;
  }

  async function mountCasualTables() {
    const totalRankingTable = document.querySelector(
      ".totalRankingContainer tbody"
    );
    const weekRankingTable = document.querySelector(
      ".weekRankingContainer tbody"
    );

    const casualTotalHistory = await getCasualTotalHistory();
    const casualWeekHistory = await getCasualWeekHistory();

    casualTotalHistory.forEach((row) => {
      const tr = document.createElement("tr");
      Object.keys(row).forEach((cell) => {
        const td = document.createElement("td");
        td.innerText = row[cell];
        tr.appendChild(td);
      });
      totalRankingTable.appendChild(tr);
    });

    casualWeekHistory.forEach((row) => {
      const tr = document.createElement("tr");
      Object.keys(row).forEach((cell) => {
        const td = document.createElement("td");
        td.innerText = row[cell];
        tr.appendChild(td);
      });
      weekRankingTable.appendChild(tr);
    });
  }

  async function mountLeagueTables() {
    const totalRankingTable = document.querySelector(
      ".totalRankingContainer tbody"
    );
    const weekRankingTable = document.querySelector(
      ".weekRankingContainer tbody"
    );

    const leagueTotalHistory = await getLeagueTotalHistory();
    const leagueWeekHistory = await getLeagueWeekHistory();

    leagueTotalHistory.forEach((row) => {
      const tr = document.createElement("tr");
      Object.keys(row).forEach((cell) => {
        const td = document.createElement("td");
        td.innerText = row[cell];
        tr.appendChild(td);
      });
      totalRankingTable.appendChild(tr);
    });

    leagueWeekHistory.forEach((row) => {
      const tr = document.createElement("tr");
      Object.keys(row).forEach((cell) => {
        const td = document.createElement("td");
        td.innerText = row[cell];
        tr.appendChild(td);
      });
      weekRankingTable.appendChild(tr);
    });
  }

  async function mountTables() {
    const casual = leagueId === "ranking" ? true : false;
    if (casual) await mountCasualTables();
    else {
      document.querySelector("h1").innerText = `Ranking da liga ${
        (await getLeagueName()).leagueName
      }`;
      await mountLeagueTables();
    }
  }

  async function getLeagueName() {
    const league = await fetch(`http://127.0.0.1:5200/league/${leagueId}`);
    const leagueJson = await league.json();
    return leagueJson;
  }

  async function getLeagueId() {
    return window.location.href.split("/").pop();
  }

  await mountTables();
})();

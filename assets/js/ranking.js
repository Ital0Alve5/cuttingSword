/**
 *
 * TODO: O id da liga está mockado. Precisa entrar na liga para ficar dinâmico
 *
 */
(async function () {
  async function getCasualTotalHistory() {
    const ranking = await fetch("http://localhost:5200/ranking/total/0");
    const rankingJson = await ranking.json();
    return rankingJson;
  }

  async function getCasualWeekHistory() {
    const ranking = await fetch("http://localhost:5200/ranking/week/0");
    const rankingJson = await ranking.json();
    return rankingJson;
  }

  async function getLeagueTotalHistory() {
    const ranking = await fetch("http://localhost:5200/ranking/total/1");
    const rankingJson = await ranking.json();
    return rankingJson;
  }

  async function getLeagueWeekHistory() {
    const ranking = await fetch("http://localhost:5200/ranking/week/1");
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
    console.log(await getLeagueTotalHistory());
    console.log(await getLeagueWeekHistory());

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
    const casual = true;
    if (casual) await mountCasualTables();
    else {
      const leagueName = "teste";
      document.querySelector("h1").innerText = `Ranking da liga ${leagueName}`;
      await mountLeagueTables();
    }
  }

  await mountTables();
})();

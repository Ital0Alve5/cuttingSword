(async function () {
  async function getCasualTotalRanking() {
    const ranking = await fetch("http://127.0.0.1:5200/ranking/casual/total");
    const rankingJson = await ranking.json();
    return rankingJson;
  }

  async function getCasualWeekRanking() {
    const ranking = await fetch("http://127.0.0.1:5200/ranking/casual/week");
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

    const casualTotalRanking = await getCasualTotalRanking();
    const casualWeekRanking = await getCasualWeekRanking();

    casualTotalRanking.forEach((row) => {
      const tr = document.createElement("tr");

      Object.keys(row).forEach((cell) => {
        const td = document.createElement("td");
        td.innerText = row[cell];
        tr.appendChild(td);
      });
      totalRankingTable.appendChild(tr);
    });

    casualWeekRanking.forEach((row) => {
      const tr = document.createElement("tr");
      Object.keys(row).forEach((cell) => {
        const td = document.createElement("td");
        td.innerText = row[cell];
        tr.appendChild(td);
      });
      weekRankingTable.appendChild(tr);
    });
  }

  await mountCasualTables();
})();

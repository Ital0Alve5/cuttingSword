(async function () {
  async function getCasualTotalRanking() {
    const ranking = await fetch("http://127.0.0.1:5200/ranking/casual/total");
    const rankingJson = await ranking.json();
    return rankingJson;
  }

  const getCasualWeekRanking = async () => {
    const ranking = await fetch("http://127.0.0.1:5200/ranking/casual/week");
    const rankingJson = await ranking.json();
    return rankingJson;
  };

  const mountCasualTables = async () => {
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

      if (row.userName === userNameText) tr.style.background = "#d5f5e3";

      Object.keys(row).forEach((cell) => {
        const td = document.createElement("td");
        td.innerText = row[cell];
        tr.appendChild(td);
      });
      totalRankingTable.appendChild(tr);
    });

    casualWeekRanking.forEach((row) => {
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

  await mountCasualTables();
})();

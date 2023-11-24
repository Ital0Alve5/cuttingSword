(async function () {
  const getUserHistory = async () => {
    const userHistory = await fetch("http://127.0.0.1:5200/user/history");
    const userHistoryJson = await userHistory.json();
    return userHistoryJson;
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

  const mountTable = async () => {
    const tableBody = document.querySelector("tbody");
    const historyData = await getUserHistory();

    if (
      !setPageMessage(
        historyData.length === 0,
        "Você ainda não tem histórico no jogo. Jogue uma partida ranqueada!"
      )
    )
      return;

    historyData.forEach((row) => {
      const tr = document.createElement("tr");
      Object.keys(row).forEach((cell) => {
        const td = document.createElement("td");
        if (cell === "leagueName" && row[cell] === null) row[cell] = "Casual";
        else if (cell === "victory")
          row[cell] = row[cell] === 1 ? "Vitória" : "Derrota";
        else if (cell === "level" && row[cell] === null) row[cell] = "-";

        td.innerText = row[cell];
        tr.appendChild(td);
      });
      tableBody.appendChild(tr);
    });
  };

  await mountTable();
})();

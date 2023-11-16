(async function () {
  async function getUserHistory() {
    const userHistory = await fetch("http://127.0.0.1:5200/user/history");
    const userHistoryJson = await userHistory.json();
    return userHistoryJson;
  }

  async function mountTable() {
    const tableBody = document.querySelector("tbody");
    const historyData = await getUserHistory();

    console.log(historyData);
    if (!historyData) return;

    historyData.forEach((row) => {
      const tr = document.createElement("tr");
      Object.keys(row).forEach((cell) => {
        const td = document.createElement("td");
        if (cell === "leagueName" && row[cell] === null) row[cell] = "casual";
        else if (cell === "victory")
          row[cell] = row[cell] === 1 ? "Vitória" : "Derrota";
        else if (cell === "level" && row[cell] === null) row[cell] = "-";

        td.innerText = row[cell];
        tr.appendChild(td);
      });
      tableBody.appendChild(tr);
    });
  }

  await mountTable();
})();

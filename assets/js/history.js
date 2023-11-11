/**
 * 
 * TODO: O id do player está mockado. Precisa do login para ficar dinâmico
 * 
 */
(async function () {
  async function getUserHistory() {
    const userHistory = await fetch("http://localhost:5200/history/1"); 
    const userHistoryJson = await userHistory.json();
    return userHistoryJson;
  }

  async function mountTable() {
    const tableBody = document.querySelector("tbody");
    const historyData = await getUserHistory();
    console.log(historyData);
    historyData.forEach((row) => {
      const tr = document.createElement("tr");
      Object.keys(row).forEach((cell) => {
        const td = document.createElement("td");
        if (cell === "leagueName" && row[cell] === null) row[cell] = "casual";
        else if (cell === "victory")
          row[cell] = row[cell] === 1 ? "sim" : "não";
        td.innerText = row[cell];
        tr.appendChild(td);
      });
      tableBody.appendChild(tr);
    });
  }

  await mountTable();
})();

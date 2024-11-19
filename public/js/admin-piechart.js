google.charts.load("current", { packages: ["corechart"] });
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    fetch("/admin/setores-empresas")
        .then((response) => response.json())
        .then((data) => {
            const chartData = [["Setor", "Número de Empresas"]];
            data.forEach((item) => {
                chartData.push([item.nomeAreaAtuacao, item.totalEmpresas]);
            });

            const dataTable = google.visualization.arrayToDataTable(chartData);

            const options = {
                legend: "none",
                colors: [
                    "#FFE066",
                    "#FFB000",
                    "#FF7700",
                    "#FF5500",
                    "#E60000",
                    "#CC3300",
                    "#FF4000",
                    "#FF5533",
                    "#FF7020",
                    "#FF9933",
                    "#FFB366",
                    "#FFD6A0",
                    "#FFCC66",
                    "#FF9966",
                    "#FF7040",
                    "#E65C00",
                    "#FF8000",
                    "#FF9500",
                    "#FF6600",
                    "#FF3300",
                    "#E53935",
                    "#FF5722",
                    "#FF6F43",
                    "#FF8565",
                    "#FFA091",
                    "#FF8A00",
                    "#FF9300",
                    "#FF7400",
                    "#FF4800",
                    "#E50000",
                    "#B71C1C",
                    "#9C1F4D",
                    "#7C1A8A",
                    "#6B1D92",
                    "#571486",
                    "#460C7B",
                    "#5B37A0",
                    "#4C2596",
                    "#303F9F",
                    "#1E88E5",
                    "#00ACC1",
                    "#008975",
                    "#2E7D32",
                    "#388E3C",
                    "#689F38",
                    "#AFB42B",
                    "#FFEA00",
                    "#FFC107",
                    "#FF9800",
                    "#FF5722",
                    "#E53935",
                    "#C2185B",
                    "#880E4F",
                    "#5E35B1",
                    "#7B1FA2",
                    "#FF1F00",
                    "#FF3300",
                    "#FF5300",
                    "#FF6F00",
                    "#FF8A00",
                    "#FF9900",
                    "#FFB800",
                    "#FFCC00",
                    "#FFBB00",
                    "#FF9A00",
                    "#FF6C00",
                ],
            };

            const chart = new google.visualization.PieChart(
                document.getElementById("piechart_values")
            );

            chart.draw(dataTable, options);
        })
        .catch((error) => {
            console.error("Erro ao buscar dados da API:", error);
        });
}

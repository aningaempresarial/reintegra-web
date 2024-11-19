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
                title: "Distribuição de Empresas por Setor",
                titleTextStyle: {
                    fontSize: 14,
                    bold: true,
                    color: '#333',
                    alignment: 'center',
                },
                height: '100%',
                width: '100%',
                legend: 'none',
                colors: [
                    "#FFEB99",
                    "#FFDC73",
                    "#FFCC66",
                    "#FFB84D",
                    "#FF9F33",
                    "#FF7F00",
                    "#FF6600",
                    "#FF5500",
                    "#FF4C00",
                    "#FF3C00",
                    "#FF5722",
                    "#FF4F00",
                    "#FF4433",
                    "#FF6F33",
                    "#FF7F66",
                    "#FF8F99",
                    "#FFB3A6",
                    "#FFCC99",
                    "#FF9966",
                    "#FF8833",
                    "#F57F17",
                    "#FF8C00",
                    "#FF9D00",
                    "#FF6A00",
                    "#FF4500",
                    "#F44336",
                    "#FF5722",
                    "#FF7043",
                    "#FF8A65",
                    "#FFAB91",
                    "#FF9800",
                    "#FF9E00",
                    "#FF8200",
                    "#FF5E00",
                    "#FF4500",
                    "#D32F2F",
                    "#C2185B",
                    "#9C27B0",
                    "#8E24AA",
                    "#7B1FA2",
                    "#6A1B9A",
                    "#5E35B1",
                    "#512DA8",
                    "#3F51B5",
                    "#2196F3",
                    "#00BCD4",
                    "#009688",
                    "#388E3C",
                    "#4CAF50",
                    "#8BC34A",
                    "#CDDC39",
                    "#FFEB3B",
                    "#FFC107",
                    "#FF9800",
                    "#FF5722",
                    "#F44336",
                    "#D32F2F",
                    "#C2185B",
                    "#9C27B0",
                    "#7B1FA2",
                    "#FF3D00",
                    "#FF5100",
                    "#FF6F00",
                    "#FF8A00",
                    "#FF9E00",
                    "#FFB300",
                    "#FFCC00",
                    "#FFB500",
                    "#FF9400",
                    "#FF7B00",
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

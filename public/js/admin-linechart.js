google.charts.load("current", { packages: ["corechart"] });
google.charts.setOnLoadCallback(fetchDataAndDrawChart);

async function fetchDataAndDrawChart() {
    try {
        const response = await fetch("/admin/usuarios-mensais");
        const jsonData = await response.json();

        const chartData = [["Mês", "Empresas", "Ex-detentos"]];
        jsonData.data.forEach((item) => {
            chartData.push([
                item.mes, 
                Number(item.empresas), 
                Number(item.exDetentos)
            ]);
        });

        const data = google.visualization.arrayToDataTable(chartData);

        const options = {
            curveType: "function",
            legend: { position: "bottom" },
            hAxis: { title: "Mês" },
            vAxis: { title: "Quantidade de cadastros" },
            colors: ["#FF6600",
                    "#C2185B"]
        };

        const chart = new google.visualization.LineChart(
            document.getElementById("linechart_values")
        );
        chart.draw(data, options);
    } catch (error) {
        console.error("Erro ao carregar os dados da API:", error);
    }
}

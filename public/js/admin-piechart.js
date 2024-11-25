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
                    "#800080", // Laranja forte
                    "#FF6347", // Vermelho tomate
                    "#FF1493", // Coral
                    "#FF8C00", // Laranja escuro
                    "#FFD700", // Dourado
                    "#1E90FF", // Amarelo vibrante
                    "#ADFF2F", // Verde lima
                    "#32CD32", // Verde limão
                    "#00FA9A", // Verde primavera
                    "#20B2AA", // Verde água escuro
                    "#1E90FF", // Azul Dodger
                    "#4169E1", // Azul royal
                    "#6A5ACD", // Azul ardósia médio
                    "#800080", // Roxo
                    "#C71585", // Magenta médio
                    "#FF1493", // Rosa profundo
                    "#FF69B4", // Rosa choque
                    "#FFB6C1", // Rosa claro
                    "#FFA07A", // Salmão claro
                    "#DC143C", // Carmesim
                    "#B22222", // Tijolo
                    "#8B0000", // Vermelho escuro
                    "#DAA520", // Ouro velho
                    "#CD5C5C", // Rosa indiano
                    "#8FBC8F", // Verde claro suave
                    "#4682B4", // Azul aço
                    "#7FFFD4", // Água-marinha
                    "#40E0D0", // Turquesa
                    "#00CED1", // Turquesa escuro
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

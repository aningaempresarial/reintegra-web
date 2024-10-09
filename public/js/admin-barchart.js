google.charts.load("current", { packages: ["corechart", "bar"] });
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ["Mês", "Taxa de emprego", { role: "style" }, { role: 'tooltip', p: { html: true } }],
    ["Jan", 100, "#ffbaba", "<b>Janeiro:</b> 100 empregos"],
    ["Fev", 80, "#ffdfba", "<b>Fevereiro:</b> 80 empregos"],
    ["Mar", 70, "#ffffba", "<b>Março:</b> 70 empregos"],
    ["Abr", 60, "#d0ffba", "<b>Abril:</b> 60 empregos"],
    ["Mai", 90, "#bafffc", "<b>Maio:</b> 90 empregos"],
    ["Jun", 50, "#bae2ff", "<b>Junho:</b> 50 empregos"],
    ["Jul", 70, "#babfff", "<b>Julho:</b> 70 empregos"],
    ["Ago", 80, "#e6baff", "<b>Agosto:</b> 80 empregos"],
    ["Set", 60, "#ffbaf9", "<b>Setembro:</b> 60 empregos"],
    ["Out", 90, "#ffbaba", "<b>Outubro:</b> 90 empregos"],
    ["Nov", 70, "#ffdfba", "<b>Novembro:</b> 70 empregos"],
    ["Dez", 80, "#ffffba", "<b>Dezembro:</b> 80 empregos"],
  ]);

  var options = {
    title: "Taxa de emprego por mês em 2024",
    legend: { position: "none" },
    height: '100%',
    width: '100%',
    chartArea: { width: '80%', height: '70%' },
    tooltip: { isHtml: true }
  };

  var chart = new google.visualization.ColumnChart(document.getElementById("barchart_values"));
  chart.draw(data, options);

  var resizeTimeout;
  window.addEventListener('resize', function() {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(function() {
      chart.draw(data, options);
    }, 200);
  });
}

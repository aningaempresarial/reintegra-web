  google.charts.load('current', { packages: ['corechart', 'bar'] });

  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    fetch('/admin/vagas-stats')
      .then(response => response.json())
      .then(stats => {
        const data = google.visualization.arrayToDataTable([
          ["Mês", "Total de vagas", { role: "style" }, { role: 'tooltip', p: { html: true } }],
          ...stats.map(row => [
            `${row.mes} ${row.ano}`,
            row.totalVagas,
            '#ffdad5',
            `<b>${row.mes} ${row.ano}:</b> ${row.totalVagas} vagas`
          ])
        ]);

        var options = {
          title: "Total de vagas por mês",
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
      })
      .catch(error => console.error('Erro ao buscar os dados:', error));
  }

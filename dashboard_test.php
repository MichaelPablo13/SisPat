<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Visualization API and the controls package.
      google.charts.load('current', {'packages':['corechart', 'controls']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawDashboard);

      // Callback that creates and populates a data table,
      // instantiates a dashboard, a range slider and a pie chart,
      // passes in the data and draws it.
      function drawDashboard() {

        // Get Data from peripheral table (ECHO)
        <?php include "dashboard_getData.php"; ?>        
        // Create our data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'descricao');
        data.addColumn('number', 'Quantidade Periferico');
        data.addRows(<?php echo $json_pie_chart_data; ?>);
        
        // Get Data from peripheral table (ECHO)
        <?php include "dashboard_getData_agendar.php"; ?>     
        var data_bar_chart = new google.visualization.DataTable();
        data_bar_chart.addColumn('string', 'Status');
        data_bar_chart.addColumn('number', 'Quantidade Status');
        data_bar_chart.addRows(<?php echo $json_bar_chart_data; ?>);
    
        // Periferical Dashboard
        // Create a peripheral dashboard.
        var dashboard = new google.visualization.Dashboard(
            document.getElementById('dashboard_div'));

        // Create a range slider, passing some options
        var donutRangeSlider = new google.visualization.ControlWrapper({
          'controlType': 'NumberRangeFilter',
          'containerId': 'filter_div',
          'options': {
            'filterColumnLabel': 'Quantidade Periferico'
          }
        });

        // Create a pie chart, passing some options
        var pieChart = new google.visualization.ChartWrapper({
          'chartType': 'PieChart',
          'containerId': 'chart_div',
          'options': {
            'width': 500,
            'height': 500,
            'pieSliceText': 'value',
            'legend': 'right'
          }
        });

        var table = new google.visualization.ChartWrapper({
          'chartType': 'Table',
          'containerId': 'table_div',
          'options': {
            'width': '900px'
            }
        });

        // Establish dependencies, declaring that 'filter' drives 'pieChart',
        // so that the pie chart will only display entries that are let through
        // given the chosen slider range.
        dashboard.bind([donutRangeSlider ], [pieChart, table]);

        // Draw the dashboard.
        dashboard.draw(data);
        
        // Scheduling Computer Status
        // Create a dashboard.
        var dashboard_bar_chart = new google.visualization.Dashboard(
            document.getElementById('dashboard_barchart_div'));

        // Create a range slider, passing some options
        var donutRangeSlider_bar_chart = new google.visualization.ControlWrapper({
          'controlType': 'NumberRangeFilter',
          'containerId': 'barchart_filter_div',
          'options': {
            'filterColumnLabel': 'Quantidade Status'
          }
        });

        // Create a pie chart, passing some options
        var ColumnChart = new google.visualization.ChartWrapper({
          'chartType': 'ColumnChart',
          'containerId': 'barchart_chart_div',
          'options': {
            'width': 900,
            'height': 500,
            'pieSliceText': 'value',
            'legend': 'right'
          }
        });

        var barchart_table = new google.visualization.ChartWrapper({
          'chartType': 'Table',
          'containerId': 'barchart_table_div',
          'options': {
            'width': '900px'
            }
        });

        // Establish dependencies, declaring that 'filter' drives 'pieChart',
        // so that the pie chart will only display entries that are let through
        // given the chosen slider range.
        dashboard_bar_chart.bind([donutRangeSlider_bar_chart], [ColumnChart, barchart_table]);

        // Draw the dashboard.
        dashboard_bar_chart.draw(data_bar_chart);
      }
    </script>
  </head>

  <body>
    <!--Div that will hold the dashboard-->
    <div id="dashboard_div">
      <!--Divs that will hold each control and chart-->
      <div id="filter_div"></div>
      <div id="table_div"></div>
      <div id="chart_div"></div>
    </div>
    <div id="dashboard_barchart_div">
      <!--Divs that will hold each control and chart-->
      <div id="barchart_filter_div"></div>
      <div id="barchart_table_div"></div>
      <div id="barchart_chart_div"></div>
    </div>
  </body>
</html>
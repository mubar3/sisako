google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(chart_total);
    google.charts.setOnLoadCallback(chart_jk);
    google.charts.setOnLoadCallback(chart_status);
    google.charts.setOnLoadCallback(chart_banom);
    google.charts.setOnLoadCallback(chart_jamkes);
    google.charts.setOnLoadCallback(chart_disabilitas);
    google.charts.setOnLoadCallback(chart_pekerjaan);
    google.charts.setOnLoadCallback(chart_pendapatan);
    google.charts.setOnLoadCallback(chart_penyakit);
    google.charts.setOnLoadCallback(chart_rumah);
    google.charts.setOnLoadCallback(chart_pendidikan);
    google.charts.setOnLoadCallback(chart_golongan);
    google.charts.setOnLoadCallback(chart_agama);
    google.charts.setOnLoadCallback(chart_provinsi);
    google.charts.setOnLoadCallback(chart_emoney);





    function chart_total() {
      var jsonData = $.ajax({
          url: "DashboardController/statistik_total",
          dataType: "json",
          async: false
          }).responseText;

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.AreaChart(document.getElementById('chart_total'));
      chart.draw(data);
    }

    function chart_jk() {
      var jsonData = $.ajax({
          url: "DashboardController/statistik_jk",
          dataType: "json",
          async: false
          }).responseText;

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_jk'));
      chart.draw(data);
    }

    function chart_emoney() {
      var jsonData = $.ajax({
          url: "DashboardController/statistik_emoney",
          dataType: "json",
          async: false
          }).responseText;

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_emoney'));
      chart.draw(data);
    }

    function chart_provinsi() {
      var jsonData = $.ajax({
          url: "DashboardController/statistik_provinsi",
          dataType: "json",
          async: false
          }).responseText;

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_provinsi'));
      chart.draw(data);
    }

    function chart_golongan() {
      var jsonData = $.ajax({
          url: "DashboardController/statistik_golongan",
          dataType: "json",
          async: false
          }).responseText;

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_golongan'));
      chart.draw(data);
    }

    function chart_agama() {
      var jsonData = $.ajax({
          url: "DashboardController/statistik_agama",
          dataType: "json",
          async: false
          }).responseText;

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_agama'));
      chart.draw(data);
    }


    function chart_status() {
      var jsonData = $.ajax({
          url: "DashboardController/statistik_status",
          dataType: "json",
          async: false
          }).responseText;

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_status'));
      chart.draw(data);
    }

    function chart_banom() {
      var jsonData = $.ajax({
          url: "DashboardController/statistik_banom",
          dataType: "json",
          async: false
          }).responseText;

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_banom'));
      chart.draw(data);
    }

    function chart_disabilitas() {
      var jsonData = $.ajax({
          url: "DashboardController/statistik_disabilitas",
          dataType: "json",
          async: false
          }).responseText;

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_disabilitas'));
      chart.draw(data);
    }

    function chart_jamkes() {
      var jsonData = $.ajax({
          url: "DashboardController/statistik_jamkes",
          dataType: "json",
          async: false
          }).responseText;

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_jamkes'));
      chart.draw(data);
    }

    function chart_pekerjaan() {
      var jsonData = $.ajax({
          url: "DashboardController/statistik_pekerjaan",
          dataType: "json",
          async: false
          }).responseText;

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_pekerjaan'));
      chart.draw(data);
    }

    function chart_pendapatan() {
      var jsonData = $.ajax({
          url: "DashboardController/statistik_pendapatan",
          dataType: "json",
          async: false
          }).responseText;

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_pendapatan'));
      chart.draw(data);
    }

    function chart_pendidikan() {
      var jsonData = $.ajax({
          url: "DashboardController/statistik_pendidikan",
          dataType: "json",
          async: false
          }).responseText;

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_pendidikan'));
      chart.draw(data);
    }

    function chart_penyakit() {
      var jsonData = $.ajax({
          url: "DashboardController/statistik_penyakit",
          dataType: "json",
          async: false
          }).responseText;

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_penyakit'));
      chart.draw(data);
    }

    function chart_rumah() {
      var jsonData = $.ajax({
          url: "DashboardController/statistik_rumah",
          dataType: "json",
          async: false
          }).responseText;

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_rumah'));
      chart.draw(data);
    }

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Example
var ctx = document.getElementById("myChartUsia");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["0-4 Tahun", "5-12 Tahun", "22-30 Tahun", "31-50 Tahun", "50 Tahun"],
    datasets: [{
      data: [10, 30, 25, 50, 39],
      backgroundColor: ['#7FF2DB', '#5AEED1', '#41D4B8', '#32A58F', '#247666'],
    }],
  },
});

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Example
var ctx = document.getElementById("myChartRRuangan");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["VIP", "ANAK", "BEDAH",],
    datasets: [{
      data: [10, 30, 25],
      backgroundColor: ['#5AEED1', '#41D4B8', '#32A58F'],
    }],
  },
});

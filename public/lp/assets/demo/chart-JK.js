// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("myChartJK");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Laki-Laki", "Perempuan"],
    datasets: [{
      label: "Revenue",
      backgroundColor: "rgba(2,117,216,1)",
      backgroundColor: ["#5AEED1", "#32A58F"],
      borderColor: "rgba(2,117,216,1)",
      data: [60, 40],
    }],
  },
});

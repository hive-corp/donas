
// Pie Chart Example
var ctx = document.getElementById("myCateChart");
var myCateChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Artesanal", "Decoração", "Doces", "Salgados", "Cabeleireira"],
    datasets: [{
      data: [55, 55, 55, 55, 55],
      backgroundColor: ['#b10783', '#c5269c', '#d846b4', '#ec65cd', '#ff84e5'],
      hoverBackgroundColor: ['#6f1a60'],
      hoverBorderColor: "#d846b4",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

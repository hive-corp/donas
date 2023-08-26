

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Atendimento", "Demora", "Entrega", "Pedido errado", "Pedido mal feito"],
    datasets: [{
      data: [55, 55, 55, 55, 55],
      backgroundColor: ['#971881', '#CB6CE6', '#D11174', '#971881', '#420C33'],
      hoverBackgroundColor: ['#9265f5'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
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



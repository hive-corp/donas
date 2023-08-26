const data1 = [40, 10, 27, 15, 32, 44, 49, 55, 10, 74, 16, 12]
const data2 = [20, 30, 54, 10, 32, 42, 49, 90, 10, 24, 36, 12]

new Chart(document.querySelector('#tabelas'), {
    type: 'bar',
    data: {
        labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago'],
        datasets: [{
            label: 'Dona Gratís',
            data: data1,
            backgroundColor: '#971881',
            borderRadius: 4,
            color: 'rgb(0,0,0)'
        },
{
            label: 'Dona Premium',
            data: data2,
            backgroundColor: '#D11174',
            borderRadius: 4,
            color: 'rgb(0,0,0)'
        }]

    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgb(0,0,0,0.05)'
                },
                ticks: {
                    font: {
                        size: 12,
                    },
                }
            },
            x: {
                grid: {
                    display: false
                },
                ticks: {
                    font: {
                        size: 12,
                    },
                }
            }
        },
        aspectRatio: 4 / 3,
        plugins: {
            legend: {
                labels: {
                    font: {
                        size: 12,
                    },
                }
            },

        }
    }
})
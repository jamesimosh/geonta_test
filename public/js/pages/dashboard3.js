//[Dashboard Javascript]

//Project:	Fox Admin - Responsive Admin Template
//Primary use:   Used only for the main dashboard (index.html)


$(function () {

  'use strict';

   var options = {
            chart: {
                height: 300,
                type: 'area',
            },
            dataLabels: {
                enabled: false
            },
      legend: {
          position: 'top',
        horizontalAlign: 'left',
        },
      colors:['#fbae1c', '#00c292'],
            stroke: {
                curve: 'smooth'
            },
            series: [{
                name: 'EUR',
                data: [31, 40, 50, 40, 42, 78, 85]
            }, {
                name: 'USD',
                data: [11, 32, 45, 32, 34, 52, 41]
            }],

            xaxis: {
                type: 'datetime',
                categories: ["2019-09-19T00:00:00", "2019-09-19T01:30:00", "2019-09-19T02:30:00", "2019-09-19T03:30:00", "2019-09-19T04:30:00", "2019-09-19T05:30:00", "2019-09-19T06:30:00"],                
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#bitcoin-value"),
            options
        );

        chart.render();

  
	
	
	// Bar chart
  new Chart(document.getElementById("bar-chart1"), {
    type: 'bar',
    data: {
      labels: ["Accepted 75%", "Rejected 30%", "Panding 50%"],
      datasets: [
      {
        label: "Dataset",
        backgroundColor: ["#22302A", "#DC6962","#F09A72"],
        data: [85,45,58,0,15]
      }
      ]
    },

    options: {
      legend: { display: false },
      title: {
      display: false,
      text: 'My dataset'
      }
    }
  });



     
  
}); // End of use strict




                


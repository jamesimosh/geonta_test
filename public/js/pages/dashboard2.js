//[Dashboard Javascript]

//Project:	Fox Admin - Responsive Admin Template
//Primary use:   Used only for the main dashboard (index.html)


$(function () {

  'use strict';
	
	
	var options = {
        series: [{
            name: "Profit",
            data: [0, 20,40, 60, 70, 80, 90, 110, 125]
        }],
        chart: {
			foreColor:"#bac0c7",
          height: 200,
          type: 'area',
          zoom: {
            enabled: false
          }
        },
		colors:['#0052cc'],
        dataLabels: {
          enabled: false,
        },
        stroke: {
          	show: true,
			curve: 'smooth',
			lineCap: 'butt',
			colors: undefined,
			width: 2,
			dashArray: 0, 
        },		
		markers: {
			size: 2,
			colors: '#ea9715',
			strokeColors: '#ffffff',
			strokeWidth: 2,
			strokeOpacity: 0.9,
			strokeDashArray: 0,
			fillOpacity: 1,
			discrete: [],
			shape: "circle",
			radius: 5,
			offsetX: 0,
			offsetY: 0,
			onClick: undefined,
			onDblClick: undefined,
			hover: {
			  size: undefined,
			  sizeOffset: 3
			}
		},	
        grid: {
			borderColor: '#f7f7f7', 
          row: {
            colors: ['transparent'], // takes an array which will be repeated on columns
            opacity: 0
          },			
		  yaxis: {
			lines: {
			  show: true,
			},
		  },
        },
		fill: {
			type: "gradient",
			gradient: {
			  shadeIntensity: 1,
			  opacityFrom: 0.01,
			  opacityTo: 1,
			  stops: [0, 90, 100]
			}
		  },
        xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
		  labels: {
			show: true,        
          },
          axisBorder: {
            show: true
          },
          axisTicks: {
            show: true
          },
          tooltip: {
            enabled: true,        
          },
        },
        yaxis: {
          labels: {
            show: true,
            formatter: function (val) {
              return val ;
            }
          }
        
        },
      };
      var chart = new ApexCharts(document.querySelector("#charts_widget_2_chart"), options);
      chart.render();



        var options = {
          series: [
          {
            data: [
              {
                x: 'Meeting Team',
                y: [
                  new Date('2022-03-02').getTime(),
                  new Date('2022-03-04').getTime()
                ],
                fillColor: '#7a7a7a'
              },
              {
                x: 'Lunch',
                y: [
                  new Date('2022-03-04').getTime(),
                  new Date('2022-03-08').getTime()
                ],
                fillColor: '#1C2C49'
              },
              {
                x: 'Research',
                y: [
                  new Date('2022-03-08').getTime(),
                  new Date('2022-03-12').getTime()
                ],
                fillColor: '#1678F2'
              },
              {
                x: 'Report Time',
                y: [
                  new Date('2022-03-12').getTime(),
                  new Date('2022-03-16').getTime()
                ],
                fillColor: '#80A6D6'
              }
            ]
          }
        ],
          chart: {
          height: 386,
          type: 'rangeBar'
        },
        plotOptions: {
          bar: {
            horizontal: true
          }
        },
        xaxis: {
          type: 'datetime'
        },
        yaxis: {
          labels: {
            show: false,
            }
          }
        
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
      
      
	
	
}); // End of use strict

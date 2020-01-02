
var host;
var chart;
var hostPath;
var protocol;

$(document).ready(function(){

    hostPath = window.location.host+"/"
    protocol = window.location.protocol+"//"
    host = protocol+hostPath+"api/dashboard/summary/data";
    console.log("loading here");
      $.ajax({url: host,
        success: function(result){
                $("#yearscount").html(result.yearscount);
                $("#userscount").html(result.usersCount);
                $("#eknscount").html(result.eknsCount);
                buildChart(result.active_year,'chart_plot_02');
                },
        error: function(error){
            console.log(error);
        }
    });

  });

  function buildChart(params,id) {
      var currentYear = params;
      var yearname = currentYear.name
    var ctx = document.getElementById(id).getContext('2d');
    var ekns = currentYear.ekns;
    var chartlabels = [];
    var chartdata = [];
    ekns.forEach(ekn => {
        chartlabels.push(ekn.description)
        chartdata.push(ekn.participants_count)

    });
    chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: chartlabels,
            datasets: [{
                label: yearname+' participants',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: chartdata
            }]
        },

        // Configuration options go here
        options: {}
    });
  }

  function changeChartType(params) {
      chart.type = params;
      chart.update();
      console.log(chart.update());


  }

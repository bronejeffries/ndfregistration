
function loadYearSummary(id,canvasId) {

    $("#frame_loader").css('display',"")
    var host = "http://localhost:8000/api/activeyear/"+id+"/data";
    console.log(host);
        $.ajax({url: host,
          success: function(result){
                  buildChart(result.active_year,canvasId);
                  $("#frame_loader").hide()
                  },
          error: function(error){
              console.log(error);
          }
      });

  }

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
        // console.log(ekn.description);
    });
   var chart = new Chart(ctx, {
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

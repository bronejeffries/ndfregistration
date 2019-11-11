// import { create } from "domain";

var x_panel;
var res_message;
var prRef;
var tId;
var res_type;

var hostPath;
var protocol;

$(document).ready(function(){

    hostPath = window.location.host+"/"
    protocol = window.location.protocol+"//"

    tId = $("#tid_holder").val();
    prRef = $("#prRef_holder").val();
    x_panel = document.getElementsByClassName("x_panel")[0];
    getSatus(tId,prRef);

});

  function getSatus(tId,prRef) {

    var host = protocol+hostPath+"api/handleresponsePment/"+tId+"/"+prRef+"/clear";

    $.ajax({url: host,
        success: function(result){
            console.log("result",result);
                res_type = result.type;
                res_message = result.message;
                if (res_type == "success") {
                    createShowUrl({"pref":prRef,"url_show_id":""});
                    showButton("btn btn-success","Finish")
                    removeLoader();
                }else{
                    showButton("btn btn-danger","Try Again")
                    removeLoader();
                }
                },
        error: function(error){
            getSatus(tId,prRef);
            console.log("error",error);
        }
    });

    function removeLoader() {
        var frameloader = document.getElementById("frame_loader");
        var classList = "alert alert-"+res_type+" alert-dismissible fade in";
        $("message_alert").addClass(classList);
        $("message_holder").html(res_message);


        if(frameloader!=null){
            console.log("loader not null");
            frameloader.style.display = "none";
            x_panel.style.display = "";

        }else{

            console.log("loader null");

        }

    }

    function createShowUrl(params) {

        var href = hostPath+"participants/"+params.prRef+"/";
        $("#pSl").attr("href",href);
        $("#psbn").css("display","");

    }

    function showButton(classList,message) {

        $("#finish").addClass(classList)
                    .html(message)
        $("#msbn").css("display","")

    }

  }

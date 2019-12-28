
function runCheck() {

    var form = document.getElementById('participantForm');
    var nameValue = document.getElementsByName("name")[0].value;
    console.log(nameValue);

    var hostPath = window.location.host+"/"
    var protocol = window.location.protocol+"//"
    var host = protocol+hostPath+"api/checkParticipant/"+nameValue+"/exists";
    var participantExists;
    $.ajax({url: host,
        success: function(result){
                    if (result.code==1) {
                        if(confirm("Participant under the names of "+nameValue+" exists!, Please confirm to continue registration or cancel and press 'Esc' to make changes.")){
                            form.submit();
                        }
                    }else{
                        console.log(nameValue);
                        form.submit();
                    }
                },
        error: function(error){
            console.log(error);
        }
    });

}



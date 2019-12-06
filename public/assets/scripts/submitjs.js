
var participant_selected = ""


Array.from(document.getElementsByClassName('j_a')).forEach(element=>{

    element.addEventListener('click',event=>{

        participant_selected = element.dataset.participant
        Array.from(document.getElementsByName('participant_selected')).forEach(e=>{
            e.value = participant_selected
        }
        )

    })

})

Array.from(document.getElementsByClassName('j')).forEach(form=>{

    form.addEventListener('submit',event=>{
            event.preventDefault()
            var thisloader = document.getElementById(form.id+"-loader");
            thisloader.style.display = ""
            $.ajax({
                data:$(form).serialize(),
                url: form.action,
                type:"POST",
                datatype:'json',
                success: function(result){
                            if (result.code==1) {

                                document.getElementById(participant_selected).getElementsByClassName('reason')[0].innerHTML=result.participant.reason;

                            }
                            thisloader.style.display="none";
                            $(".cl").click()
                        },
                error: function(error){
                    thisloader.style.display="none";
                    console.log(error);
                }
            });
            // form.submit()

    })

})


Array.from(document.getElementsByClassName('expand')).forEach(a=>{

    a.addEventListener('click',event=>{
            event.preventDefault()
            var elementToToggle = document.getElementById(a.dataset.target)
            if(a.dataset.expand=='expand'){
                elementToToggle.style.display = ""
                a.dataset.expand = "collapse"
            }else{
                elementToToggle.style.display = "none"
                a.dataset.expand = "expand"
            }
    })

})

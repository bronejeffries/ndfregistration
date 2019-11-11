$(document).ready(function() {
    var message=document.getElementById('info-mation').innerHTML;
    $('#showparticipant').DataTable( {
        dom: 'Bfrtip',
        searching:false,
        buttons: [
            {
                extend:'print',
                autoPrint:true,
                title:"",
                about:"",
                messageTop: message,
                footer:true,
                customize: function ( win ) {
                        $(win.document.body)
                            .addClass('bg-white')
                            // .prepend(
                            //     '<img src="http://localhost:8000/assets/images/large nnabagereka logo.jpg" style="position:absolute; width:1000; height:2000; top:250; left:10; right:10;" >'
                            //     )
                            .css( 'font-size', '10pt' );

                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'display', 'none' );
                        $(win.document.body).find( '.print_out' )
                        .addClass('container-fluid')
                        .css('margin-left','10%')
                        .css('margin-right','10%');
                    }
            },
            {
                extend: 'pdfHtml5',
                messageTop: "message"
            }
        ]
    } );


    $('#showparticipantTag').DataTable( {
        dom: 'Bfrtip',
        searching:false,
        buttons: [
            {
                extend:'print',
                autoPrint:true,
                title:"",
                about:"",
                messageTop: message,
                customize: function ( win ) {
                    $(win.document.body)
                        .addClass('bg-white')
                        .css( 'font-size', '10pt' );

                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'display', 'none' );
                    $(win.document.body).find( '.print_out' )
                    .addClass('container-fluid')
                    .css('margin-left','10%')
                    .css('margin-right','10%');
                }
            },
        ]
    } );

    } );


    var options = {
        background: '#FFFFFF',
        pagesplit: false
    };
    let doc = new jsPDF('p','pt','a4')
    document.getElementById('print_button').addEventListener('click',function(){
      console.log("print out function");
      doc.addHTML(document.getElementById('print_out'),0,options,function() {
          doc.save('Mystatement.pdf');
    })

    });

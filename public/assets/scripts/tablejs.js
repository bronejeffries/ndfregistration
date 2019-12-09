$(document).ready(function() {

    const makeDatatable = (table)=>{

        example_table.DataTable( {
            dom: 'Bfrtip',
            lengthMenu: [
                [ 15, 25, 50, -1 ],
                [ '15 rows', '25 rows', '50 rows', 'Show all' ]
            ],
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                'pageLength',
                {
                    extend: 'print',
                    customize: function ( win ) {
                        $(win.document.body)
                            .css( 'font-size', '8pt' )
                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'font-size', 'inherit' );
                    }
                },
            ]
        } );

    }

    var example_table = $('.example')
    if (example_table!=null) {
        makeDatatable(example_table)
    }

} );

$(document).ready(function() {

    const makeDatatable = (table)=>{

        example_table.DataTable( {
            dom: 'Bfrtip',
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10 rows', '25 rows', '50 rows', 'Show all' ]
            ],
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                'pageLength',
                'print',
            ]
        } );

    }

    var example_table = $('.example')
    if (example_table!=null) {

        makeDatatable(example_table)

    }

} );

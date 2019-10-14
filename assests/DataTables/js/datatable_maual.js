
 
$(document).ready(function() {
 
    //datatables
    var table = $('#table').DataTable({ 
        "lengthMenu": [[4,10,50],[4,10,50]],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": true, //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            url: "product/",
            type: "POST"

        },
         //Set column definition initialisation properties.
         "columnDefs": [
        { 
            "targets": [ 0 ], //first column numbering column
            "visible": true,
            //"orderable": false, //set not orderable
        },
        ],
    });

     
});




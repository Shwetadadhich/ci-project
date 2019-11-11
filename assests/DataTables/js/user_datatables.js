$(document).ready(function(){
    //alert("success");
     var table = $('#user_table').DataTable({ 
        "lengthMenu": [[5,10,50],[5,10,50]],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": true, //Initial no order.
       

        // Load data for the table's content from an Ajax source
        "ajax": {
            url: "user_list/",
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
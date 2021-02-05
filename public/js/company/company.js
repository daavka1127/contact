var dataRow = "";
var table = "";

$(document).ready(function(){
    refresh();

    $('#dtCompanies tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
            dataRow = "";
        }else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            var currow = $(this).closest('tr');
            dataRow = $('#tableNorms').DataTable().row(currow).data();
        }
    });
});


function refresh(){
    table = $('#dtCompanies').DataTable( {
        "language": {
            "lengthMenu": "_MENU_ мөрөөр харах",
            "zeroRecords": "Хайлт илэрцгүй байна",
            "info": "Нийт _PAGES_ -аас _PAGE_-р хуудас харж байна ",
            "infoEmpty": "Хайлт илэрцгүй",
            "infoFiltered": "(_MAX_ мөрөөс хайлт хийлээ)",
            "sSearch": "Хайх: ",
            "paginate": {
              "previous": "Өмнөх",
              "next": "Дараахи"
            }
        },
        "fixedColumns":   {
            "leftColumns": 1,
            "rightColumns": 1
        },
        "processing": true,
        "serverSide": true,
        "ajax":{
                 "url": $('#dtCompanies').attr('post-url'),
                 "dataType": "json",
                 "type": "POST",
                 "data":{
                      _token: $('meta[name="csrf-token"]').attr('content')
                    }
               },
        "columns": [
            { data: "id", name: "id", render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }},
            { data: "haryalalName", name: "haryalalName" },
            { data: "list", name: "list", "visible":false},
            { data: "action", name: "action" }
          ]
    });
}

function up(id){

}

function down(id){
  
}

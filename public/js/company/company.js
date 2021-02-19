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
            dataRow = $('#dtCompanies').DataTable().row(currow).data();
        }
    });
});


function refresh(){
    table = "";
    $('#dtCompanies').dataTable().fnDestroy();
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
          ],
          "order": [[ 2, "asc" ]]
    });
}

function up(id){
    $.ajax({
        type: "POST",
        url: $('#dtCompanies').attr('up-url'),
        data:{
            _token: $('meta[name="csrf-token"]').attr('content'),
            id:id
        },
        success:function(res){
            if(res.status == "success"){
                refresh();
            }
            else{
                alertify.error(res.msg);
            }
        },
        error: function(jqXhr, json, errorThrown){// this are default for ajax errors
            alertify.error("Сервертэй холбогдоход алдаа гарлаа!!! Веб мастерт хандана уу!");
        }
    });
}

function down(id){
  $.ajax({
      type: "POST",
      url: $('#dtCompanies').attr('down-url'),
      data:{
          _token: $('meta[name="csrf-token"]').attr('content'),
          id:id
      },
      success:function(res){
          if(res.status == "success"){
              refresh();
          }
          else{
              alertify.error(res.msg);
          }
      },
      error: function(jqXhr, json, errorThrown){// this are default for ajax errors
          alertify.error("Сервертэй холбогдоход алдаа гарлаа!!! Веб мастерт хандана уу!");
      }
  });
}

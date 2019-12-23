function search(){
  var csrf = $('meta[name=csrf-token]').attr("content");
  $('#datatable').dataTable().fnDestroy();
  $('#datatable').DataTable( {
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
      "searching": false,
      "processing": true,
      "serverSide": true,
      "ajax":{
               "url": searchContactUrl,
               "dataType": "json",
               "type": "POST",
               "data":{
                    _token: csrf,
                    id: $("#cmbHaryalal").val(),
                    name: $("#txtName").val()
                  }
             },
      "columns": [
        { data: "id", name: "id", "visible":false },
        { data: "haryalal", name: "haryalal", "visible":false },
        { data: "heltes", name: "heltes", "visible":false },
        { data: "haryalalName", name: "haryalalName" },
        { data: "heltesName", name: "heltesName" },
        { data: "name", name: "name" },
        { data: "dats", name: "dats" },
        { data: "hats", name: "hats" },
        { data: "thats", name: "thats" },
        { data: "tuh", name: "tuh" },
        { data: "garUtas", name: "garUtas" }
        ]
  }).ajax.reload();
}

$(document).ready(function(){
    $("#cmbHaryalal").change(function(){
        search();
    });
});

$(document).ready(function(){
    $("#txtName").keyup(function(){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        search();
    });
});

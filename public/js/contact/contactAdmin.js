$(document).ready(function(){
    $("#btnPostNewContact").click(function(event){
        event.preventDefault();
        var proceed = true;
        // alert($("#cmbHaryalal").val());
        // alert($("#txtName").val());
        // if($("#cmbHaryalal").val() == "0"){
        //     alertify.error("Харъяалалаа сонгоно уу !!!");
        //     proceed = false;
        // }
        // if($("#txtName").val() == "" || $("#txtName").val() == null){
        //     alertify.error("Нэрээ бичнэ үү !!!");
        //     proceed = false;
        // }
        if(proceed){
            $.ajax({
                type: 'POST',
                url: newContactUrl,
                data: $("#frmNewContact").serialize(),
                success:function(response){
                    alertify.alert(response);
                    emptyNewModal();
                    refresh();
                },
                error: function(jqXhr, json, errorThrown){// this are default for ajax errors
                    var errors = jqXhr.responseJSON;
                    var errorsHtml = '';
                    $.each(errors['errors'], function (index, value) {
                        errorsHtml += '<ul class="list-group"><li class="list-group-item alert alert-danger">' + value + '</li></ul>';
                    });
                    alert(errorsHtml);
                }
            });
        }
    });
});

function emptyNewModal(){
    $("#cmbHaryalal").val("0");
    $("#txtName").val("");
    $("#txtDats").val("");
    $("#txtHats").val("");
    $("#txtThats").val("");
    $("#txtTuh").val("");
    $("#txtGarUtas").val("");
}

function refresh(){
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
        "processing": true,
        "serverSide": true,
        "ajax":{
                 "url": getContactsUrl,
                 "dataType": "json",
                 "type": "POST",
                 "data":{
                      _token: "{{ csrf_token() }}"
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
    $("#btnEditContact").click(function(){
        $("#contactID").val(dataRow["id"]);
        $("#cmbEditHaryalal").val(dataRow["haryalal"]);
        $("#txtEditName").val(dataRow["name"]);
        $("#txtEditDats").val(dataRow["dats"]);
        $("#txtEditHats").val(dataRow["hats"]);
        $("#txtEditThats").val(dataRow["thats"]);
        $("#txtEditTuh").val(dataRow["tuh"]);
        $("#txtEditGarUtas").val(dataRow["garUtas"]);
        if(dataRow == ""){alertify.alert("Та засах мөрөө сонгоно уу!!!")}
        else{$('#editContact').modal('show');}
    });
});

$(document).ready(function(){
    $("#btnPostEditContact").click(function(event){
        event.preventDefault();
        var proceed = true;
        // alert($("#cmbHaryalal").val());
        // alert($("#txtName").val());
        // if($("#cmbEditHaryalal").val() == "0"){
        //     alertify.error("Харъяалалаа сонгоно уу !!!");
        //     proceed = false;
        // }
        // if($("#txtEditName").val() == "" || $("#txtEditName").val() == null){
        //     alertify.error("Нэрээ бичнэ үү !!!");
        //     proceed = false;
        // }
        if(proceed){
            $.ajax({
                type: 'POST',
                url: editContactUrl,
                data: $("#frmEditContact").serialize(),
                success:function(response){
                    alertify.alert(response);
                    emptyEditModal();
                    refresh();
                    dataRow="";
                },
                error: function(jqXhr, json, errorThrown){// this are default for ajax errors
                }
            });
        }
    });
});

function emptyEditModal(){
    $("#cmbEditHaryalal").val("0");
    $("#txtEditName").val("");
    $("#txtEditDats").val("");
    $("#txtEditHats").val("");
    $("#txtEditThats").val("");
    $("#txtEditTuh").val("");
    $("#txtEditGarUtas").val("");
}

$(document).ready(function(){
    $("#btnDeleteContact").click(function(){
        alertify.confirm( "Та устгахдаа итгэлтэй байна уу?", function (e) {
            if (e) {
                var csrf = $('meta[name=csrf-token]').attr("content");
                $.ajax({
                    type: 'POST',
                    url: deleteContactUrl,
                    data: {_token: csrf, id : dataRow['id']},
                    success:function(response){
                        alertify.alert(response);
                        refresh();
                        dataRow="";
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alertify.error("Status: " + textStatus); alertify.error("Error: " + errorThrown);
                    }
                })
            } else {
                alertify.error('Устгах үйлдэл цуцлагдлаа.');
            }
        });
    });
});

$("#btnEditCompany").click(function(){
    if(dataRow == ""){
        alertify.error("Та засах БАЙГУУЛЛАГЫН мөрөө сонгоно уу!!!");
        return "";
    }
    $("#txtEditCompanyName").val(dataRow['haryalalName']);
    $("#hideCompanyID").val(dataRow['id']);
    $('#modalEditCompany').modal('show');
});


$("#btnPostEditCompany").click(function(e){
    e.preventDefault();
    $("#txtCompanyName").removeClass('is-invalid');
    if($("#txtEditCompanyName").val() == ""){
        alertify.error('Байгууллагын нэрээ оруулна уу!!!');
        $("#txtEditCompanyName").addClass('is-invalid');
        return;
    }
    $.ajax({
        type:'POST',
        url:$("#btnPostEditCompany").attr('post-url'),
        data:$("#frmEditCompany").serialize(),
        success:function(res){
            if(res.status == "success"){
                alertify.alert(res.msg);
                refresh();
            }
            else{
                alertify.error(res.msg);
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alertify.error("Status: " + textStatus); alertify.error("Error: " + errorThrown);
        }
    });
});

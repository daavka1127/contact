$("#btnPostNewCompany").click(function(e){
    e.preventDefault();
    $("#txtCompanyName").removeClass('is-invalid');
    if($("#txtCompanyName").val() == ""){
        alertify.error('Байгууллагын нэрээ оруулна уу!!!');
        $("#txtCompanyName").addClass('is-invalid');
        return;
    }
    $.ajax({
        type:'POST',
        url:$("#btnPostNewCompany").attr('post-url'),
        data:$("#frmNewCompany").serialize(),
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

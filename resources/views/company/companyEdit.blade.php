{{-- START NEW CONTACT --}}
<div class="modal fade" id="modalEditCompany">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">X</button>
      </div>

      <div class="modal-body">
        <form id="frmEditCompany" action="{{ action('CompanyController@update') }}" method="post" data-parsley-validate class="form-horizontal form-label-left">
          @csrf
          <input type="hidden" name="companyID" id="hideCompanyID" />
          <div class="form-group col-md-6 text-left">
              <label class="fore-red" for="">Байгууллага нэр * </label>
              <input type="text" class="form-control" name="name" id="txtEditCompanyName" />
          </div>
          <div class="clearfix"></div>
          <button type="submit" post-url="{{ action('CompanyController@update') }}" class="btn btn-success" id="btnPostEditCompany">Хадгалах</button>
      </div>
    </form>
<div class="clearfix"></div>
      <div class = "modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Хаах</button>
      </div>

    </div>
  </div>
</div>
{{-- END NEW CONTACT --}}

{{-- START NEW CONTACT --}}
<div class="modal fade" id="modalNewCompany">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">X</button>
      </div>

      <div class="modal-body">
        <form id="frmNewCompany" action="{{ action('CompanyController@store')}}" method="post" data-parsley-validate class="form-horizontal form-label-left">
          @csrf
          <div class="form-group col-md-6 text-left">
              <label class="fore-red" for="">Байгууллага нэр * </label>
              <input type="text" class="form-control" name="name" id="txtCompanyName" />
          </div>
          <div class="clearfix"></div>
          <button type="submit" post-url="{{action('CompanyController@store')}}" class="btn btn-success" id="btnPostNewCompany">Хадгалах</button>
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

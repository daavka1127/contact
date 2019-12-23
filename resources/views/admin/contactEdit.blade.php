{{-- START EDIT CONTACT --}}
<div class="modal fade" id="editContact">
  <div class="modal-dialog" style="width:80%;">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">X</button>
      </div>

      <div class="modal-body">
        <form id="frmEditContact" action="{{ action('adminController@update')}}" method="post" data-parsley-validate class="form-horizontal form-label-left">
        @csrf
        <input type="hidden" value="" name="id" id="contactID" />
        <div class="form-group col-md-3 text-left">
              <label class="fore-red" for="">Харъяалал * </label>
              <select class="form-control" name="haryalal" id="cmbEditHaryalal">
                <option value="0">Сонгоно уу</option>
                @foreach ($haryalals as $haryalal)
                  <option value="{{$haryalal->id}}">{{$haryalal->haryalalName}}</option>
                @endforeach
              </select>
          </div>

          <div class="form-group col-md-3 text-left">
              <label class="fore-red" for="">Нэр * </label>
              <input type="text" class="form-control" name="name" id="txtEditName" />
          </div>

          <div class="form-group col-md-3 text-left">
              <label class="fore-red" for="">ДАТС </label>
              <input type="text" class="form-control" name="dats" id="txtEditDats" />
          </div>

          <div class="form-group col-md-3 text-left">
              <label class="fore-red" for="">ХАТС </label>
              <input type="text" class="form-control" name="hats" id="txtEditHats" />
          </div>

          <div class="form-group col-md-3 text-left">
              <label class="fore-red" for="">ТХАТС </label>
              <input type="text" class="form-control" name="thats" id="txtEditThats" />
          </div>

          <div class="form-group col-md-3 text-left">
              <label class="fore-red" for="">ТҮХ </label>
              <input type="text" class="form-control" name="tuh" id="txtEditTuh" />
          </div>

          <div class="form-group col-md-3 text-left">
              <label class="fore-red" for="">Гар утас </label>
              <input type="text" class="form-control" name="garUtas" id="txtEditGarUtas" />
          </div>
          <div class="clearfix"></div>
          <button type="submit" class="btn btn-success" id="btnPostEditContact">Засах</button>
      </div>
    </form>
<div class="clearfix"></div>
      <div class = "modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Хаах</button>
      </div>

    </div>
  </div>
</div>
{{-- END EDIT CONTACT --}}

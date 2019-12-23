@extends('layouts.layout_userContact')

@section('content')

    <!-- Datatables -->
    <link href="{{url('public/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('public/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('public/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('public/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('public/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">

    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script> --}}

    <script>

        var searchContactUrl = "{{url('/get/contacts/search')}}";
        $(document).ready(function(){
            $.fn.dataTable.ext.errMode = 'none';
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
                         "url": "{{url('/get/contacts')}}",
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
            });
        });
        $(document).ready(function(){
            $('#datatable tbody').on( 'click', 'tr', function () {
                var currow = $(this).closest('tr');
                $('#datatable tbody tr').css("background-color", "white");
                $(this).closest('tr').css("background-color", "yellow");
                // data = $('#datatable').DataTable().row(currow).data();
                // rdEdit = data["RD"];
                // rdDelete = data["RD"];
            });
        });

    </script>
    <h4>Хайлтын хэсэг</h4>
    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-3">
        <label for="">Харъяалал: </label>
        <select name="haryalal" id="cmbHaryalal" class="form-control">
            <option value="0">Сонгоно уу</option>
          @foreach ($haryalals as $haryalal)
            <option value="{{$haryalal->id}}">{{$haryalal->haryalalName}}</option>
          @endforeach
        </select>
    </div>
    {{-- <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-3">
        <label for="">Албад хэлтэс: </label>
        <select name="heltes" id="cmbHeltes" class="form-control">
            <option value="0">Сонгоно уу</option>
        </select>
    </div> --}}
    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-3">
        <label for="">Нэр: </label>
        <input type="text" id="txtName" name="name" maxlength="50" class="form-control">
    </div>
    <div class="clearfix"></div>
    <h3><strong>Утасны жагсаалт</strong></h3>
    <table id="datatable" class="table table-striped table-bordered" style="width:100%;">
      <thead>
        <tr>
          <th>ID</th>
          <th></th>
          <th></th>
          <th>Харъяалал</th>
          <th>Албад хэлтэс</th>
          <th>Нэр</th>
          <th>ДАТС</th>
          <th>ХАТС</th>
          <th>ТХАТС</th>
          <th>ТҮХ</th>
          <th>Гар утас</th>
        </tr>
      </thead>

    </table>

    <div class="text-left">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalNewContact">Нэмэх</button>
        <button type="button" class="btn btn-warning" id="btnEditContact">Засах</button>
        <button type="button" class="btn btn-danger" id="btnDeleteContact">Устгах</button>
    </div>
    @include('admin.contactNew')
    @include('training.contactEdit')

    <script src="{{url('public/js/contact/contact.js')}}"></script>

  <!-- Datatables -->
  <script src="{{url('public/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{url('public/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
  <script src="{{url('public/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{url('public/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
  <script src="{{url('public/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
  <script src="{{url('public/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{url('public/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{url('public/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
  <script src="{{url('public/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
  <script src="{{url('public/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{url('public/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
  <script src="{{url('public/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
  <script src="{{url('public/vendors/jszip/dist/jszip.min.js')}}"></script>
  <script src="{{url('public/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
  <script src="{{url('public/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
@endsection

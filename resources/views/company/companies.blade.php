@extends('layouts.layout_admin')
@section('content')
    <h3 class="text-center"><strong>Утасны жагсаалт</strong></h3>
    <table id="dtCompanies" up-url="{{url("/company/up")}}" down-url="{{url("/company/down")}}" post-url="{{url("/get/companies")}}" class="table table-striped table-bordered" style="width:100%;">
        <thead>
            <tr>
              <th>ID</th>
              <th>Албан газар</th>
              <th>list</th>
              <th>Үйлдэл</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#newPunishment" id="btnNewCompany">Нэмэх</button>
    <button type="button" class="btn btn-warning" id="btnEditCompany">Засах</button>
    <button type="button" class="btn btn-danger" id="btnDeleteCompany">Устгах</button>
@endsection

@section('css')
    <link href="{{url('public/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('public/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('public/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('public/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('public/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">

    <style media="screen">
        #dtCompanies tbody tr.selected {
            color: white;
            background-color: #2684e1;
        }
        #dtCompanies tbody tr{
            cursor: pointer;
        }
    </style>
@endsection

@section('js')
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

    <script src="{{url("public/js/company/company.js")}}"></script>
@endsection

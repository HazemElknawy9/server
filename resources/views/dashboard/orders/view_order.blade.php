@extends('layouts.dashboard.app')
@section('title','الاوردرات')
@push('css')
<link href="{{asset('dashboard_files/theme_rtl')}}/spinner.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard_files/theme_rtl')}}/style.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<style>
  .loader {
      border: 5px solid #f3f3f3;
      border-radius: 50%;
      border-top: 5px solid #367FA9;
      width: 60px;
      height: 60px;
      -webkit-animation: spin 1s linear infinite; /* Safari */
      animation: spin 1s linear infinite;
  }

</style>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{asset('dashboard/welcome')}}">الرئيسية</a>
                    <i class="fa fa-angle-double-left"></i>
                </li>
                
                <li>
                    <span>عرض</span>
                </li>
            </ul>
        </div>
        <h3 class="hidden-print page-title"> 
            الاوردر
        </h3>

        <div class="row">
          
            <div class="hidden-print col-md-9">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div style="border-radius: 15px !important;" class="portlet light bordered">
                    <div class="loading hidden">Loading&#8230;</div>
                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample">
                            <thead>
                                <tr>
                                  <th>اسم الافيليت</th>
                                  <th>اجمالي الاوردر</th>
                                  <th>العمولة</th>
                                  <th>الحالة</th>
                                  <th>تاريخ الاوردر</th>
                                  <th>العمليات</th>
                                </tr>
                                <tr>
                                  <td>  </td>
                                  <td>  </td>
                                  <td>  </td>
                                  <td>  </td>
                                  <td>  </td>
                                  <td>  </td>
                                </tr>
                            </thead>
                        </table>
                        
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
            <div class="col-md-3">
                <div class="box box-primary">

                  <div class="box-header">

                      <h3 class="box-title">@lang('site.orders')</h3>

                  </div><!-- end of box header -->

                  <div class="box-body">
                      <div style="display: none; flex-direction: column; align-items: center;" id="loading">
                          <div class="loader"></div>
                          <p style="margin-top: 10px">@lang('site.loading')</p>
                      </div>
                      <div id="order-product-list">
                      </div><!-- end of order product list -->

                  </div><!-- end of box body -->

              </div><!-- end of box -->
            </div>
        </div>
        
    </div>
</div>
<!-- model -->
<div id="formModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div style="border-radius: 24px !important;" class="modal-content">
   <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Record</h4>
        </div>
        <div class="modal-body">
        <div class="loading hidden">Loading&#8230;</div>
         <span id="form_result"></span>
         <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label class="control-label col-md-2" >اسم العميل </label>
            <div class="col-md-10">
             <input type="text" name="full_name" disabled="" id="full_name" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-2" >رقم العميل </label>
            <div class="col-md-10">
             <input type="text" name="phone" disabled="" id="phone" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-2" >المحافظة </label>
            <div class="col-md-10">
             <input type="text" name="governrate" disabled="" id="governrate" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-2" >المدينة </label>
            <div class="col-md-10">
             <input type="text" name="city" disabled="" id="city" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-2" >العنوان </label>
            <div class="col-md-10">
             <input type="text" name="address" disabled="" id="address" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-2" >الاجمالي </label>
            <div class="col-md-10">
             <input type="text" name="total_price" disabled="" id="total_price" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-2" >العمولة </label>
            <div class="col-md-10">
             <input type="text" name="commission" disabled="" id="commission" class="form-control" />
            </div>
           </div>
           <br />
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
           </div>
         </form>
        </div>
     </div>
    </div>
</div>          
@endsection
@push('js')
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/pages/scripts/components-bootstrap-switch.min.js" type="text/javascript"></script>
<script>

$(document).ready(function(){

 $('#sample').DataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "{{ route('dashboard.orders.index') }}",
  },
  columns:[
   {
    data: 'affiliate',
    name: 'affiliate',
    orderable: false
   },
   {
    data: 'total_price',
    name: 'total_price',
    orderable: false
   },
   {
    data: 'commission',
    name: 'commission',
    orderable: false
   },
   {
    data: 'status',
    name: 'status',
    orderable: false
   },
   {
    data: 'order_date',
    name: 'order_date',
    orderable: false
   },
   {
    data: 'action',
    name: 'action',
    orderable: false
   }
  ],initComplete: function () {  
     this.api().columns([0]).every(function () {
        var column = this;
        var input = document.createElement("input");
        $(input).addClass("form-control");
        $(input).addClass("form-control");
        $(input).attr("placeholder", 'البحث');
        $(input).appendTo($(column.header()).empty())
        .on('keyup', function () {
            column.search($(this).val()).draw();
        });
    }); 


  },
  language: {
    "sProcessing": "جاري معالجة البيانات",
    "sLengthMenu": "عرض _MENU_ من العناصر",
    "sZeroRecords": "لايوجد نتائج للبحث",
    "sEmptyTable": "لايوجد بيانات لعرضها",
    "sInfo": "عرض من _START_ إلى _END_ من اجمالي _TOTAL_ من العناصر",
    "sInfoEmpty": "عرض من  0 إلى  0 من اجمالي  0 من العناصر",
    "sInfoFiltered": " ",
    "sInfoPostFix": "",
    "sSearch": "البحث: ",
    "sUrl": "",
    "sInfoThousands": ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
      "sFirst": "Primero",
      "sLast": "Último",
      "sNext": "التالي",
      "sPrevious": "السابق"
    },
    "oAria": {
      "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
  },
  lengthMenu:[
    [ 5, 10, 25, -1 ],
    [ '5', '10', '25', 'عرض الكل' ]
  ]
});



$(document).on('click', '.order-products', function(e){
  e.preventDefault();
  $('#loading').css('display', 'flex');
  
  var url = base_url+'/'+$(this).data('url');
  var method = $(this).data('method');
  //alert(method)
  $.ajax({
      url: url,
      method: method,
      success: function(data) {
          $('#loading').css('display', 'none');
          $('#order-product-list').empty();
          $('#order-product-list').append(data);

      }
  })

});

//delete
 $(document).on('click', '.delete', function(){
  swal({
      title: 'هل انت متأكد ؟',
      text: "هل انت متأكد من حذف  " + name +"؟ ",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'نعم!',
      cancelButtonText: 'تراجع !',
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger',
      buttonsStyling: false,
      reverseButtons: true
  }).then((result) => {
      if (result.value) {
          event.preventDefault();
          $.ajax({
             url:"orders/destroy/"+user_id,
             beforeSend:function(){
              $('.loading').removeClass('hidden');
             },
             success:function(data)
             {
              setTimeout(function(){
               $('.loading').addClass('hidden');
                  toastr.success(data.success, data.title);
               $('#sample').DataTable().ajax.reload();
              }, 2000);
             }
            })
      } else if (
          // Read more about handling dismissals
          result.dismiss === swal.DismissReason.cancel
      ) {
          swal(
              'تراجع',
              'البيانت مؤمنة :)',
              'error'
          )
      }
  })
  user_id = $(this).attr('id');
  name = $(this).attr('num');
  $('.modal-title').text('حذف');
  $('.content').text("هل انت متأكد من حذف  " + name +"؟ ");
 });

$(document).on('click', '.edit', function(){
  var id = $(this).attr('id');
  $('#form_result').html('');
  $.ajax({
   url:"/dashboard/orders/"+id,
   dataType:"json",
   success:function(html){
    $('#full_name').val(html.data.full_name);
    $('#phone').val(html.data.phone);
    $('#governrate').val(html.data.governrate);
    $('#city').val(html.data.city);
    $('#address').val(html.data.address);
    $('#total_price').val(html.data.total_price);
    $('#commission').val(html.data.commission);
    $('#hidden_id').val(html.data.id);
    $('.modal-title').text("تفاصيل الاوردر رقم "+id);
    $('#action').val("Edit");
    $('#formModal').modal('show');
   }
  })
 });



});


</script>
<script>
// Firefox 64 - 20190102
// If you see wobbly dots spinning very slowly move your mouse around over the overlay to see the real behavior
// Seems to be a quirk/bug specific to codepen...
</script>

@endpush
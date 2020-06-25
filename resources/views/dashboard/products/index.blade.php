@extends('layouts.dashboard.app')
@section('title','المنتجات')
@push('css')
<link href="{{asset('dashboard_files/theme_rtl')}}/spinner.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard_files/theme_rtl')}}/style.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<style>
  .badge{
    font-size: 13px!important;
  }

  .label {
    letter-spacing: 0.05em;
    border-radius: 9px !important;
    padding: 10px 18px 12px;
    font-weight: 500;
    margin-top: 0px !important;
    display: block;
    width: 58px;
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
        <h3 class="page-title"> 
            المنتجات
        </h3>

        <div class="row">
          <div class="loading hidden">Loading&#8230;</div>
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div style="border-radius: 15px !important;" class="portlet light bordered">
                    
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="{{ route('dashboard.products.create') }}" class="btn sbold green"><i class="fa fa-plus"></i> اضافة منتج جديد</a>
                                    </div>
                                </div> 
                            </div>
                        </div>

                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample">
                            <thead>
                                <tr>
                                  <th style="max-width: 100%;">
                                      <button type="button" name="bulk_delete" id="bulk_delete" class="btn btn-danger"><i class="fa fa-trash"></i></button> 
                                  </th>
                                  <td>الصورة</td>
                                  <th>الاسم</th>
                                  <th>الوصف</th>
                                  <th>
                                    <select name="category_filter" id="category_filter" class="form-control">
                                     <option value="">اختر القسم</option>
                                     @foreach($category as $row)
                                     <option value="{{ $row->id }}">{{ $row->name }}</option>
                                     @endforeach
                                    </select>
                                  </th>
                                  <th>Brand</th>
                                  <th>السعر</th>
                                  <th>الحد الأدني</th>
                                  <th>الحد الأقصى</th>
                                  <th>المخزن</th>
                                  <th>حالة المنتج</th>
                                  <th>تفعيل / تجميد</th>
                                  <th>العمليات</th>
                                </tr>
                                <tr>
                                  <td style="width: 1px;"> </td>
                                  <td>  </td>
                                  <td style="width: 86px;"></td>
                                  <td>  </td>
                                  <td>  </td>
                                  <td>  </td>
                                  <td style="width: 30px;">  </td>
                                  <td style="width: 30px;">  </td>
                                  <td style="width: 30px;">  </td>
                                  <td style="width: 30px;">  </td>
                                  <td style="width: 33px;">  </td>
                                  <td style="width: 46px;">  </td>
                                  <td style="width: 76px;">  </td>
                                </tr>
                            </thead>
                        </table>
                        
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
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
fetch_data();

 function fetch_data(category = '')
 {
 $('#sample').DataTable({
  processing: true,
  serverSide: true,
  ajax:{ 
   url: "{{ route('dashboard.products.index') }}",
   data: {category:category}
  },
  columns:[
   {
    data: 'checkbox',
    name: 'checkbox',
    orderable: false
   },
   {
    data: 'image',
    name: 'image',
    render: function(data, type, full, meta){
     return "<img style='height: 60px;' src={{ URL::to('/') }}/storage/products_image/" + data + " width='70' class='img-thumbnail' />";
    },
    orderable: false
   },

   {
    data: 'name',
    name: 'name',
    orderable: false
   },
   {
    data: 'description',
    name: 'description',
    orderable: false
   },
   {
    data: 'category',
    name: 'category',
    orderable: false
   },
   {
    data: 'vendor',
    name: 'vendor',
   },
   {
    data: 'price',
    name: 'price',
   },
   {
    data: 'minimum_price',
    name: 'minimum_price',
   },
   {
    data: 'maximum_price',
    name: 'maximum_price',
   },
   {
    data: 'stock',
    name: 'stock',
   },
   {
    data: 'user_active_or_not',
    name: 'user_active_or_not',
   },
   {
    data: 'inactive',
    name: 'inactive',
   },
   {
    data: 'action',
    name: 'action',
    orderable: false
   }
  ],initComplete: function () {  
     this.api().columns([2, 3,4]).every(function () {
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
 }

 $('#category_filter').change(function(){

  var category_id = $('#category_filter').val();

  $('#sample').DataTable().destroy();

  fetch_data(category_id);
 }); 

//delete
 $(document).on('click', '.delete', function(){
  user_id = $(this).attr('id');
  name = $(this).attr('num');
  $('.modal-title').text('حذف');
  $('.content').text("هل انت متأكد من حذف  " + name +"؟ ");
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
             url:"products/destroy/"+user_id,
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
  
 });


// active
$(document).on('click', '.bootstrap-switch-warning', function(){
  user_id = $(this).attr('id');
  $(".bootstrap-switch-container"+user_id).css({"width": "123px", "margin-left": "0px"});
  $.ajax({
   url:"products/active/1/"+user_id,
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
});
//inactive
$(document).on('click', '.bootstrap-switch-success', function(){
  user_id = $(this).attr('id');
  $(".bootstrap-switch-container"+user_id).css({"width": "123px", "margin-left": "-41px"});
  $.ajax({
   url:"products/active/0/"+user_id,
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
});

$(document).on('click', '#bulk_delete', function(){
      var id = [];
      $('.student_checkbox:checked').each(function(){
          id.push($(this).val());
      });
      swal({
      title: 'هل انت متأكد ؟',
      text: "هل انت متأكد من حذف  " +id.length +"؟ ",
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
          if(id.length > 0)
            {
                $.ajax({
                    url:"{{ route('dashboard.products.destroyall')}}",
                    method:"get",
                    data:{id:id},
                    beforeSend:function(){
                      $('.loading').removeClass('hidden');
                     },success:function(data)
                      {
                        setTimeout(function(){
                         $('.loading').addClass('hidden');
                            toastr.success(data.success, data.title);
                         $('#sample').DataTable().ajax.reload();
                        }, 2000);
                      }
                });
            }
            else
            {
                swal("لايوجد شيئ لحذفه");
            }
      } else if (
          // Read more about handling dismissals
          result.dismiss === swal.DismissReason.cancel
      ) {
          swal(
              'Cancelled',
              'Your data is safe :)',
              'error'
          )
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
@extends('layouts.dashboard.app')
@section('title','افيليت')
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
                    <a href="{{asset('dashboard/affiliates')}}">افيليت</a>
                    <i class="fa fa-angle-double-left"></i>
                </li>
                <li>
                    <span>عرض</span>
                </li>
            </ul>
        </div>
        <h6 class="page-title"> 
        </h6>

        <div class="row">
          <div class="loading hidden">Loading&#8230;</div>
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div style="border-radius: 15px !important;" class="portlet light bordered">
                    
                    <div class="portlet-body">
                    
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample">
                            <thead>
                                <tr>
                                  <th style="max-width: 100%;">
                                      <button type="button" name="bulk_delete" id="bulk_delete" class="btn btn-danger"><i class="fa fa-trash"></i> حذف الكل</button> 
                                  </th>
                                  <th>الاسم</th>
                                  <th>الإيميل</th>
                                  <th>الهاتف</th>
                                  <th>الحالة</th>
                                  <th>تجميد المستخدم</th>
                                  <th>العمليات</th>
                                </tr>
                                <tr class="filter" >
                                  <td class="select-filter">   </td>
                                  <td></td>
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
        </div>
        
    </div>
</div>
           
@endsection
@push('js')
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script>

$(document).ready(function(){

 $('#sample').DataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "{{ route('dashboard.affiliates.index') }}",
  },
  columns:[
   {
    data: 'checkbox',
    name: 'checkbox',
    orderable: false
   },

   {
    data: 'first_name',
    name: 'first_name',
   },
   {
    data: 'email',
    name: 'email',
   },
   {
    data: 'phone',
    name: 'phone',
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
     this.api().columns([1, 2]).every(function () {
        var column = this;
        var input = document.createElement("input");
        $(input).addClass("form-control");
        $(input).addClass("input-small");
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
             url:"affiliates/destroy/"+user_id,
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
   url:"affiliates/active/1/"+user_id,
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
   url:"affiliates/active/0/"+user_id,
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
                    url:"{{ route('dashboard.affiliates.destroy.all')}}",
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
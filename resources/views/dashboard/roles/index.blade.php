@extends('layouts.dashboard.app')
@section('title','انواع المستخدمين')
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
</style>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{asset('/dashboard')}}">الرئيسية</a>
                    <i class="fa fa-angle-double-left"></i>
                </li>
                <li>
                    <span>انواع المستخدمين</span>
                </li>
            </ul>
        </div>
        <h3 class="page-title"> 
            المستخدمين
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
                                        <a href="{{ route('dashboard.roles.create') }}" class="btn sbold green"><i class="fa fa-plus"></i>  اضافة موظف جديد</a>
                                    </div>
                                </div> 
                            </div>
                        </div>

                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample">
                            <thead>
                                <tr>
                                  <th>
                                      <button type="button" name="bulk_delete" id="bulk_delete" class="btn btn-danger"><i class="fa fa-trash"></i> حذف الكل</button> 
                                  </th>
                                  <td>الاسم</td>
                                  <td>الصلاحيات</td>
                                  <td>عدد المستخدمين</td>
                                  <th>العمليات</th>
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
<!-- model -->
<div id="formModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div style="border-radius: 24px !important;" class="modal-content">
   <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Record</h4>
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label class="control-label col-md-2" >اسم الصلاحية </label>
            <div class="col-md-10">
             <input type="text" name="name" id="name" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-2" >اسم اللغة العربية</label>
            <div class="col-md-10">
             <input type="text" name="ar_name" id="ar_name" class="form-control" />
            </div>
           </div>
           <br />
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn sbold green" value="Add" />
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
<script>

$(document).ready(function(){

  $('#sample').DataTable({
    processing: true,
    serverSide: true,
    ajax:{
     url: "{{ route('dashboard.roles.index') }}",
    },
    columns:[
     {
      data: 'checkbox',
      name: 'checkbox',
      orderable: false
     },
     {
      data: 'name',
      name: 'name',
     },
     {
      data: 'permissions[].name',
      name: 'permissions[].name',
      render: function(data, type, full, meta){
       return '<h6 style="display: inline-block mar;margin-top: 0;margin-bottom: 0px;word-wrap: break-word;"><span class="badge badge-primary">'+data+'</span></h6>';
      },
      orderable: false
     },
     {
      data: 'users_count',
      name: 'users_count',
     },
     {
      data: 'action',
      name: 'action',
      orderable: false
     }
    ],
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
                    url:"{{ route('dashboard.role.destroy.all')}}",
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
              'تراجع',
              'البيانت مؤمنة :)',
              'error'
          )
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
      confirmButtonText: 'نعم !',
      cancelButtonText: 'تراجع !',
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger',
      buttonsStyling: false,
      reverseButtons: true
  }).then((result) => {
      if (result.value) {
          event.preventDefault();
          $.ajax({
             url:"roles/destroy/"+user_id,
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






});
</script>
<script>
// Firefox 64 - 20190102
// If you see wobbly dots spinning very slowly move your mouse around over the overlay to see the real behavior
// Seems to be a quirk/bug specific to codepen...
</script>

@endpush
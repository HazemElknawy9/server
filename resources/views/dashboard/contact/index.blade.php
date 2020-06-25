@extends('layouts.dashboard.app')
@section('title','صلاحيات الموقع ')
@push('css')
<link href="{{asset('dashboard_files/theme_rtl')}}/spinner.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard_files/theme_rtl')}}/style.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')

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
                    <span>تواصل معنا</span>
                </li>
            </ul>
        </div>
        <h3 class="page-title"> 
            عرض الرسائل
        </h3>

        <div class="row">
          <div class="loading hidden">Loading&#8230;</div>
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div style="border-radius: 15px !important;" class="portlet light bordered">
                    
                    <div class="portlet-body">
                       

                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample">
                            <thead>
                                <tr>
                                  <th>
                                      <button type="button" name="bulk_delete" id="bulk_delete" class="btn btn-danger"><i class="fa fa-trash"></i> حذف الكل</button> 
                                  </th>
                                  <td>الاسم</td>
                                  <td>الايميل</td>
                                  <td>الموضوع</td>
                                  <td>الرسالة</td>
                                  <td>الرد</td>
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
         <div class="loading hidden">Loading&#8230;</div>
         <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label class="control-label col-md-2" >الاسم </label>
            <div class="col-md-10">
             <input type="text" name="name" id="name" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-2" >الإيميل </label>
            <div class="col-md-10">
             <input type="text" name="email" id="email" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-2" >الموضوع</label>
            <div class="col-md-10">
             <input type="text" name="subject" id="subject" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-2" >الرد</label>
            <div class="col-md-10">
            <textarea style="height: 90px;" maxlength="5000" rows="10" class="form-control" name="response" id="response" required></textarea>
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
     url: "{{ route('dashboard.contacts.index') }}",
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
      data: 'email',
      name: 'email',
     },
     {
      data: 'subject',
      name: 'subject',
     },
     {
      data: 'message',
      name: 'message',
     },
     {
      data: 'response',
      name: 'response',
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

$('#sample_form').on('submit', function(event){
  event.preventDefault();

  if($('#action').val() == "Edit")
  {
   $.ajax({
    url:"{{ route('dashboard.contacts.update') }}",
    method:"POST",
    data:new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    dataType:"json",
    beforeSend:function(){
    $('.loading').removeClass('hidden');
    },
    success:function(data)
    {
     setTimeout(function(){
        $('#formModal').modal('hide');
        $('.loading').addClass('hidden');
          toastr.success(data.success, data.title);
        $('#sample').DataTable().ajax.reload();
       }, 2000);
    },
    error(response){
      $('.loading').addClass('hidden');

     var error_li = '';
      $.each(response.responseJSON.errors,function(index,value) {
        error_li +='<li>'+value+'</li>';
      });
        toastr.error(error_li,'خطأ',{
          closeButton:true,
          progressBar:true,
       });
    }
   });
  }
});

$(document).on('click', '.edit', function(){
  var id = $(this).attr('id');
  $('#form_result').html('');
  $.ajax({
   url:"/dashboard/contacts/"+id+"/edit",
   dataType:"json",
   success:function(html){
    $('#name').val(html.data.name);
    $('#email').val(html.data.email);
    $('#subject').val(html.data.subject);
    $('#response').val(html.data.response);
    $('#hidden_id').val(html.data.id);
    $('.modal-title').text("الرد على الرسالة");
    $('#action_button').val("ارسال");
    $('#action').val("Edit");
    $('#formModal').modal('show');
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
                    url:"{{ route('dashboard.contacts.destroy.all')}}",
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
             url:"contacts/destroy/"+user_id,
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

@endpush
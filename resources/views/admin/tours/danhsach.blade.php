@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tour
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <br />
                    <div class="row input-daterange">
                        <div class="col-md-4">
                            <input type="text" name="date_from" id="date_from" class="form-control" placeholder="Từ ngày" readonly />
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="date_to" id="date_to" class="form-control" placeholder="Đến ngày" readonly />
                        </div>
                        <div class="col-md-4">
                            <button type="button" name="filter" id="filter" class="btn btn-primary">Lọc</button>
                            <button type="button" name="refresh" id="refresh" class="btn btn-default">Làm mới</button>
                        </div>
                    </div>
                    <br />
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="order_table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Đi từ</th>
                                <th>Đi đến</th>
                                <th>Sơ lược</th>
                                <th>Hình ảnh</th>
                                <th>Nổi bật</th>
                                <th>
                                  <select name="category_filter" id="category_filter" class="form-control">
                                   <option value="0" selected="true" disabled="true">Chọn loại tour</option>
                                  @foreach($tourcategory as $row)
                                   <option value="{{ $row->id }}">{{ $row->name }}</option>
                                  @endforeach
                                  </select>
                                </th>
                                <th>Giá tiền</th>
                                <th>Giảm giá</th>
                                <th>Ngày bắt đầu</th>
                                <th>Ngày kết thúc</th>
                                <th></th>
                                <!-- <th>Xoa</th>
                                <th>Sua</th> -->
                                <!-- <th>Date to</th> -->
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
<!-- /#page-wrapper -->
<div id="formModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thêm tour mới</h4>
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label class="control-label col-md-4" >Tên: </label>
            <div class="col-md-8">
             <input type="text" name="name" id="name" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Đi từ: </label>
            <div class="col-md-8">
             <input type="text" name="go_from" id="go_from" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Đi đến: </label>
            <div class="col-md-8">
             <input type="text" name="go_to" id="go_to" class="form-control" />
            </div>
           </div>
            <div class="form-group">
            <label class="control-label col-md-4">Thông tin: </label>
            <div class="col-md-8">
             <textarea id="about" class="form-control" rows="3" name="about" required></textarea> 
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Hình ảnh: </label>
            <div class="col-md-8">
             <input type="file" name="image" id="image" />
             <span id="store_image"></span>
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Nổi bật: </label>
            <div class="col-md-8">
              {{-- <label class="radio-inline" >
                  <input name="highlight" id="highlight" value="1" checked="" type="radio">Có
              </label>
              <label class="radio-inline">
                  <input name="highlight" id="highlight" value="0" checked="" type="radio">Không
              </label>  --}} 
              <div class="col-md-8">
              <select class="form-control" name="highlight" id="highlight">
                <option value="1">Có</option>
                <option value="0">Không</option>
             </select>
            </div>
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Loại tour: </label>
            <div class="col-md-8">
             <select class="form-control" name="tour_category" id="tourcategory">
                @foreach($tourcategory as $tc)
                <option value="{{$tc->id}}">{{$tc->name}}</option>
                @endforeach
             </select>
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Giá Tiền : </label>
            <div class="col-md-8">
             <input  name="price" id="price" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Giảm giá: </label>
            <div class="col-md-8">
             <input  name="discount" id="discount" class="form-control" />
            </div>
           </div>
            <div class="form-group">
            <label class="control-label col-md-4">Từ ngày: </label>
            <div class="col-md-8">
             <input type="date" name="from_date" id="from_date" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Đến ngày: </label>
            <div class="col-md-8">
             <input type="date" name="to_date" id="to_date" class="form-control" />
            </div>
           </div>
           <br />
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
           </div>
         </form>
        </div>
     </div>
    </div>
</div>

<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Xác nhận</h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Bạn có chắc là muốn xóa?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">Đồng ý</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<link rel="stylesheet prefetch" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css"><script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script>
$(document).ready(function(){

$('#date_from').datepicker({
  autoclose: true,         
  format: 'yyyy-m-d',
  todayHighlight: true
 });

 $('#date_to').datepicker({
  autoclose: true,         
  format: 'yyyy-m-d',
  todayHighlight: true
 });

load_data();

function load_data(date_from = '', date_to = '',category = '')
{
  $('#order_table').DataTable({
   processing: true,
   serverSide: true,
   ajax: {
    url:"{{ route('tour-table.index') }}",
    data:{date_from:date_from, date_to:date_to,category:category}
   },
   columns: [
    {
     data:'id',
     name:'id'
    },
    {
     data:'name',
     name:'name'
    },
    {
     data:'go_from',
     name:'go_from'
    },
    {
     data:'go_to',
     name:'go_to'
    },
    {
     data:'about',
     name:'about'
    },
    {
     data:'image',
     name:'image',
     render: function(data, type, full, meta){
       return   "<img src={{ URL::to('/')}}/upload/images/"+data+" width = '100' />";
     }
    },
    {
     data:'highlight',
     name:'highlight',
     render: function(data,type,full, meta){
     if(data == 1)
          return "Có";
      else
          return "Không";
      }
    },
     {
     data:'tourcate_id',
     name:'tourcate_id',
     orderable: false,

     render: function(data,type,full, meta){
        if(data == 1)
          return "Tour trong nước";
        else
          return "Tour nước ngoài";
     }
    },
    {
     data:'price',
     name:'price'
    },
    {
     data:'discount',
     name:'discount'
    },
    {
     data:'from_date',
     name:'from_date'
    },
    {
     data:'to_date',
     name:'to_date'
    },
    {
    data: 'action',
    name: 'action',
    orderable: false
    }
   ]
  });
}

$('#sample_form').on('submit', function(event){
  event.preventDefault();
  
  if($('#action').val() == "Edit")
  {
   $.ajax({
    url:"{{route('tour.update') }}",
    method:"POST",
    data:new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    dataType:"json",
    success:function(data)
    {
     var html = '';
     if(data.errors)
     {
      html = '<div class="alert alert-danger">';
      for(var count = 0; count < data.errors.length; count++)
      {
       html += '<p>' + data.errors[count] + '</p>';
      }
      html += '</div>';
     }
     if(data.success)
     {
      html = '<div class ="alert alert-success">' + data.success + '</div>';
      $('#sample_form')[0].reset();
      $('#store_image').html('');
      $('#order_table').DataTable().ajax.reload();
     }
     $('#form_result').html(html);
    }
   });
  }

 });
  
 $(document).on('click', '.edit', function(){
 $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

  var id = $(this).attr('id');
  $('#form_result').html('');
  $.ajax({
   url:"tour-table/"+id+"/edit",
   dataType:"json",
   success:function(html){
    $('#name').val(html.data.name);
    $('#go_from').val(html.data.go_from);
    $('#go_to').val(html.data.go_to);
    $('#about').val(html.data.about);
    $('#store_image').html("<img src={{ URL::to('/') }}/upload/images/" + html.data.image + " width='70' class='img-thumbnail' />");
    $('#store_image').append("<input type='hidden' name='hidden_image' value='"+html.data.image+"' />");
    $('#highlight').val(html.data.highlight);
    
    $('#tourcategory').val(html.data.tourcate_id);
    $('#price').val(html.data.price);
    $('#discount').val(html.data.discount);
    $('#from_date').val(html.data.from_date);
    $('#to_date').val(html.data.to_date);
    $('#hidden_id').val(html.data.id);
    $('.modal-title').text("Sửa");
    $('#action_button').val("Sửa");
    $('#action').val("Edit");
    $('#formModal').modal('show');
   }
  })
 });

var user_id;

 $(document).on('click', '.delete', function(){
  user_id = $(this).attr('id');
  $('#confirmModal').modal('show');
  $('.modal-title').text("Xóa");
 });

 $('#ok_button').click(function(){
  $.ajax({
   url:"tour-table/destroy/"+user_id,
   beforeSend:function(){
    $('#ok_button').text('Đang xóa...');
   },
   success:function(data)
   {
    setTimeout(function(){
     $('#confirmModal').modal('hide');
     $('#order_table').DataTable().ajax.reload();
    }, 2000);
   }
  })
 });

$('#filter').click(function(){
  var date_from = $('#date_from').val();
  var date_to = $('#date_to').val();
  if(date_from != '' &&  date_to != '')
  {
   $('#order_table').DataTable().destroy();
   load_data(date_from, date_to);
  }
  else
  {
   alert('Bạn chưa nhập ngày đi và ngày kết thúc');
  }
 });

 $('#refresh').click(function(){
  $('#date_from').val('');
  $('#date_to').val('');
  $('#order_table').DataTable().destroy();
  load_data();
 });

$('#category_filter').change(function(){
  var category_id = $('#category_filter').val();

  $('#order_table').DataTable().destroy();

  load_data(0,0,category_id);
 });

});
</script>
@endsection
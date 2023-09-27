@extends('Admin.layout.main')
@section('content')

{{-- @if(section()->has('mess'))
<div class="alert alert-success">
  {{section()->get('mess')}}
</div>
@endif --}}

<form action="{{route('product.index')}}" method="get" class="sidebar-form">
  @csrf
  <div class="input-group">
    <input type="text" name="search" value="{{old('search')}}" class="form-control" placeholder="Search">
    <span class="input-group-btn">
          <button type="submit"  id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
  </div>
</form>
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Table With Full Features</h3>
    </div>  
    <!-- /.box-header -->
    <div class="box-body">
      <div>
        <button type="submit" class="btn btn-primary"><a style="color: black" href="{{route('product.create')}}">Thêm Mới</a></button>
      </div>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>STT</th>
          <th>id</th>
          <th>Tên Sản Phẩm</th>
          <th>Giá Sản Phẩm</th>
          <th>Ảnh</th>

         
          
        </tr>
        </thead>
        <tbody>
          @if($productData)
          @foreach($productData as $key =>$val)
          <tr>
              <td class="sorting_1">{{$key+1}}</td>
              <td>{{$val->id}}</td>
              <td>{{$val->name}}</td>
              <td>{{$val->price}}</td>
              @if($val->image)
              <td>
                <img src="{{asset($val->image)}}" style="width:100px">
              </td>
              @else
              <td>
                <img src="https://devmaster.edu.vn/images/logo.png"style="width : 100px"alt="">
              </td>

              @endif
              <td>xem,sửa,xóa</td>
          </tr>
          @endforeach

          @else
          <tr role = "row" class="odd">
            <td class="sorting_1">Không có dữ liệu</td>
          </tr>
    
      @endif
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <div class="row">
    <div class="col-sm-5">
      <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div>
      <div class="col-sm-7">
        <div class= "dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{$productData->links()}}
        </div>
      </div>
    </div>
  <!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
@endsection
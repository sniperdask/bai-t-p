
@extends('admin.layout.main')
@section('content')
<section class="connent">
    <div class="">
        <form role="form" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="nameProduct">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Giá</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="price">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Anh</label>
                <input type="file" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="image">
              </div>
              
            </div>
            <!-- /.box-body -->
        
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
    </div>
    </section>
@endsection
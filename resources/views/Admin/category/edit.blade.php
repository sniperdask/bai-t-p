
@extends('admin.layout.main')
@section('content')
<section class="connent">
    <div class="">        <form role="form" action="{{route('category.update',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Tên Danh mục</label>
                <input type="text" value="{{$data->name}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="nameCategory">
              </div>
              
              <div class="form-group">
                <label for="exampleInputEmail1">Ảnh</label>
                <input type="file" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="new_image">
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
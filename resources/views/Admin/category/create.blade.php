
@extends('admin.layout.main')
@section('content')
<section class="connent">
    <div class="">
        <form role="form" action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
            @csrf
             @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Tên Danh mục</label>
                <input type="text" value="{{old('name')}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="nameCategory">
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
 @extends('admin.layouts.main')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
 @section('headerH1')
  Edit "{{$category->title}}" 
  @endsection
  @section('headerLi')
  <a href="{{ route('admin.category.index') }}">Categories</a>  /  <a href="{{ route('admin.category.show', $category->id) }}">{{$category->title}}</a>  /  Edit
  @endsection
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-1">
            <a href="{{ route ('admin.category.index')}}" class="btn btn-block btn-primary">Back</a>
          </div>
          <div class="col-12"> 
            <form  action="{{route('admin.category.update', $category->id)}}" method="POST" class="w-25">
              @csrf
              @method('patch')
              <div class="form-group">
                <label for="title">Title</label>
                <input  type="text" class="form-control" id="title" name="title" placeholder="title"
                value="{{$category->title}}">
                @error('title')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <input type="submit" class="btn btn-primary ">
            </form>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
 @extends('admin.layouts.main')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
 @section('headerH1')
  Create Tag
  @endsection
  @section('headerLi')
  <a href="{{ route('admin.tag.index') }}">Tags</a>  /  Create tag
  @endsection
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-1">
            <a href="{{ route ('admin.tag.index')}}" class="btn btn-block btn-primary">Back</a>
          </div>
          <div class="col-12"> 
            <form  action="{{route('admin.tag.store')}}" method="POST" class="w-25">
              @csrf
              <div class="form-group">
                <label for="title">Title</label>
                <input  type="text" class="form-control" id="title" name="title" placeholder="title">
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
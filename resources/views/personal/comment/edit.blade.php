 @extends('personal.layouts.main')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
 @section('headerH1')
  Edit "{{$comment->message}}" 
  @endsection
  @section('headerLi')
  <a href="{{ route('personal.comment.index') }}">Comments</a>  /  {{$comment->message}}  /  Edit
  @endsection
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="col-12"> 
            <form  action="{{route('personal.comment.update', $comment->id)}}" method="POST" class="w-50">
              @csrf
              @method('patch')
              <div class="form-group">
                <label for="message">message</label>
                <textarea name="message" class="form-control" >{{$comment->message}}</textarea>
                @error('message')
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
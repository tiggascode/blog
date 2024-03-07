 @extends('admin.layouts.main')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
 @section('headerH1')
  "{{$post->title}}" 
  @endsection
  @section('headerLi')
  <a href="{{ route('admin.post.index') }}">Posts</a>  /  {{$post->title}}
  @endsection
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-1" >
            <a   href="{{route('admin.post.index')}}" class="btn btn-block  btn-primary">Back</a>
            <a  href="{{route('admin.post.edit', $post->id)}}" class="btn btn-block btn-primary">Edit</a>
            <form action="{{ route('admin.post.delete' , $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="border-0 btn  btn-block  btn-danger">delete</button>
            </form>
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <tbody >
                    <tr>
                      <td>ID</td>
                      <td>{{$post->id}}</td>
                    </tr>
                    <tr>
                      <td>Title</td>
                      <td>{{$post->title}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
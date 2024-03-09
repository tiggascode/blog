 @extends('admin.layouts.main')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
 @section('headerH1')
  Posts 
  @endsection
  @section('headerLi')
  Posts
  @endsection
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-1">
            <a href="{{route('admin.post.create')}}" class="btn btn-block mb-3 btn-primary">Add</a>
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody >
                    @foreach ($posts as $post)
                    <tr>
                      <td>{{$post->id}}</td>
                      <td>{{$post->title}}</td>
                      <td>
                          <a href="{{route ('admin.post.show' , $post->id)}}">show</a>
                          <a href="{{route ('admin.post.edit' , $post->id)}}">edit</a>
                          <form action="{{ route('admin.post.delete' , $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn-danger">delete</button>
                          </form></td>
                    </tr>
                    @endforeach
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
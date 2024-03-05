 @extends('admin.layouts.main')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
 @section('headerH1')
  Users 
  @endsection
  @section('headerLi')
  Users
  @endsection
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-1">
            <a href="{{route('admin.user.create')}}" class="btn btn-block btn-primary">Add</a>
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>name</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody >
                    @foreach ($users as $user)
                    <tr>
                      <td>{{$user->id}}</td>
                      <td>{{$user->name}}</td>
                      <td><a href="{{route ('admin.user.show' , $user->id)}}">show</a>
                          <a href="{{route ('admin.user.edit' , $user->id)}}">edit</a>
                          <form action="{{ route('admin.user.delete' , $user->id) }}" method="POST">
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
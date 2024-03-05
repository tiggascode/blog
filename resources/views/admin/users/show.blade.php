 @extends('admin.layouts.main')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
  @section('headerH1')
  "{{$user->name}}" 
  @endsection
  @section('headerLi')
  <a href="{{ route('admin.user.index') }}">Users</a>  /  {{$user->name}}
  @endsection
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-1  ">
            <a href="{{route('admin.user.index')}}" class="btn btn-block btn-primary">Back</a>
            <a href="{{route('admin.user.edit', $user->id)}}" class="btn btn-block btn-primary">Edit</a>
            <form action="{{ route('admin.user.delete' , $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn-danger">delete</button>
                          </form>
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <tbody >
                    <tr>
                      <td>ID</td>
                      <td>{{$user->id}}</td>
                    </tr>
                    <tr>
                      <td>Title</td>
                      <td>{{$user->name}}</td>
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
 @extends('admin.layouts.main')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
 @section('headerH1')
  "{{$tag->title}}" 
  @endsection
  @section('headerLi')
  <a href="{{ route('admin.tag.index') }}">Tags</a>  /  {{$tag->title}}
  @endsection
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-1  ">
            <a href="{{route('admin.tag.index')}}" class="btn btn-block btn-primary">Back</a>
            <a href="{{route('admin.tag.edit', $tag->id)}}" class="btn btn-block btn-primary">Edit</a>
            <form action="{{ route('admin.tag.delete' , $tag->id) }}" method="POST">
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
                      <td>{{$tag->id}}</td>
                    </tr>
                    <tr>
                      <td>Title</td>
                      <td>{{$tag->title}}</td>
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
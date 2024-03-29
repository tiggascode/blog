 @extends('admin.layouts.main')
 @section('content')
  
  @section('headerH1')
  "{{$category->title}}" 
  @endsection
  @section('headerLi')
  <a href="{{ route('admin.category.index') }}">Categories</a>  /  {{$category->title}}
  @endsection

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-1">
          <a href="{{route('admin.category.index')}}" class="btn btn-block btn-primary">Back</a>
          <a href="{{route('admin.category.edit', $category->id)}}" class="btn btn-block btn-primary">Edit</a>
          <form action="{{ route('admin.category.delete' , $category->id) }}" method="POST">
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
                      <td>{{$category->id}}</td>
                    </tr>
                    <tr>
                      <td>Title</td>
                      <td>{{$category->title}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @endsection
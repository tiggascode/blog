 @extends('admin.layouts.main')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
 @section('headerH1')
  Edit "{{$user->name}}" 
  @endsection
  @section('headerLi')
  <a href="{{ route('admin.user.index') }}">Users</a>  /   <a href="{{ route('admin.user.show', $user->id) }}">{{$user->name}}</a>  /  Edit
  @endsection
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-1">
            <a href="{{ route ('admin.user.index')}}" class="btn btn-block btn-primary">Back</a>
          </div>
          <div class="col-12"> 
            <form  action="{{route('admin.user.update', $user->id)}}" method="POST" class="w-25">
              @csrf
              @method('patch')
              <div class="form-group">
                <label for="name">name</label>
                <input  type="text" class="form-control" id="name" name="name" placeholder="name"
                value="{{$user->name}}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="email">email</label>
                <input value="{{$user->email}}"  type="text" class="form-control" id="email" name="email" placeholder="email">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group w-50">
                  <label>Role</label>
                  <select name="role" class="form-control">
                    @foreach($roles as $id => $role)
                    <option value="{{$id}}"
                    {{$id == $user->role ? 'selected' : ''}}
                    >{{$role}}</option>
                    @endforeach
                  </select>
                </div>


                <div class="form-group w-50">
                  <input type="hidden" name="user_id" value="{{ $user->id }}">
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
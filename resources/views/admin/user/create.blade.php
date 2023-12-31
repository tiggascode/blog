@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">

              <form action="{{ route('admin.user.store')}}" method="POST" class="w-25">
                @csrf
                <!-- name -->
                  <div class="form-group">
                     <input type="text" class="form-control"  name="name" placeholder="User Name">
                     @error('name')
                      <div class="text-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <!-- email -->
                  <div class="form-group">
                     <input type="email" class="form-control"  name="email" placeholder="Email">
                     @error('email')
                      <div class="text-danger">{{ $message }}</div>
                     @enderror
                  </div>

                  <!-- role select -->
                  <div class="form-group w-50">
                    <label>Select Role</label>
                        <select name="role"  class="form-control">
                          @foreach($roles as $id => $role)
                          <option value="{{ $id }}"
                          {{ $id == old('role') ? 'selected' : '' }}
                          >{{ $role }}</option>
                          @endforeach
                        </select>
                        @error('role')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                  </div>
                  <!-- Submit button -->
                  <input type="submit" class="btn btn-primary" value="create">
              </form>  

          </div>
      </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
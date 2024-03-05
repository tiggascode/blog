 @extends('admin.layouts.main')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
  @section('headerH1')
  Create Post
  @endsection
  @section('headerLi')
  <a href="{{ route('admin.post.index') }}">Posts</a>  /  Create post
  @endsection
    <!-- /.content-header -->

    <!-- Main content -->
    
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-1">
            <a href="{{ route ('admin.post.index')}}" class="btn btn-block btn-primary">Back</a>
          </div>
          <div class="col-12"> 
            <form  action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data" >
              @csrf
              <div class="form-group w-25">
                <label for="title">Title</label>
                <input  type="text" class="form-control" id="title" name="title" placeholder="title">
                @error('title')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
              <textarea id="summernote" name="content"></textarea>
              @error('content')
              <span class="text-danger">{{$message}}</span>
              @enderror
              </div>
              <div class="form-group w-50">
                    <label >Input Preview</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="preview_image">
                        <label class="custom-file-label" >Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                    @error('preview_image')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group w-50">
                    <label >Input Main</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="main_image">
                        <label class="custom-file-label" >Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                    @error('main_image')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group w-50">
                  <label>Category</label>
                  <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}"
                    {{$category->id == old('category_id') ? 'selected' : ''}}
                    >{{$category->title}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group w-50" >
                  <label>Tags</label>
                  <select class="select2"  name="tag_ids[]" multiple="multiple" data-placeholder="Select a Tag" style="width: 100%;" >
                    @foreach($tags as $tag)
                    <option
                    {{ is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected' : ''}} 
                    value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                  </select>
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
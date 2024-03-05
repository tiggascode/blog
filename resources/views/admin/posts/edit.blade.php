 @extends('admin.layouts.main')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
 @section('headerH1')
  Edit "{{$post->title}}" 
  @endsection
  @section('headerLi')
  <a href="{{ route('admin.post.index') }}">Posts</a>  /  <a href="{{ route('admin.post.show', $post->id) }}">{{$post->title}}</a>  /  Edit
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
            <form  action="{{route('admin.post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('patch')
              <div class="form-group w-25">
                <label for="title">Title</label>
                <input value="{{$post->title}}"  type="text" class="form-control" id="title" name="title" placeholder="title">
                @error('title')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
              <textarea id="summernote" name="content">{{$post->content}}</textarea>
              @error('content')
              <span class="text-danger">{{$message}}</span>
              @enderror
              </div>
              <div class="form-group w-50">
                    <label >Input Preview</label>
                    <div class="w-25 mb-2">
                      <img src="{{ asset('storage/'.$post->preview_image)}}" class="w-50">
                    </div>
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
                    <div class="w-25 mb-2">
                      <img src="{{asset('storage/'. $post->main_image)}}" class="w-50">
                    </div>
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
                    {{$category->id == $post->category_id ? 'selected' : ''}}
                    >{{$category->title}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group w-50" >
                  <label>Tags</label>
                  <select class="select2"  name="tag_ids[]" multiple="multiple" data-placeholder="Select a Tag" style="width: 100%;" >
                    @foreach($tags as $tag)
                    <option
                    {{ is_array( $post->tags->pluck('id')->toArray() ) && in_array( $tag->id , $post->tags->pluck('id')->toArray() ) ? 'selected' : ''}} 
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
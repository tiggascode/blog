 @extends('personal.layouts.main')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
 @section('headerH1')
Personal
  @endsection
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $likedPostsCount }}</h3>

                <p>Likes</p>
              </div>
              <div class="icon">
                <i class="fas fa-heart"></i>
              </div>
              <a href="{{ route('personal.liked.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$commentPostsCount}}</h3>

                <p>Comments</p>
              </div>
              <div class="icon">
                <i class=" fas fa-comment"></i>
              </div>
              <a href="{{ route('personal.comment.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
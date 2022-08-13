@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-sticky-note"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Post</span>
                        <span class="info-box-number">
                            {{ $post }}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-th"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Category</span>
                        <span class="info-box-number">{{ $category }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tags"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Tag</span>
                        <span class="info-box-number">{{ $tags }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Subscription</span>
                        <span class="info-box-number">{{ $subscription }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Latest 10 Post</h3>
                            <a href="{{ route('post.index') }}" class="btn btn-success">View Post</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>User</th>
                                    <th>Category</th>
                                    <th>Tag</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @if ($posts->count() > 0)
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post['id'] }}</td>
                                    <td><img src="{{ asset('images') }}/{{ $post->image }}" alt="" width="48px"
                                            class="img-thumbnail"></td>
                                    <td>{{ $post['title'] }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>
                                        @foreach ($post->tags as $tag)
                                        <span class="badge badge-info">{{ $tag->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ $post['status'] == 1 ? 'Pending' : 'Publish' }}</td>
                                    <td>{{ $post->created_at->diffForHumans() }}</td>
                                    <td>

                                        <form action="{{ route('post.destroy',$post->id) }}" method="post">
                                            <a href="{{ route('post.edit',$post['id']) }}" class="btn btn-info">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            @else
                            <h1 class="text-danger text-center">No Post avaiable here.</h1>
                            @endif
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.row -->
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
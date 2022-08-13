@extends('layouts.admin')

@section('title', 'Post')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Post List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Post List</li>
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Post List</h3>
                            <a href="{{ route('post.create') }}" class="btn btn-primary">Create Post</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        @if ($msg = Session::get('success'))
                        <div class="row">
                            <div class="col-12 col-lg-6 offset-lg-3  col-md-4 offset-md-4">
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                                    {{ $msg }}
                                </div>
                            </div>
                        </div>
                        @endif
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
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
@extends('layouts.admin')

@section('title', 'Tag')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tag List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Tag List</li>
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
                            <h3 class="card-title">Tag List</h3>
                            <a href="{{ route('tag.create') }}" class="btn btn-primary">Create Tag</a>
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
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Post Count</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tags as $tag)
                                <tr>
                                    <td>{{ $tag['id'] }}</td>
                                    <td>{{ $tag['name'] }}</td>
                                    <td>{{ $tag['slug'] }}</td>
                                    <td>{{ $tag->posts->count() }}</td>
                                    <td>

                                        <form action="{{ route('tag.destroy',$tag->id) }}" method="post">
                                            <a href="{{ route('tag.edit',$tag['id']) }}" class="btn btn-info">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
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
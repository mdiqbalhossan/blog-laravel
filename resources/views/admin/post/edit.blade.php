@extends('layouts.admin')

@section('title', 'Edit Post')

@push('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/summernote/summernote-bs4.min.css">
@endpush

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Post</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post List</a></li>
                    <li class="breadcrumb-item active">Edit Post</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <form action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            <div class="row">

                <div class="col-lg-8 col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Edit Post</h3>
                        </div>
                        @include('includes.error')

                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Title:</label>
                                <input type="text" name="title" class="form-control" id="name"
                                    value="{{ $post->title }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea id="summernote" name="body">{{ $post->body }}</textarea>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </div>
                    <!-- /.card -->
                </div>

                {{-- Second Column --}}
                <div class="col-lg-4 col-md-12">
                    <div class="row">
                        {{-- Category and status --}}
                        <div class="col-12">
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Add Category</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="category" data-placeholder="Select Category"
                                            class="form-control select2bs4" style="width: 100%;">
                                            @foreach ($categories as $cat)
                                            <option {{ $post->category_id == $cat->id ? 'selected':'' }} value="{{
                                                $cat->id
                                                }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" data-placeholder="Select Status"
                                            class="form-control select2bs4" style="width: 100%;">
                                            <option {{ $post->status == 1 ? 'selected' : '' }} value="1">Pending
                                            </option>
                                            <option {{ $post->status == 2 ? 'selected' : '' }} value="2">Publish
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Tag Section --}}
                        <div class="col-12">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Add Tag</h3>
                                </div>
                                <div class="card-body">
                                    @foreach ($post->tags as $tag)
                                    <span class="badge badge-info">{{ $tag->name }}</span>
                                    @endforeach
                                    <div class="form-group">
                                        <label>Tags</label>
                                        <select class="select2" name="tags[]" multiple="multiple"
                                            data-placeholder="Select tag" style="width: 100%;">
                                            @foreach ($tags as $tag)
                                            <option value="{{$tag->id}}">{{$tag->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- Featured Image --}}
                        <div class="col-12">
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Featured Image</h3>
                                </div>
                                <div class="card-body">
                                    <img src="{{ asset('images') }}/{{ $post->image }}" alt="" width="100px"
                                        class="img-thumbnail">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Upload Featured Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input name="image" type="file" class="custom-file-input"
                                                    id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </form>
    </div>
    <!-- /.content -->
</div>
@endsection

@push('scripts')
<!-- Select2 -->
<script src="{{ asset('admin') }}/plugins/select2/js/select2.full.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('admin') }}/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        // Summernote
        $('#summernote').summernote({
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        })
    })
</script>
@endpush
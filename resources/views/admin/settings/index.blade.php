@extends('layouts.admin')

@section('title', 'Setting')

@push('css')
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
@endpush

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Setting</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Setting</li>
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
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-edit"></i>
                            Website Settings
                        </h3>
                    </div>
                    <div class="card-body">
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
                        <div class="row">
                            <div class="col-5 col-sm-3">
                                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill"
                                        href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home"
                                        aria-selected="true"><i class="fab fa-chrome"></i> &nbsp;Site Setting</a>
                                    <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill"
                                        href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile"
                                        aria-selected="false"><i class="fas fa-font"></i> &nbsp;Footer Setting</a>
                                    <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill"
                                        href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages"
                                        aria-selected="false"><i class="fas fa-sliders-h"></i> &nbsp; Sidebar
                                        Setting</a>
                                    <a class="nav-link" id="vert-tabs-user-tab" data-toggle="pill"
                                        href="#vert-tabs-user" role="tab" aria-controls="vert-tabs-user"
                                        aria-selected="false"><i class="fas fa-user-edit"></i>&nbsp;User Setting</a>
                                </div>
                            </div>
                            <div class="col-7 col-sm-9">
                                <div class="tab-content" id="vert-tabs-tabContent">
                                    {{-- Site Setting --}}
                                    <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel"
                                        aria-labelledby="vert-tabs-home-tab">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <form method="post" action="{{ route('admin.setting.site_update') }}"
                                                    enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Upload
                                                            Logo</label>
                                                        <div class="col-sm-10">
                                                            <div class="custom-file">
                                                                <input type="file" name="logo" class="custom-file-input"
                                                                    id="customFile">
                                                                <label class="custom-file-label" for="customFile">Choose
                                                                    file</label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Site
                                                            Title</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputEmail3"
                                                                value="{{ $settings->site_title }}" name="site_title">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Site
                                                            Description</label>
                                                        <div class="col-sm-10">
                                                            <textarea class="form-control" name="description" rows="3"
                                                                placeholder="Enter ...">{{ $settings->description }}</textarea>
                                                        </div>
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-info float-right">Update</button>
                                                </form>
                                            </div>
                                            <div class="col-sm-4">
                                                <img src="{{ asset($settings->logo) }}" alt=""
                                                    class="img-fluid img-responsive img-thumbnail" width="100px">
                                            </div>
                                        </div>

                                    </div>
                                    {{-- Footer Setting --}}
                                    <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel"
                                        aria-labelledby="vert-tabs-profile-tab">
                                        <form action="{{ route('admin.setting.footer_update') }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="inputEmail3">About Us Text</label>
                                                        <textarea class="form-control" rows="11" placeholder="Enter ..."
                                                            name="about_us">{{ $settings->about_us }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3">Copyright Text</label>
                                                        <input type="text" class="form-control" id="inputEmail3"
                                                            value="{{ $settings->copyright_text }}"
                                                            name="copyright_text">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="inputEmail3">Facebook Link</label>
                                                        <input type="text" class="form-control" id="inputEmail3"
                                                            placeholder="Site Title"
                                                            value="{{ $settings->facebook_link }}" name="facebook_link">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3">Twitter Link</label>
                                                        <input type="text" class="form-control" id="inputEmail3"
                                                            placeholder="Site Title"
                                                            value="{{ $settings->twitter_link }}" name="twitter_link">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3">Github Link</label>
                                                        <input type="text" class="form-control" id="inputEmail3"
                                                            placeholder="Site Title"
                                                            value="{{ $settings->github_link }}" name="github_link">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3">Feed Link</label>
                                                        <input type="text" class="form-control" id="inputEmail3"
                                                            placeholder="Site Title" value="{{ $settings->feed_link }}"
                                                            name="feed_link">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3">Email</label>
                                                        <input type="text" class="form-control" id="inputEmail3"
                                                            value="{{ $settings->email }}" name="email">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-info float-right">Update</button>
                                        </form>
                                    </div>
                                    {{-- Sidebar Setting --}}
                                    <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel"
                                        aria-labelledby="vert-tabs-messages-tab">
                                        <form action="{{ route('admin.setting.sidebar_update') }}" method="POST">
                                            @csrf
                                            <div class="form-group clearfix">
                                                <div class="icheck-primary d-inline">
                                                    <input type="checkbox" value="1" id="checkboxPrimary1"
                                                        name="author_bio" {{ $settings->author_bio == 1 ? 'checked' : ''
                                                    }}>
                                                    <label for="checkboxPrimary1"> Author Bio Enable</label>
                                                </div>
                                            </div>
                                            <div class="form-group clearfix">
                                                <div class="icheck-primary d-inline">
                                                    <input type="checkbox" value="1" id="checkboxPrimary2"
                                                        name="popular_post" {{ $settings->popular_post == 1 ? 'checked'
                                                    : '' }}>
                                                    <label for="checkboxPrimary2"> Popular Post Enable</label>
                                                </div>
                                            </div>
                                            <div class="form-group clearfix">
                                                <div class="icheck-primary d-inline">
                                                    <input type="checkbox" value="1" id="checkboxPrimary3"
                                                        name="category" {{ $settings->category == 1 ? 'checked' : '' }}>
                                                    <label for="checkboxPrimary3"> Category Section Enable</label>
                                                </div>
                                            </div>
                                            <div class="form-group clearfix">
                                                <div class="icheck-primary d-inline">
                                                    <input type="checkbox" value="1" id="checkboxPrimary4" name="tags"
                                                        {{ $settings->tags == 1 ? 'checked' : '' }}>
                                                    <label for="checkboxPrimary4"> Tag Section Enable</label>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-info float-right">Update</button>
                                        </form>
                                    </div>

                                    {{-- User Setting --}}
                                    <div class="tab-pane text-left fade show" id="vert-tabs-user" role="tabpanel"
                                        aria-labelledby="vert-tabs-user-tab">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <form method="post" action="{{ route('admin.setting.user_update') }}"
                                                    enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Upload
                                                            Avater</label>
                                                        <div class="col-sm-10">
                                                            <div class="custom-file">
                                                                <input type="file" name="avatar"
                                                                    class="custom-file-input" id="customFile">
                                                                <label class="custom-file-label" for="customFile">Choose
                                                                    file</label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3"
                                                            class="col-sm-2 col-form-label">Name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputEmail3"
                                                                value="{{ $user->name }}" name="name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3"
                                                            class="col-sm-2 col-form-label">Email</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputEmail3"
                                                                value="{{ $user->email }}" name="email">
                                                        </div>
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-info float-right">Update</button>
                                                </form>
                                            </div>
                                            <div class="col-sm-4">
                                                <img src="{{ asset($user->avatar) }}" alt=""
                                                    class="img-fluid img-responsive img-thumbnail" width="100px">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
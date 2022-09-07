@extends('admin.app')
@section('title') Edit Status @endsection
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('backend/js/plugins/dropzone/dist/min/dropzone.min.css') }}"/>
@endsection
@section('content')
<div class="app-title">
<div>
<h1><i class="fa fa-shopping-bag"></i> Edit Status</h1>
</div>
</div>
@include('admin.partials.flash')
<div class="row user">
<div class="col-md-3">
<div class="tile p-0">
<ul class="nav flex-column nav-tabs user-tabs">
<li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
<li class="nav-item"><a class="nav-link" href="#images" data-toggle="tab">Images</a></li>
</ul>
</div>
</div>
<div class="col-md-9">
<div class="tab-content">
<div class="tab-pane active" id="general">
<div class="tile">
<form action="{{ route('admin.statuses.update') }}" method="POST" role="form">
    @csrf
    @foreach($statuses as $status)
    <h3 class="tile-title">status Information</h3>
    <hr>
    <div class="tile-body">
        <div class="form-group">
            <label class="control-label" for="lesson_type">Lesson Type</label>
            <input
                class="form-control @error('lesson_type') is-invalid @enderror"
                type="text"
                placeholder="Enter attribute Lesson Type"
                id="lesson_type"
                name="lesson_type"
                value="{{ old('lesson_type', $status->lesson_type) }}" readonly/>
            <input type="hidden" name="id" value="{{ $status->id }}">
            <div class="invalid-feedback active">
                <i class="fa fa-exclamation-circle fa-fw"></i> @error('lesson_type') <span>{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="control-label" for="name">Name</label>
            <input
                class="form-control @error('name') is-invalid @enderror"
                type="text"
                placeholder="Enter attribute name"
                id="name"
                name="name"
                value="{{ old('name', $status->name) }}"
            />
            <div class="invalid-feedback active">
                <i class="fa fa-exclamation-circle fa-fw"></i> @error('name') <span>{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label" for="order_index">Order Index</label>
                    <input
                        class="form-control @error('order_index') is-invalid @enderror"
                        type="text"
                        placeholder="Enter status Order Index"
                        id="order_index"
                        name="order_index"
                        value="{{ old('order_index', $status->order_index) }}"
                    />
                    <div class="invalid-feedback active">
                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('order_index') <span>{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label" for="color">Color</label>
                    <input
                        class="form-control @error('color') is-invalid @enderror"
                        type="text"
                        placeholder="Enter status Color"
                        id="color"
                        name="color"
                        value="{{ old('color', $status->color) }}"
                    />
                    <div class="invalid-feedback active">
                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('color') <span>{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="color_alt_1">Color Alt 1</label>
                        <input
                            class="form-control @error('color_alt_1') is-invalid @enderror"
                            type="text"
                            placeholder="Enter status Color Alt 1"
                            id="color_alt_1"
                            name="color_alt_1"
                            value="{{ old('color_alt_1', $status->color_alt_1) }}"
                        />
                        <div class="invalid-feedback active">
                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('color_alt_1') <span>{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="color_alt_2">Color Alt 2</label>
                        <input
                            class="form-control @error('color_alt_2') is-invalid @enderror"
                            type="text"
                            placeholder="Enter status Color Alt 2"
                            id="color_alt_2"
                            name="color_alt_2"
                            value="{{ old('color_alt_2', $status->color_alt_2) }}"
                        />
                        <div class="invalid-feedback active">
                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('color_alt_2') <span>{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="default">Default</label>
                        <input
                            class="form-control @error('default') is-invalid @enderror"
                            type="text"
                            placeholder="Enter status Default"
                            id="default"
                            name="default"
                            value="{{ old('default', $status->default) }}"
                        />
                        <div class="invalid-feedback active">
                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('default') <span>{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="tile-footer">
        <div class="row d-print-none mt-2">
            <div class="col-12 text-right">
                <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update status</button>
                <a class="btn btn-danger" href="{{ route('admin.statuses.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
            </div>
        </div>
    </div>
    @endforeach
</form>
</div>
</div>
<div class="tab-pane" id="images">
<div class="tile">
<h3 class="tile-title">Upload Image</h3>
<div class="tile-body">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.statuses.upload') }}"  method="POST" enctype="multipart/form-data">
            <input type="file" name="icon_url"  class="form-control" style="height:100px;border: 2px dashed rgba(0,0,0,0.3)">
            @foreach($statuses as $status)
                <input type="hidden" name="id" value="{{ $status->id }}">
            @endforeach
                {{ csrf_field() }}
           
        </div>
    </div>
    <div class="row d-print-none mt-2">
           @foreach($statuses as $status)
            <img src="{{asset('images/'.$status->icon_url) }}" style="float:left;height:100px;width:100px" id="brandLogo" class="img-fluid" alt="{{asset('images/'.$status->icon_url) }}">
            @endforeach
        <div class="col-12 text-right">
            <button class="btn btn-success" type="submit" id="uploadButton">
                <i class="fa fa-fw fa-lg fa-upload"></i>Upload Images
            </button>
        </div>
    </div>
    </form>
   
        <hr>
      
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
@push('scripts')
<script type="text/javascript" src="{{ asset('backend/js/plugins/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/plugins/dropzone/dist/min/dropzone.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/plugins/bootstrap-notify.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/app.js') }}"></script>
<script>
</script>
@endpush

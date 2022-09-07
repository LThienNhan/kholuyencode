@extends('admin.app')
@section('title') Create Status @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-briefcase"></i> Create Status</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">Create Status</h3>
                <form action="{{ route('admin.statuses.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="lesson_type">Lesson Type <span class="m-l-5 text-danger"> *</span></label>
                            <select class="form-control" name='lesson_type'>
                            <option value="masterable">Masterable</option>
                            <option value="ongoing">Ongoing</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="order_index">Order Index <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('order_index') is-invalid @enderror" type="number" name="order_index" id="order_index" value="{{ old('order_index') }}"/>
                            @error('order_index') {{ $message }} @enderror
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="default">Default <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('default') is-invalid @enderror" type="number" name="default" id="default" value="{{ old('default') }}"/>
                            @error('default') {{ $message }} @enderror
                        </div>
                        </div>
                        </div>
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="color">Color <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('color') is-invalid @enderror" type="text" name="color" id="color" value="{{ old('color') }}"/>
                            @error('color') {{ $message }} @enderror
                        </div>
                        </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="color_alt_1">Color Alt 1 <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('color_alt_1') is-invalid @enderror" type="text" name="color_alt_1" id="color_alt_1" value="{{ old('color_alt_1') }}"/>
                            @error('color_alt_1') {{ $message }} @enderror
                        </div>
                        </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="color_alt_2">Color Alt 2 <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('color_alt_2') is-invalid @enderror" type="text" name="color_alt_2" id="color_alt_2" value="{{ old('color_alt_2') }}"/>
                            @error('color_alt_2') {{ $message }} @enderror
                        </div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Status</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.statuses.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush

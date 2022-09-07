@extends('admin.app')
@section('title') Schools @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> Schools</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th> ID</th>
                            <th> Name </th>
                            <th class="text-center">Amount Kis</th>
                            <th class="text-center"> Amount Class </th>
                            <th class="text-center"> Amount Teacher </th>
                            <th class="text-center"> Amount Parent </th>
                            <th class="text-center"> Amount Lesson</th>
                            <th class="text-center"> Amount Images </th>
                            <th class="text-center"> Amount Video </th>
                            <th class="text-center"> Amount activite </th>
                            <th class="text-center"> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($schools as $shool)
                                <tr>
                                    <td>{{ $shool->id }}</td>
                                    <td>{{ $shool->name }}</td>                                
                                    <td>{{$kid ?? 0}}</td>                                
                                    <td>{{$class ?? 0}}</td>   
                                    <td>{{$teacher ?? 0}}</td>                                 
                                    <td>{{$parent ?? 0}}</td>
                                    <td>{{$lesson ?? 0}}</td>
                                    <td>{{$img ?? 0}}</td>
                                    <td>{{$video ?? 0}}</td>
                                    <td>{{$activite ?? 0}}</td>
                                    <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('admin.statuses.index') }}" class="btn btn-sm btn-primary">Statuses</i></a>
                                    </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush

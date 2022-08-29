@extends('admin.app')
@section('title') Statuses @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> Statuses</h1>
        </div>
        <a href="{{ route('admin.statuses.create') }}" class="btn btn-primary pull-right">Add Status</a>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                <form action="{{ route('admin.statuses.save') }}" method="POST" role="form">
                @csrf
                    <button class="btn btn-primary pull-right" type="submit">Save</button>
                    <table class="table table-hover table-bordered" >
                        <thead>
                        <tr>
                            <th> ID</th>
                            <th> Lesson Type </th>
                            <th class="text-center"> Name</th>
                            <th class="text-center"> Order Index </th>
                            <th class="text-center"> Color </th>
                            <th class="text-center"> Color Alt 1 </th>
                            <th class="text-center"> Color Alt 2</th>
                            <th class="text-center"> Default </th>
                            <th class="text-center"> Created</th>
                            <th class="text-center"> Updated </th>
                            <th class="text-center"> Deleted </th>
                            <th class="text-center"> Icon </th>
                            <th class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($statuses as $status)                    
                            <tr>
                                <td class="text-center">{{$status->id }}</td>
                                <td class="text-center">{{$status->lesson_type }}</td>                                
                                <td class="text-center">{{$status->name}}</td>                                
                                <td class="text-center"><input type="number" style="width:50px" value="{{ old('order_index', $status->order_index) }}" name="order_index[{{$status->id}}]"></td>   
                                <td class="text-center">{{$status->color}}</td>                                 
                                <td class="text-center">{{$status->color_alt_1}}</td>
                                <td class="text-center">{{$status->color_alt_2}}</td>
                                <td class="text-center">{{$status->default}}</td>
                                <td class="text-center">{{$status->created_at}}</td>
                                <td class="text-center">{{$status->updated_at}}</td>
                                <td class="text-center">{{$status->deleted_at}}</td>
                                <td class="text-center">{{$status->icon_url}}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                    <a href="{{ route('admin.statuses.edit', $status->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('admin.statuses.delete', $status->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                    <form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <script>
        console.log('oooo');
    </script>
@endpush

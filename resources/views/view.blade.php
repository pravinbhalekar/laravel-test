@extends('index') 
@section('title')View User @endsection 
@section('content')
<div class="container">
    <h3 class="text-center">View User</h3>
    <br />

    <div class="row">
        <div class="col-md-12">
            
            <table class="table table-bordered table-responsive" id="UserTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Mobile Number</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Qualification</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($UserData as $rows)
                        <tr>
                            <td>{{$rows->name}}</td>
                            <td>{{$rows->mno}}</td>
                            <td>{{$rows->email}}</td>
                            <td>{{$rows->userdetails['gender']==1 ? 'Male' : 'Female'}}</td>
                            <td>{{$rows->userdetails['qualification']}}</td>
                            <td>
                                <a href="#" title="Edit" data-id="{{encrypt($rows->id)}}" class="editUser"><i class="fa fa-pencil"></i></a> &nbsp;
                                <a href="#" title="Delete" data-name="{{$rows->name}}" data-id="{{encrypt($rows->id)}}" class="deleteUser"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach    
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('modals')
@endsection 
@push('css') 
<link rel="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    div#UserTable_filter,#UserTable_paginate {
    float: right;
}

label.error {
    color: red;
    float: left;
    width: 100%;
    padding-top:6px;
    font-size: 12px;
}
</style>
@endpush 
@push('js') 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="{{asset('js/edit-user.js')}}"></script>
<script>


</script>
@endpush

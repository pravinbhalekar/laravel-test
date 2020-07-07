@extends('index') @section('title')Add User @endsection 
@section('content')
<div class="container">
    <h3 class="text-center">Add User</h3>
    <br />
    <form id="UserForm" autocomplete="off">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="pwd">Name </label>
                    <input type="text" name="name" placeholder="Name" class="form-control"/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="pwd">Mobile Number </label>
                    <input type="text" name="mno" placeholder="Mobile Number" class="form-control" maxlength="10"/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="pwd">Email </label>
                    <input type="email" name="email" placeholder="Email" class="form-control"/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="pwd">Birthdate </label>
                    <input type="date" name="birth_date" placeholder="Email" class="form-control"/>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="pwd">Gender </label>
                    <select name="gender" class="form-control">
                        <option value="">Select</option>
                        <option value="{{encrypt(1)}}">Male</option>
                        <option value="{{encrypt(2)}}">Famale</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="pwd">Qualification </label>
                    <input type="text" name="qualification" placeholder="Qualification" class="form-control"/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="pwd">Salary </label>
                    <input type="text" name="salary" placeholder="Salary" class="form-control"/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="pwd">Address </label>
                    <textarea name="address" placeholder="Address" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <button type="submit" id="submitBtn" name="button" class="btn">Submit</button>
            </div>
        </div>
        <br>
        <p id="message"></p>
    </form>
</div>
@endsection 
@push('css') 
<style>
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
<script src="{{asset('js/add-user.js')}}"></script>

@endpush

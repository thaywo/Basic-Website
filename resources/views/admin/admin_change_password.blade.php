@extends('admin.admin_master')
@section('title', 'Admin Profile')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


<h4 class="card-title">Change Password</h4><br>
@if (count($errors))
    @foreach ($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
@endif
<form method="post" action="{{ route('store.password') }}">
    @csrf
        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
            <div class="col-sm-10">
                <input class="form-control" type="password" name="oldpassword" id="password" value="" placeholder="Old Password" id="oldpassword">
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
            <div class="col-sm-10">
                <input class="form-control" type="password" name="newpassword" id="newpassword" value="" placeholder="New Password">
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Confirm New Password</label>
            <div class="col-sm-10">
                <input class="form-control" type="password" name="confirm_password" id="confirm_password" value="" placeholder="Confirm New Password">
            </div>
        </div>


        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
        <input type="submit" class="btn btn-primary btn-lg waves-effect waves-light" value="Change Password">
    </form>
    </div>

</div>
</div>
</div>
</div>
</div>

@endsection

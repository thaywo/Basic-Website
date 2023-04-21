@extends('admin.admin_master')
@section('title', 'Admin Profiel')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <br>
                    <center>
                    <img class="rounded-circle avatar-xl" alt="200x200" src="{{ asset('backend/assets/images/small/img-5.jpg') }}" data-holder-rendered="true">
                </center>
              <div class="card-body">
               <h4 class="card-title">Name: {{$adminData->name }}</h4>
               <hr>
               <h4 class="card-title">Email: {{$adminData->email }}</h4>
               <hr>
               <h4 class="card-title">Username: {{$adminData->username }}</h4>
               <hr>
               <a href="#" class="btn btn-info btn-rounded waves-effect waves-light">Edit Profile</a>
             </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

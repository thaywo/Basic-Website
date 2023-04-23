@extends('admin.admin_master')
@section('title', 'Admin Profile')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


<h4 class="card-title">Edit Profile Page</h4>
<form method="post" action="{{ route('store.profile') }}"  enctype="multipart/form-data">
    @csrf
        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="name" id="name" value="{{ $userEdit->name }}" placeholder="Artisanal kale" id="example-text-input">
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="username" id="username" value="{{ $userEdit->username }}" placeholder="Artisanal kale" >
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input class="form-control" type="email" name="email" id="email"  value="{{ $userEdit->email }}" placeholder="Artisanal kale" >
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
            <div class="col-sm-10">
                <input class="form-control" type="file" name="profile_image" id="profile_image" placeholder="Profile_image" >
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label"></label>

           <div class="col-sm-10">
            <img class="round avatar-lg" alt="200x200" src="{{ (!empty($userEdit->profile_image))? url('upload/admin_images/'.$userEdit->profile_image) : url('logo/no_image.jpg')  }}" id="show_profile_image" data-holder-rendered="true">

        </div>
        </div>

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
        <input type="submit" class="btn btn-primary btn-lg waves-effect waves-light" value="Update Profile">
    </form>
    </div>

</div>
</div>
</div>
</div>
</div>

<script>
  $(document).ready(function(){
    $('#profile_image').change(function(e){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#show_profile_image').attr('src',e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });
  });
</script>
@endsection

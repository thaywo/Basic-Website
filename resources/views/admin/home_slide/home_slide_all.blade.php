@extends('admin.admin_master')
@section('title', 'Home Slide')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


<h4 class="card-title">Home Slide</h4>
<form method="post" action="{{ route('update.slide') }}"  enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="id" value="{{ $homeslide->id }}">
        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="title" id="title" value="{{ $homeslide->title }}" placeholder="Title" >
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="description" id="description" value="{{ $homeslide->description }}" placeholder="Description" >
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Video URL</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="video_url" id="video_url" value="{{ $homeslide->video_url }}" placeholder="Video URL" >
            </div>
        </div>


        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Home Slide</label>
            <div class="col-sm-10">
                <input class="form-control" type="file" name="home_slide" id="home_slide"  value="{{ (!empty($homeslide->home_slide))? url('upload/admin_images/'.$homeslide->home_slide) : url('logo/no_image.jpg')  }}" placeholder="Home Slide" >
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label"></label>

           <div class="col-sm-10">
            <img class="round avatar-lg" alt="200x200" src="{{ (!empty($homeslide->home_slide))? url( $homeslide->home_slide ) : url('logo/no_image.jpg')  }}" id="show_home_slide" data-holder-rendered="true">

        </div>
        </div>

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
        <input type="submit" class="btn btn-primary btn-lg waves-effect waves-light" value="Update Slide">
    </form>
    </div>

</div>
</div>
</div>
</div>
</div>

<script>
  $(document).ready(function(){
    $('#home_slide').change(function(e){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#show_home_slide').attr('src',e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });
  });
</script>
@endsection

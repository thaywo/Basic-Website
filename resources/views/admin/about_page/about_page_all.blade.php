@extends('admin.admin_master')
@section('title', 'Home About')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


<h4 class="card-title">Home Slide</h4>
<form method="post" action="{{ route('about.store') }}"  enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="id" value="{{ $homeabout->id }}">
        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="title" id="title" value="{{ $homeabout->title }}" placeholder="Title" >
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="short_title" id="short_title" value="{{ $homeabout->short_title }}" placeholder="Short Title" >
            </div>
        </div>


        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
            <div class="col-sm-10">
                <textarea required="" class="form-control" rows="5" name="short_description">{{ $homeabout->short_description }}</textarea>
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Long Description</label>
            <div class="col-sm-10">
                <textarea id="elm1" name="long_description">{{ $homeabout->long_description }}</textarea>
             </div>
        </div>

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
                <input class="form-control" type="file" name="image" id="image"  value="{{ (!empty($homeabout->image))? url('upload/admin_images/'.$homeabout->image) : url('logo/no_image.jpg')  }}" placeholder="Image" >
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label"></label>

           <div class="col-sm-10">
            <img class="round avatar-lg" alt="200x200" src="{{ (!empty($homeabout->image))? url( $homeabout->image ) : url('logo/no_image.jpg')  }}" id="show_about_image" data-holder-rendered="true">

        </div>
        </div>

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
        <input type="submit" class="btn btn-primary btn-lg waves-effect waves-light" value="Update About">
    </form>
    </div>

</div>
</div>
</div>
</div>
</div>

<script>
  $(document).ready(function(){
    $('#image').change(function(e){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#show_about_image').attr('src',e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });
  });
</script>
@endsection


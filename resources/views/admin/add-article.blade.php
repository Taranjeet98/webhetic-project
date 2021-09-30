@extends('layouts.admin-dashboard')
@section('content')
<div id="page-content-wrapper">
   <section class="maindiv">
      <div class="container">
         <div class="row headingtop">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
               <h2 class="textlog">Add New Article</h2>
            </div>
         </div>
         <div class="row">
            @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger text-center') }}">
               {{ Session::get('error') }}
            </p>
            @endif
            @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-success text-center') }}">
               {{ Session::get('success') }}
            </p>
            @endif
         </div>
         <form action="{{route('add_article')}}" name="profile_form" enctype='multipart/form-data' method="POST">
            @csrf
            <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-6 col-12">

                <div class="form-group">
                     <label>Title</label>
                     <input type="text" name="title" id="b_title" class="form-control" value="" required>
                  </div>
                  <div class="form-group">
                     <label>slug</label>
                     <input type="text" name="slug" id="b_slug" class="form-control" value="" required>
                  </div>
                  <div class="form-group">
                     <label>Sub Title</label>
                     <input type="text" name="sub_title" class="form-control" value="" required>
                  </div>


                  <div class="form-group" >
                     <label>Description  </label>
                     <textarea name="description" class="form-control"></textarea>
                  </div>
<input type="submit" name="" class="btn btn-primary ml-auto" value="Add Article">

        </div>
            </div>
         </form>
      </div>
   </section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script type="text/javascript">
	$("#b_title").on('keyup', function()
	{
		var theTitle = this.value.toLowerCase().trim();
		slugInput =$('#b_slug'),
		theSlug = theTitle.replace(/&/g,'-and-')
		.replace(/[^a-z0-9-]+/g,'-')
		.replace(/\-\-+/g,'-')
		.replace(/^-+|-+&/g,"");
		slugInput.val(theSlug);
	});
</script>


@endsection

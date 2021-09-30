@extends('layouts.admin-dashboard')
@section('content')
<div id="page-content-wrapper">
   <section class="maindiv">
      <div class="container">
         <div class="row headingtop">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
               <h2 class="textlog">Edit Article</h2>
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
         <form action="{{route('edit_article',$article->id)}}" name="profile_form" enctype='multipart/form-data' method="POST">
            @csrf
            <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                     <label>Title</label>
                     <input type="text" name="title" id="b_title" class="form-control" value="{{$article->title}}" required>
                  </div>

                  <div class="form-group">
                     <label>Sub Title</label>
                     <input type="text" name="sub_title" class="form-control" value="{{$article->sub_title}}" required>
                  </div>
					<div class="form-group">
                    	<label>slug</label>
                     	<input type="text" name="slug" id="b_slug" class="form-control" value="{{$article->slug}}" required>
                  </div>




				  <div class="form-group" >
                    <label>Description </label>
                    <textarea name="description" class="form-control">{{$article->description}}</textarea>
                  </div>
                  <input type="submit" name="" class="btn btn-primary ml-auto" value="Edit Article">
               </div>
            </div>
         </form>
      </div>
   </section>
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/mainscript.js') }}"></script>

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

<script>


 // vars
let result = document.querySelector('.result'),
img_result = document.querySelector('.img-result'),
img_w = document.querySelector('.img-w'),
img_h = document.querySelector('.img-h'),
options = document.querySelector('.options'),
save = document.querySelector('.save'),
cropped = document.querySelector('.cropped'),
dwn = document.querySelector('.download'),
upload = document.querySelector('#file-input'),
cropper = '';
//set_img = document.querySelector('.set_img');

// on change show image with crop options
upload.addEventListener('change', (e) => {
  if (e.target.files.length) {
    // start file reader
    const reader = new FileReader();
    reader.onload = (e)=> {
      if(e.target.result){
        // create new image
        let img = document.createElement('img');
        img.id = 'image';
        img.src = e.target.result
        // clean result before
        result.innerHTML = '';
        // append new image
        result.appendChild(img);
        // show save btn and options
        save.classList.remove('hide');
        options.classList.remove('hide');
        // init cropper
        cropper = new Cropper(img, {
			aspectRatio: 12 / 14,
		})
      }
    };
    reader.readAsDataURL(e.target.files[0]);
  }
});

// save on click
save.addEventListener('click',(e)=>{
  e.preventDefault();
  // get result to data uri
  let imgSrc = cropper.getCroppedCanvas({
    width: 357,
	height: 396,
  }).toDataURL();
  // remove hide class of img
  cropped.classList.remove('hide');
  img_result.classList.remove('hide');
  // show image cropped
  cropped.src = imgSrc;
  set_img.val = cropped.src;
  document.getElementById('set_img').value = cropped.src;
  //console.log(set_img.val);

  // dwn.classList.remove('hide');
  // dwn.download = 'imagename.png';
  // dwn.setAttribute('href',imgSrc);
});



    </script>
@endsection

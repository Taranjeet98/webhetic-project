@extends('layouts.admin-dashboard')

@section('content')
<div id="page-content-wrapper">
   <section class="maindiv">
      <div class="container">
         <div class="row headingtop">
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
               <h2 class="textlog">Dashboard</h2>
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

            <!-- calendar -->

         </div>
      </div>
   </section>
</div>
@endsection

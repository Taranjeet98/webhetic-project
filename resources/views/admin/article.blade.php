@extends('layouts.admin-dashboard')
@section('content')

<div id="page-content-wrapper">
   <section class="maindiv">
      <div class="container">
         <div class="row headingtop">
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
               <h2 class="textlog">Articles</h2>
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
         <div class="form-group d-flex">
            <a href="{{ route('add_article')}}" class="btn btn-primary ml-auto" >Add New Article</a>
         </div>
         <div class="card shadow mb-4">
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                        <tr>

                           <th>Name</th>
                           <th>Sub Title</th>
                           <th>Actions</th>
                        </tr>
                     </thead>

                     <tbody>
                       @foreach($article as $key)
                        <tr class="plan-">

                           <td>{{$key->title}}</td>

                           <td>{{$key->sub_title}}</td>

                           <td>
                              <a href="{{ route('edit_article',$key->id) }}" class="editbtn">Edit</a>
                              <a href="javascript:void(0);" data-id="{{$key->id}}" class="delete-btn">Delete</a>
                           </td>
                        </tr>
                         @endforeach
                     </tbody>
                  </table>
                  <form method="post" action="{{ route('delete_article')}}" id="del-form">
                  @csrf
                     <input type="hidden" name="article_id" id="id_property">
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>

@endsection

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
   </head>
   <body>
      <div >

            <div class="container-fluid">
               <div>
                     <button class="" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <p>{{ Auth::user()->name }}<p>
                     </button>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="/admin/profile">{{ Auth::user()->first_name }}</a>
                        <a class="dropdown-item" href="/admin/profile">Edit Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </nav>
         <div>
            <div>
               <div>
                  @if(Auth::check())
                     @if(Auth::user()->user_type == 'admin')
                        <a href="/">Dashboard</a>
                     @endif
                  @endif
               </div>
            </div>

            @yield('content')
         </div>
      </div>
      <div>
        <a href="{{ route('article') }}">Articles</a>
      </div>

   </body>
</html>

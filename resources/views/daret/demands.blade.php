


<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="../image/png" href="../images/logo-16x16.png" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Argon - Social Network</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Major+Mono+Display" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.1/css/boxicons.min.css' rel='stylesheet'>

    <!-- Styles -->
    <link href="../css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/components.css" rel="stylesheet">
    <link href="../css/media.css" rel="stylesheet">
    <script src="../js/load.js" type="text/javascript"></script>
</head>

<body>
  

{{-- @include('partials.nav') --}}
@auth
<form class="inline" method="POST" action="/logout">
    @csrf
    <button type="submit">
      <i class="fa-solid fa-door-closed"></i> Logout
    </button>
  </form>
@endauth

<div class="container-fluid" id="wrapper">
  <div class="row newsfeed-size">
      <div class="col-md-12 newsfeed-right-side">

          <div class="row newsfeed-right-side-content mt-3">
            @include('daret.ho')
              <div class="col-md-10 second-section" id="page-content-wrapper">
                @include('daret.head')
                  @if (session('msg'))
                  <div class="alert alert-success">
                  {{ session('msg') }}
                  </div>
                @endif
                @if ($daret->demandes->count()==0)
                  <h3 class="text-center">aucune demande</h3>
                @else
                <h3 class="text-center">les Demandes </h3>
                <table class="table">
                   <tr>
                   <th>#</th>
                   <th>name</th>
                   <th>username</th>
                   <th>email</th>
                   <th colspan="2">action</th>
                  
               </tr>
             
           
               @foreach ($daret->demandes  as $key => $demande)
               <tr>
                   <td>{{ $key + 1 }}</td>
                     
            <td>{{$demande->user->name}}</td>
            <td>{{$demande->user->username}}</td>
            <td>{{$demande->user->email}}</td>
            <td><a class="btn btn-primary" href="{{route('acceptdemand',[$daret,$demande->user])}}">accepter</a></td>
            <td><a class="btn btn-danger" href="{{route('destroydemand',[$demande])}}">supprimer</a></td>
               </tr>
               @endforeach
               
                </table>
                @endif
                 
                  
              </div>
          </div>
      </div>
  </div>
</div>



@include('partials.footer')
    <!-- Core -->
    <script src="../js/jquery/jquery-3.3.1.min.js"></script>
    <script src="../js/popper/popper.min.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>
    <!-- Optional -->
    <script type="text/javascript">
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

    </script>
    <script src="../js/app.js"></script>
    <script src="../js/components/components.js"></script>





</body>

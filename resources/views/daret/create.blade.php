


<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="../images/logo-16x16.png" />
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
    <script src="js/load.js" type="text/javascript"></script>
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

                
                  @if($errors->any())
                  <div class="alert alert-danger">
                      <h6>Errors:</h6>
                      <ul> @foreach($errors->all() as $error)
                          <li>{{$error}}</li>
                          @endforeach</ul>
                     
                  </div>
                  @endif
                  <!-- form daret -->
                  <form method="POST" action="{{route('store')}}">
                    @csrf
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Nom</label>
                      <input type="text"  name="nom" class="form-control" id="exampleFormControlInput1" >
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Montant</label>
                        <input type="text"  name="montant" class="form-control" id="exampleFormControlInput1" >
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">le nombre des personnes</label>
                        <input type="number"  name="nbr_per" class="form-control" id="exampleFormControlInput1" >
                      </div>


                    <div class="form-group">
                      <label for="test">le type de periode</label>
                      <select name="type_periode" class="form-control" id="test">
                        <option value="">select </option>Events
                        <option value="mois">mois</option>
                        <option value="semains">semains</option>
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="type_order">le type d'order</label>
                        <select name="type_order" class="form-control" id="test">
                          <option value="">select </option>
                          <option value="aléatoire">aléatoire</option>
                          <option value="manuellement">manuellement</option>
                        </select>
                      </div>
                    <input class="btn btn-primary" type="submit" name="" id="" value="Ajouter Daret">
                  </form>
                 
                </div>
                  
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

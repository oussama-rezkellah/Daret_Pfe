


<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="images/logo-16x16.png" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Argon - Social Network</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Major+Mono+Display" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.1/css/boxicons.min.css' rel='stylesheet'>

    <!-- Styles -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/components.css" rel="stylesheet">
    <link href="css/media.css" rel="stylesheet">
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
                  <!-- Groups -->
                  @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              @if (session('msg'))
              <div class="alert alert-success">
              {{ session('msg') }}
              </div>
            @endif
                  <div class="groups bg-white py-3 px-4 shadow-sm">
                      <div class="card-head d-flex justify-content-between">
                          <h5 class="mb-4">Suggested Groups</h5>
                          <a href="#" class="btn btn-link">See All</a>
                      </div>
                      <div class="row">
                       
                        @foreach ($darets as $daret)
                      
                       
                          <div class="col-md-3 col-sm-6">
                              <div class="card group-card shadow-sm">
                                  <img src="images/groups/group-1.png"
                                      class="card-img-top group-card-image" alt="Group image">
                                  <div class="card-body">
                                      <b>{{$daret->name}}</b>
                                      <p class="card-text">date de creation: <b>{{$daret->created_at->format('d-m-Y')}}</b> </p>
                                      <p class="card-text">le montant: <b>{{$daret->montant }}DH</b> </p>
  
                                      <p class="card-text">le nombre des personnes: <b>{{$daret->nbr_membre}}</b> </p>
                                      <p class="card-text">le nombre des personnes actualement: <b>{{$daret->membre->count() }}</b> </p>
                                      <p class="card-text">le nombre des personnes rester: <b>{{$daret->nbr_membre -$daret->membre->count()  }}</b> </p>
                                      <p class="card-text">le nombre des tours : <b>{{$daret->nbr_tour}}</b> </p>
                                      <p class="card-text">par : <b>{{$daret->type_periode}}</b> </p>
                                      <p class="card-text">order : <b>{{$daret->type_ordre}}</b> </p>
                                      <p class="card-text">l'etat de daret : <b>
                                           @if (($daret->etat==0) )
                                          pas encore
                                      @endif
                                      @if ($daret->etat==1)
                                      deja lancer
                                  @endif</b> </p>
                                      <p class="card-text"></p>
                                     
                                             @if ($daret->nbr_membre -$daret->membre->count() ==0)
                                             
                                                 <a href="{{route('joindaret',$daret)}}"  class="btn btn-secondary  disabled btn-quick-link border w-100" 
                                                 title="Dret pleine.">Join</a>
                                        @else
                                            
                                                  @if ($daret->demandes->count()!=0)
                                                     @foreach ($daret->demandes as $demande)
                                                  
                                                        @if ($demande->user->id==$user->id)
                                                          <a href="{{route('destroydemanduser',$demande)}}" class="btn btn-light btn-quick-link border w-100">annuler demande</a>
                                                        @elseif($demande->user->id!=$user->id)
                                                        <a  href="{{route('joindaret',$daret)}}" class="btn btn-primary btn-quick-link border w-100">Join</a>
                                                        
                                                         @endif
                                                      @endforeach
                                                    


                                                     @else
                                                        <a href="{{route('joindaret',$daret)}}" class="btn btn-primary btn-quick-link border w-100">Join</a>
                                                  @endif
                                                  @endif
                                                  
                                                  
                                  </div>
                              </div>
                          </div>

                          @endforeach
                        </div>
                  </div>
                
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>



@include('partials.footer')
    <!-- Core -->
    <script src="js/jquery/jquery-3.3.1.min.js"></script>
    <script src="js/popper/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- Optional -->
    <script type="text/javascript">
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

    </script>
    <script src="js/app.js"></script>
    <script src="js/components/components.js"></script>





</body>

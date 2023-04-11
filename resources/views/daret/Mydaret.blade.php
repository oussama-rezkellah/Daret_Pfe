


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
              <div class="col-md-2 newsfeed-left-side sticky-top shadow-sm" id="sidebar-wrapper">
                  <div class="card newsfeed-user-card h-100">
                      <ul class="list-group list-group-flush newsfeed-left-sidebar">
                          <li class="list-group-item">
                              <h6>Home</h6>
                          </li>
                         
                        <li class="list-group-item d-flex justify-content-between align-items-center sd-active">
                            <a href="groups.html" class="sidebar-item"><img
                                    src="../images/icons/left-sidebar/group.png" alt="group"> Groups</a>
                            <span class="badge badge-primary badge-pill">17</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="" class="sidebar-item"><img
                                    src="../images/icons/left-sidebar/event.png" alt="event"> Demands</a>
                            <span class="badge badge-primary badge-pill">3</span>
                        </li>
                      
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{route('indexinvit')}}" class="sidebar-item"><img
                                    src="../images/icons/left-sidebar/find-friends.png" alt="find-friends">
                                invitations</a>
                            <span class="badge badge-primary badge-pill"><i
                                    class='bx bx-chevron-right'></i></span>
                        </li>
                          
                         
                      </ul>
                  </div>
              </div>
              <div class="col-md-10 second-section" id="page-content-wrapper">
                  <div class="mb-3">
                      <div class="btn-group d-flex top-links-fg">
                          <a href="{{route('my_daret')}}" class="btn btn-quick-links mr-3 ql-active">
                              <img src="../images/icons/theme/group-white.png" class="mr-2"
                                  alt="quick links icon">
                              <span class="fs-8">Your Groups</span>
                          </a>
                          <a href="{{route('_daret')}}" class="btn btn-quick-links mr-3">
                              <img src="../images/icons/theme/rocket.png" class="mr-2" alt="quick links icon">
                              <span class="fs-8">Discover</span>
                          </a>
                          <a href="{{route('creer_daret')}}" class="btn btn-quick-links">
                              <img src="../images/icons/theme/create.png" class="mr-2" alt="quick links icon">
                              <span class="fs-8">Create</span>
                          </a>
                      </div>
                  </div>

                  <div class="jumbotron groups-banner">
                      <div class="container group-banner-content">
                          <h1 class="jumbotron-heading mt-auto"><img
                                  src="../images/icons/theme/group-white.png" class="mr-3"
                                  alt="Welcome to groups"> Daret</h1>
                          <p>Get latest active from your groups.</p>
                      </div>
                  </div>

                  <!-- Groups -->
                  <div class="groups bg-white py-3 px-4 shadow-sm">
                      <div class="card-head d-flex justify-content-between">
                          <h5 class="mb-4">Votre group</h5>
                          <a href="#" class="btn btn-link">See All</a>
                          </div>
                          <div class="row">
                   
                      @foreach ($membres as $membre)
                     
                      <div class="col-md-3 col-sm-6">
                        <div class="card group-card shadow-sm">
                            <img src="../images/groups/group-1.png"
                                class="card-img-top group-card-image" alt="Group image">
                            <div class="card-body">
                                <h5 class="card-title">{{$membre->daret->name}} 
                                  @if ($membre->role=='admin')<img src="../images/theme/verify.png" width="15px" class="verify" alt="Group verified">
                                  @endif </h5>
                                     
                                   
                                <p class="card-text">montant : <b> {{$membre->daret->montant}}</b></p>
                                <p class="card-text">etat: <b> 
                                  
                              @if ($membre->daret->etat==0)
                                  pas encore
                              @endif
                              @if ($membre->daret->etat==1)
                                  deja lancer
                              @endif
                              </b></p>
                              
                                <a href="{{route('show',$membre)}}" class="btn btn-quick-link join-group-btn border w-100">consulter</a>
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

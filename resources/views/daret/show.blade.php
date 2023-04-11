


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




                  
               
                  <div class="groups bg-white py-3 px-4 shadow-sm">
                      <div class="card-head d-flex justify-content-between">
                      
                          </div>
                          <div class="row">
                             <div class="col-md-3 col-sm-6">
                          </div>   
                          
                          <div class="container">
                            <div class="row justify-content-center">
                              <div class="col-md-8">
                                <div class="card">
                                  <div class="card-header">{{$membre->daret->name}}</div>
                                  <div class="card-body">
                                    <p class="card-text">date de creation: <b>{{$membre->daret->created_at->format('d-m-Y')}}</b> </p>
                                    <p class="card-text">le montant: <b>{{$membre->daret->montant }}DH</b> </p>

                                    <p class="card-text">le nombre des personnes: <b>{{$membre->daret->nbr_membre}}</b> </p>
                                    <p class="card-text">le nombre des personnes actualement: <b>{{$membre->daret->membre->count() }}</b> </p>
                                    <p class="card-text">le nombre des personnes rester: <b>{{$membre->daret->nbr_membre -$membre->daret->membre->count()  }}</b> </p>
                                    <p class="card-text">le nombre des tours : <b>{{$membre->daret->nbr_tour}}</b> </p>
                                    <p class="card-text">par : <b>{{$membre->daret->type_periode}}</b> </p>
                                    <p class="card-text">order : <b>{{$membre->daret->type_ordre}}</b> </p>
                                    <p class="card-text">l'etat de daret : <b>
                                         @if (($membre->daret->etat==0) )
                                        pas encore
                                    @endif
                                    @if ($membre->daret->etat==1)
                                    deja lancer
                                @endif</b> </p>
                                @foreach ($membre->daret->membre  as $mem)
                                   @if($mem->role== "admin")
                                      @if ($mem->user->username == $membre->user->username )
                                      <p class="card-text">createur : <b>moi</b> </p>     
                                      @else 
                                      <p class="card-text">createur : <b>{{$mem->user->username}}</b> </p>    
                                      @endif
                                  @endif
                                @endforeach
                            
                               
                                  </div>
                                </div>
                              </div>
                            </div>
                         
                            @if ($membre->role=='admin')
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
                            <form method="post" action="{{route('adduser',$membre->daret,)}}">
                                @csrf
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="user" placeholder="usename or email">
                                        <input type="submit" @if ($membre->daret->nbr_membre -$membre->daret->membre->count()==0)
                                            class="btn btn-secondary btn-lg ml-5" disabled 
                                              @else
                                             class="btn btn-lg btn-primary ml-5" @endif value="add user"/>
                            
                                    </div>
                                </div>
                            </form>

                             <button type="button" 
                             @if ($membre->daret->nbr_membre -$membre->daret->membre->count()!=0)
                                class="btn btn-secondary btn-lg mr-5" disabled 
                                @else
                                 class="btn btn-lg btn-primary mr-5" @endif>lancer daret </button>
                                
                            
                            
                                 @endif
                        </div>
                    </div>
                  </div>
                  @if ($membre->role=='admin')
                  <a href="{{route('indexdemand',$membre->daret)}}" class="btn btn-primary float-right">les demandes de {{$membre->daret->name}} </a>
@endif
                  <h3 class="text-center">les personnes </h3>
                 <table class="table">
                    <tr>
                    <th>#</th>
                    <th>name</th>
                    <th>username</th>
                    <th>email</th>
                    <td></td>
                </tr>
                @foreach ($membre->daret->membre  as $key => $membre)
                <tr>
                    <td>{{ $key + 1 }}</td>
                      
             <td>{{$membre->user->name}}</td>
             <td>{{$membre->user->username}}</td>
             <td>{{$membre->user->email}}</td>
             <td></td>
                </tr>
                @endforeach
                
                 </table>
                  
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

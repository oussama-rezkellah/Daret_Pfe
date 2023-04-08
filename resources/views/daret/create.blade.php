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
    <script src="../js/load.js" type="text/javascript"></script>
</head>

<body class="newsfeed">
    <div class="container-fluid" id="wrapper">
        <div class="row newsfeed-size">
            <div class="col-md-12 newsfeed-right-side">
                <nav id="navbar-main" class="navbar navbar-expand-lg shadow-sm sticky-top">
                    <div class="w-100 justify-content-md-center">
                        <ul class="nav navbar-nav enable-mobile px-2">
                            <li class="nav-item">
                                <button type="button" class="btn nav-link p-0"><img src="../images/icons/theme/post-image.png" class="f-nav-icon" alt="Quick make post"></button>
                            </li>
                            <li class="nav-item w-100 py-2">
                                <form class="d-inline form-inline w-100 px-4">
                                    <div class="input-group">
                                        <input type="text" class="form-control search-input" placeholder="Search for people, companies, events and more..." aria-label="Search" aria-describedby="search-addon">
                                        <div class="input-group-append">
                                            <button class="btn search-button" type="button"><i class='bx bx-search'></i></button>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <li class="nav-item">
                                <a href="messages.html" class="nav-link nav-icon nav-links message-drop drop-w-tooltip" data-placement="bottom" data-title="Messages">
                                    <img src="../images/icons/navbar/message.png" class="message-dropdown f-nav-icon" alt="navbar icon">
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav mr-5 flex-row" id="main_menu">
                            <a class="navbar-brand nav-item mr-lg-5" href="index.html"><img src="../images/logo-64x64.png" width="40" height="40" class="mr-3" alt="Logo"></a>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <form class="w-30 mx-2 my-auto d-inline form-inline mr-5">
                                <div class="input-group">
                                    <input type="text" class="form-control search-input w-75" placeholder="Search for people, companies, events and more..." aria-label="Search" aria-describedby="search-addon">
                                    <div class="input-group-append">
                                        <button class="btn search-button" type="button"><i class='bx bx-search'></i></button>
                                    </div>
                                </div>
                            </form>
                            <li class="nav-item s-nav dropdown d-mobile">
                                <a href="#" class="nav-link nav-icon nav-links drop-w-tooltip" data-toggle="dropdown" data-placement="bottom" data-title="Create" role="button" aria-haspopup="true" aria-expanded="false">
                                    <img src="../images/icons/navbar/create.png" alt="navbar icon">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right nav-dropdown-menu">
                                    <a href="#" class="dropdown-item" aria-describedby="createGroup">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <i class='bx bx-group post-option-icon'></i>
                                            </div>
                                            <div class="col-md-10">
                                                <span class="fs-9">Group</span>
                                                <small id="createGroup" class="form-text text-muted">Find people with shared interests</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="dropdown-item" aria-describedby="createEvent">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <i class='bx bx-calendar post-option-icon'></i>
                                            </div>
                                            <div class="col-md-10">
                                                <span class="fs-9">Event</span>
                                                <small id="createEvent" class="form-text text-muted">bring people together with a public or private event</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item s-nav dropdown message-drop-li">
                                <a href="#" class="nav-link nav-links message-drop drop-w-tooltip" data-toggle="dropdown" data-placement="bottom" data-title="Messages" role="button" aria-haspopup="true" aria-expanded="false">
                                    <img src="../images/icons/navbar/message.png" class="message-dropdown" alt="navbar icon"> <span class="badge badge-pill badge-primary">1</span>
                                </a>
                                <ul class="dropdown-menu notify-drop dropdown-menu-right nav-drop shadow-sm">
                                    <div class="notify-drop-title">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-6 fs-8">Messages | <a href="#">Requests</a></div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                                <a href="#" class="notify-right-icon">
                                                    Mark All as Read
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end notify title -->
                                    <!-- notify content -->
                                    <div class="drop-content">
                                        <li>
                                            <div class="col-md-2 col-sm-2 col-xs-2">
                                                <div class="notify-img">
                                                    <img src="../images/users/user-6.png" alt="notification user image">
                                                </div>
                                            </div>
                                            <div class="col-md-10 col-sm-10 col-xs-10">
                                                <a href="#" class="notification-user">Susan P. Jarvis</a>
                                                <a href="#" class="notify-right-icon">
                                                    <i class='bx bx-radio-circle-marked'></i>
                                                </a>
                                                <p class="time">
                                                    <i class='bx bx-check'></i> This party is going to have a DJ, food, and drinks.
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-2 col-sm-2 col-xs-2">
                                                <div class="notify-img">
                                                    <img src="../images/users/user-5.png" alt="notification user image">
                                                </div>
                                            </div>
                                            <div class="col-md-10 col-sm-10 col-xs-10">
                                                <a href="#" class="notification-user">Ruth D. Greene</a>
                                                <a href="#" class="notify-right-icon">
                                                    <i class='bx bx-radio-circle-marked'></i>
                                                </a>
                                                <p class="time">
                                                    Great, I’ll see you tomorrow!.
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-2 col-sm-2 col-xs-2">
                                                <div class="notify-img">
                                                    <img src="../images/users/user-7.png" alt="notification user image">
                                                </div>
                                            </div>
                                            <div class="col-md-10 col-sm-10 col-xs-10">
                                                <a href="#" class="notification-user">Kimberly R. Hatfield</a>
                                                <a href="#" class="notify-right-icon">
                                                    <i class='bx bx-radio-circle-marked'></i>
                                                </a>
                                                <p class="time">
                                                    yeah, I will be there.
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-2 col-sm-2 col-xs-2">
                                                <div class="notify-img">
                                                    <img src="../images/users/user-8.png" alt="notification user image">
                                                </div>
                                            </div>
                                            <div class="col-md-10 col-sm-10 col-xs-10">
                                                <a href="#" class="notification-user">Joe S. Feeney</a>
                                                <a href="#" class="notify-right-icon">
                                                    <i class='bx bx-radio-circle-marked'></i>
                                                </a>
                                                <p class="time">
                                                    I would really like to bring my friend Jake, if...
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-2 col-sm-2 col-xs-2">
                                                <div class="notify-img">
                                                    <img src="../images/users/user-9.png" alt="notification user image">
                                                </div>
                                            </div>
                                            <div class="col-md-10 col-sm-10 col-xs-10">
                                                <a href="#" class="notification-user">William S. Willmon</a>
                                                <a href="#" class="notify-right-icon">
                                                    <i class='bx bx-radio-circle-marked'></i>
                                                </a>
                                                <p class="time">
                                                    Sure, what can I help you with?
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-2 col-sm-2 col-xs-2">
                                                <div class="notify-img">
                                                    <img src="../images/users/user-10.png" alt="notification user image">
                                                </div>
                                            </div>
                                            <div class="col-md-10 col-sm-10 col-xs-10">
                                                <a href="#" class="notification-user">Sean S. Smith</a>
                                                <a href="#" class="notify-right-icon">
                                                    <i class='bx bx-radio-circle-marked'></i>
                                                </a>
                                                <p class="time">
                                                    Which of those two is best?
                                                </p>
                                            </div>
                                        </li>
                                    </div>
                                    <div class="notify-drop-footer text-center">
                                        <a href="#">See More</a>
                                    </div>
                                </ul>
                            </li>
                            <li class="nav-item s-nav dropdown notification">
                                <a href="#" class="nav-link nav-links rm-drop-mobile drop-w-tooltip" data-toggle="dropdown" data-placement="bottom" data-title="Notifications" role="button" aria-haspopup="true" aria-expanded="false">
                                    <img src="../images/icons/navbar/notification.png" class="notification-bell" alt="navbar icon"> <span class="badge badge-pill badge-primary">3</span>
                                </a>
                                <ul class="dropdown-menu notify-drop dropdown-menu-right nav-drop shadow-sm">
                                    <div class="notify-drop-title">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-6 fs-8">Notifications <span class="badge badge-pill badge-primary ml-2">3</span></div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                                <a href="#" class="notify-right-icon">
                                                    Mark All as Read
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end notify title -->
                                    <!-- notify content -->
                                    <div class="drop-content">
                                        <li>
                                            <div class="col-md-2 col-sm-2 col-xs-2">
                                                <div class="notify-img">
                                                    <img src="../images/users/user-10.png" alt="notification user image">
                                                </div>
                                            </div>
                                            <div class="col-md-10 col-sm-10 col-xs-10">
                                                <a href="#" class="notification-user">Sean</a> <span class="notification-type">replied to your comment on a post in </span><a href="#" class="notification-for">PHP</a>
                                                <a href="#" class="notify-right-icon">
                                                    <i class='bx bx-radio-circle-marked'></i>
                                                </a>
                                                <p class="time">
                                                    <span class="badge badge-pill badge-primary"><i class='bx bxs-group'></i></span> 3h
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-2 col-sm-2 col-xs-2">
                                                <div class="notify-img">
                                                    <img src="../images/users/user-7.png" alt="notification user image">
                                                </div>
                                            </div>
                                            <div class="col-md-10 col-sm-10 col-xs-10">
                                                <a href="#" class="notification-user">Kimberly</a> <span class="notification-type">likes your comment "I would really... </span>
                                                <a href="#" class="notify-right-icon">
                                                    <i class='bx bx-radio-circle-marked'></i>
                                                </a>
                                                <p class="time">
                                                    <span class="badge badge-pill badge-primary"><i class='bx bxs-like'></i></span> 7h
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-2 col-sm-2 col-xs-2">
                                                <div class="notify-img">
                                                    <img src="../images/users/user-8.png" alt="notification user image">
                                                </div>
                                            </div>
                                            <div class="col-md-10 col-sm-10 col-xs-10">
                                                <span class="notification-type">10 people saw your story before it disappeared. See who saw it.</span>
                                                <a href="#" class="notify-right-icon">
                                                    <i class='bx bx-radio-circle-marked'></i>
                                                </a>
                                                <p class="time">
                                                    <span class="badge badge-pill badge-primary"><i class='bx bx-images'></i></span> 23h
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-2 col-sm-2 col-xs-2">
                                                <div class="notify-img">
                                                    <img src="../images/users/user-11.png" alt="notification user image">
                                                </div>
                                            </div>
                                            <div class="col-md-10 col-sm-10 col-xs-10">
                                                <a href="#" class="notification-user">Michelle</a> <span class="notification-type">posted in </span><a href="#" class="notification-for">Argon Social Design System</a>
                                                <a href="#" class="notify-right-icon">
                                                    <i class='bx bx-radio-circle-marked'></i>
                                                </a>
                                                <p class="time">
                                                    <span class="badge badge-pill badge-primary"><i class='bx bxs-quote-right'></i></span> 1d
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-2 col-sm-2 col-xs-2">
                                                <div class="notify-img">
                                                    <img src="../images/users/user-5.png" alt="notification user image">
                                                </div>
                                            </div>
                                            <div class="col-md-10 col-sm-10 col-xs-10">
                                                <a href="#" class="notification-user">Karen</a> <span class="notification-type">likes your comment "Sure, here... </span>
                                                <a href="#" class="notify-right-icon">
                                                    <i class='bx bx-radio-circle-marked'></i>
                                                </a>
                                                <p class="time">
                                                    <span class="badge badge-pill badge-primary"><i class='bx bxs-like'></i></span> 2d
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-2 col-sm-2 col-xs-2">
                                                <div class="notify-img">
                                                    <img src="../images/users/user-12.png" alt="notification user image">
                                                </div>
                                            </div>
                                            <div class="col-md-10 col-sm-10 col-xs-10">
                                                <a href="#" class="notification-user">Irwin</a> <span class="notification-type">posted in </span><a href="#" class="notification-for">Themeforest</a>
                                                <a href="#" class="notify-right-icon">
                                                    <i class='bx bx-radio-circle-marked'></i>
                                                </a>
                                                <p class="time">
                                                    <span class="badge badge-pill badge-primary"><i class='bx bxs-quote-right'></i></span> 3d
                                                </p>
                                            </div>
                                        </li>
                                    </div>
                                    <div class="notify-drop-footer text-center">
                                        <a href="#">See More</a>
                                    </div>
                                </ul>
                            </li>
                            <li class="nav-item s-nav dropdown d-mobile">
                                <a href="#" class="nav-link nav-links nav-icon drop-w-tooltip" data-toggle="dropdown" data-placement="bottom" data-title="Pages" role="button" aria-haspopup="true" aria-expanded="false">
                                    <img src="../images/icons/navbar/flag.png" alt="navbar icon">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right nav-drop">
                                    <a class="dropdown-item" href="newsfeed-2.html">Newsfeed 2</a>
                                    <a class="dropdown-item" href="sign-in.html">Sign in</a>
                                    <a class="dropdown-item" href="sign-up.html">Sign up</a>
                                </div>
                            </li>
                            <li class="nav-item s-nav">
                                <a href="profile.html" class="nav-link nav-links">
                                    <div class="menu-user-image">
                                        <img src="../images/users/user-4.jpg" class="menu-user-img ml-1" alt="Menu Image">
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item s-nav nav-icon dropdown">
                                <a href="settings.html" data-toggle="dropdown" data-placement="bottom" data-title="Settings" class="nav-link settings-link rm-drop-mobile drop-w-tooltip" id="settings-dropdown"><img src="../images/icons/navbar/settings.png" class="nav-settings" alt="navbar icon"></a>
                                <div class="dropdown-menu dropdown-menu-right settings-dropdown shadow-sm" aria-labelledby="settings-dropdown">
                                    <a class="dropdown-item" href="#">
                                        <img src="../images/icons/navbar/help.png" alt="Navbar icon"> Help Center</a>
                                    <a class="dropdown-item d-flex align-items-center dark-mode" onClick="event.stopPropagation();" href="#">
                                        <img src="../images/icons/navbar/moon.png" alt="Navbar icon"> Dark Mode
                                        <button type="button" class="btn btn-lg btn-toggle ml-auto" data-toggle="button" aria-pressed="false" autocomplete="off">
                                            <div class="handle"></div>
                                        </button>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img src="../images/icons/navbar/gear-1.png" alt="Navbar icon"> Settings</a>
                                    <a class="dropdown-item logout-btn" href="#">
                                        <img src="../images/icons/navbar/logout.png" alt="Navbar icon"> Log Out</a>
                                </div>
                            </li>
                            <button type="button" class="btn nav-link" id="menu-toggle"><img src="../images/icons/theme/navs.png" alt="Navbar navs"></button>
                        </ul>

                    </div>

                </nav>
                <div class="row newsfeed-right-side-content mt-3">
                    <div class="col-md-2 newsfeed-left-side sticky-top shadow-sm" id="sidebar-wrapper">
                        <div class="card newsfeed-user-card h-100">
                            <ul class="list-group list-group-flush newsfeed-left-sidebar">
                                <li class="list-group-item">
                                    <h6>Home</h6>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="index.html" class="sidebar-item"><img src="../images/icons/left-sidebar/newsfeed.png" alt="newsfeed"> News Feed</a>
                                    <a href="#" class="newsfeedListicon"><i class='bx bx-dots-horizontal-rounded'></i></a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="messages.html" class="sidebar-item"><img src="../images/icons/left-sidebar/message.png" alt="message"> Messages</a>
                                    <span class="badge badge-primary badge-pill">2</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center sd-active">
                                    <a href="groups.html" class="sidebar-item"><img src="../images/icons/left-sidebar/group.png" alt="group"> Groups</a>
                                    <span class="badge badge-primary badge-pill">17</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="events.html" class="sidebar-item"><img src="../images/icons/left-sidebar/event.png" alt="event"> Events</a>
                                    <span class="badge badge-primary badge-pill">3</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="saved.html" class="sidebar-item"><img src="../images/icons/left-sidebar/saved.png" alt="saved"> Saved</a>
                                    <span class="badge badge-primary badge-pill">8</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="find-friends.html" class="sidebar-item"><img src="../images/icons/left-sidebar/find-friends.png" alt="find-friends"> Find Friends</a>
                                    <span class="badge badge-primary badge-pill"><i class='bx bx-chevron-right'></i></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="matches.html" class="sidebar-item"><img src="../images/icons/left-sidebar/matches.png" alt="matches"> Matches</a>
                                    <span class="badge badge-primary badge-pill"><i class='bx bx-chevron-right'></i></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="teams.html" class="sidebar-item"><img src="../images/icons/left-sidebar/team.png" alt="find-friends"> Argon For Teams</a>
                                    <span class="badge badge-primary badge-pill"><i class='bx bx-chevron-right'></i></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center newsLink">
                                    <a href="https://github.com/ArtMin96/argon-social" target="_blank" class="sidebar-item"><img src="../images/icons/left-sidebar/news.png" alt="find-friends"> News</a>
                                    <span class="badge badge-primary badge-pill"><i class='bx bx-chevron-right'></i></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-10 second-section" id="page-content-wrapper">
                        <div class="mb-3">
                            <div class="btn-group d-flex top-links-fg">
                                <a href="index.html" class="btn btn-quick-links">
                                    <img src="../images/icons/theme/group-white.png" class="mr-2" alt="quick links icon">
                                    <span class="fs-8">Your Groups</span>
                                </a>
                                <a href="messages.html" class="btn btn-quick-links mr-3">
                                    <img src="../images/icons/theme/rocket.png" class="mr-2" alt="quick links icon">
                                    <span class="fs-8">Discover</span>
                                </a>
                                <a href="{{route('daret.create')}}" class="btn btn-quick-links mr-3 ql-active">
                                    <img src="../images/icons/theme/create.png" class="mr-2" alt="quick links icon">
                                    <span class="fs-8">Create</span>
                                </a>
                            </div>
                        </div>

                        <div class="jumbotron groups-banner">
                            <div class="container group-banner-content">
                                <h1 class="jumbotron-heading mt-auto"><img src="../images/icons/theme/group-white.png" class="mr-3" alt="Welcome to groups"> Daret</h1>
                                <p>cree votre Daret</p>
                            </div>
                        </div>
                        @if($errors->any())
<div class="alert alert-danger">
    <h6>Errors:</h6>
    <ul> @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach</ul>
   
</div>
@endif
                        <form method="post" action="{{route('daret.store')}}">
                            
                            @csrf
                            <div class="form-group">
                            
                       
                            <div class="form-group">
                                <label for="">montant</label>
                                <input type="text" name="montant" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                              </div>

                              <div class="form-group">
                                <label for="">nombre des presonnes</label>
                                <input type="text" name="nbr_membre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                              </div>

                              <div class="form-group">
                                <label for="">par :</label>
                                <select name="type_periode" id="type_periode">
                                <option >periode</option>
                                    <option value="volvo">mois</option>
                                    <option value="saab">Semains</option>
                             
                                  </select>
                              </div>

                              

                              <div class="form-group">
                                <label for="">par :</label>
                                <select name="type_ordre" id="type_ordre">
                                <option>order</option>
                                    <option value="manualement" >manualement</option>
                                    <option value="aléatoire">aléatoire</option>
                             
                                  </select>
                              </div>

                            <button type="submit" class="btn btn-primary">Ajouter Dart</button>
                            
                            
                          </form>
                          
    <!-- Core -->
    <script src="../js/jquery/jquery-3.3.1.min.js"></script>
    <script src="../js/popper/popper.min.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>
    <!-- Optional -->
    <script type="text/javascript">
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

    </script>
    <script src="../js/app.js"></script>
    <script src="../js/components/components.js"></script>
</body>

</html> 

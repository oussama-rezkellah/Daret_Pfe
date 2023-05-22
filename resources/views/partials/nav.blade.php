@php

  $notifications = Auth::user()->notifications()->where('read', '=', 'unread')->latest()->take(3)->get();
  $unread = Auth::user()->notifications()->where('read', '=', 'unread')->count();
@endphp
<nav id="navbar-main" class="navbar navbar-expand-lg shadow-sm sticky-top">
    <div class="w-100 justify-content-md-center">
        <ul class="nav navbar-nav enable-mobile px-2">
            <li class="nav-item">
                <button type="button" class="btn nav-link p-0"><img
                        src="{{asset('images/icons/theme/post-image.png')}}" class="f-nav-icon"
                        alt="Quick make post"></button>
            </li>
          
        </ul>
        <ul class="navbar-nav mr-5 flex-row" id="main_menu">
            <a class="navbar-brand nav-item mr-lg-5" href="{{route("_daret")}}"><img
                    src="{{asset('images/logo_daret.jpg')}}" width="40" height="40" class="mr-3"
                    alt="Logo"></a>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <form class="w-30 mx-2 my-auto d-inline form-inline mr-5">
                <div class="input-group">
                    <input type="text" class="form-control search-input w-75"
                 id="search-input" 
                    placeholder="Search for darets..."
                        aria-label="Search" aria-describedby="search-addon">
                    <div class="input-group-append">
                        <button class="btn search-button" type="button"><i
                                class='bx bx-search'></i></button>
                    </div>
                </div>
            </form>
            <li class="nav-item s-nav dropdown d-mobile">
                <a href="#" class="nav-link nav-icon nav-links drop-w-tooltip" data-toggle="dropdown"
                    data-placement="bottom" data-title="Create" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    <img src="{{asset('images/icons/navbar/create.png')}}" alt="navbar icon">
                </a>
                <div class="dropdown-menu dropdown-menu-right nav-dropdown-menu">
                    <a href="{{route('creer_daret')}}" class="dropdown-item" aria-describedby="createGroup">
                        <div class="row">
                            <div class="col-md-2">
                                <i class='bx bx-group post-option-icon'></i>
                            </div>
                            <div class="col-md-10" id="createGroupDiv">
                                <span class="fs-9">group</span>
                                <small id="createGroup" class="form-text text-muted">create group and
                                    add people</small>
                            </div>
                           
                        </div>
                    </a>
                    <a href="{{ route('_daret')}}" class="dropdown-item" aria-describedby="createEvent">
                        <div class="row">
                            <div class="col-md-2">
                                <i class='bx bx-calendar post-option-icon'></i>
                            </div>
                            <div class="col-md-10" id="discover">
                                <span class="fs-9">discover</span>
                                <small id="createEvent" class="form-text text-muted">Find groups</small>
                            </div>
                           
                        </div>
                    </a>
                </div>
            </li>
            {{-- <li class="nav-item s-nav dropdown message-drop-li">
                <a href="#" class="nav-link nav-links message-drop drop-w-tooltip"
                    data-toggle="dropdown" data-placement="bottom" data-title="Messages" role="button"
                    aria-haspopup="true" aria-expanded="false">
                    <img src="images/icons/navbar/message.png" class="message-dropdown"
                        alt="navbar icon"> <span class="badge badge-pill badge-primary">1</span>
                </a>
              
            </li> --}}
            <li class="nav-item s-nav dropdown notification">
                <a href="#" class="nav-link nav-links rm-drop-mobile drop-w-tooltip"
                    data-toggle="dropdown" data-placement="bottom" data-title="Notifications"
                    role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="{{asset('images/icons/navbar/notification.png')}}" class="notification-bell"
                        alt="navbar icon"> <span class="badge badge-pill badge-primary">{{ $unread }}</span>
                </a>
                <ul class="dropdown-menu notify-drop dropdown-menu-right nav-drop shadow-sm">
                    <div class="notify-drop-title">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6 fs-8">Notifications </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                <a href="/notification/read" class="notify-right-icon">
                                    Mark All as Read
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- end notify title -->
                    <!-- notify content -->
                    <div class="drop-content">
                        @foreach ($notifications as $notification)
                        <li>
                            <div class="col-md-10 col-sm-10 col-xs-10">
                                <a href="#" class="notification-user">{{ $notification->user->first_name }}</a> <span
                                    class="notification-type">{{ $notification->content }}
                                    
                                    @foreach ($notification->daret->membre as $memb)
                                    @if ($memb->user_id ==$notification->user_id)
                                </span><a href="{{route('show',$memb)}}" class="notification-for"> <b>{{ $notification->daret->name }}</b></a>
                                    @endif
                                     
                                    @endforeach
                              
                                <a href="#" class="notify-right-icon">
                                    <i class='bx bx-radio-circle-marked'></i>
                                </a>
                                
                            </div>
                        </li>
                        @endforeach
                    </div>
                </ul>
            </li>
            <li class="nav-item s-nav dropdown d-mobile">
                <a href="#" class="nav-link nav-links nav-icon drop-w-tooltip" data-toggle="dropdown"
                    data-placement="bottom" data-title="Pages" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    <img src="{{asset('images/icons/navbar/flag.png')}}" alt="navbar icon">
                </a>
                <div class="dropdown-menu dropdown-menu-right nav-drop">
                  
                    <a class="dropdown-item" href="{{route('my_daret')}}">Groups</a>
                    <a class="dropdown-item" href="{{route('indexinvit')}}">invitations</a>
                </div>
            </li>
         
            <li class="nav-item s-nav nav-icon dropdown">
                <a href="settings.html" data-toggle="dropdown" data-placement="bottom"
                    data-title="Settings" class="nav-link settings-link rm-drop-mobile drop-w-tooltip"
                    id="settings-dropdown"><img src="{{asset('images/icons/navbar/settings.png')}}"
                        class="nav-settings" alt="navbar icon"></a>
                <div class="dropdown-menu dropdown-menu-right settings-dropdown shadow-sm"
                    aria-labelledby="settings-dropdown">
                    @notadmin
                    <a class="dropdown-item" href="/helpsupport">
                        <img src="{{asset('images/icons/navbar/help.png')}}" alt="Navbar icon"> Help
                        Center</a> 
                        
                  @endnotadmin

                       
                          @admin
                    <a class="dropdown-item d-flex align-items-center dark-mode"
                  
                        onClick="event.stopPropagation();" href="/admin/darets">
                        <i class="bi bi-person-check-fill"></i>
                        adminspace
                       
                    </a>
                    @endadmin
                    <a class="dropdown-item" href="/setting">
                        <img src="{{asset('images/icons/navbar/gear-1.png')}}" alt="Navbar icon"> Settings</a>
                    <a class="dropdown-item logout-btn" href="/logout">
                        <img src="{{asset('images/icons/navbar/logout.png')}}" alt="Navbar icon"> Log Out</a>
                </div>
            </li>
            <button type="button" class="btn nav-link" id="menu-toggle"><img
                    src="{{asset('images/icons/theme/navs.png')}}" alt="Navbar navs"></button>
        </ul>

    </div>

</nav>

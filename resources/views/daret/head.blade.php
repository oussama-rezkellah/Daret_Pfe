
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
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                              <a href="index.html" class="sidebar-item"><img
                                      src="../images/icons/left-sidebar/newsfeed.png" alt="newsfeed"> News
                                  Feed</a>
                              <a href="#" class="newsfeedListicon"><i
                                      class='bx bx-dots-horizontal-rounded'></i></a>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                              <a href="messages.html" class="sidebar-item"><img
                                      src="../images/icons/left-sidebar/message.png" alt="message">
                                  Messages</a>
                              <span class="badge badge-primary badge-pill">2</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center sd-active">
                              <a href="groups.html" class="sidebar-item"><img
                                      src="../images/icons/left-sidebar/group.png" alt="group"> Groups</a>
                              <span class="badge badge-primary badge-pill">17</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                              <a href="events.html" class="sidebar-item"><img
                                      src="../images/icons/left-sidebar/event.png" alt="event"> Events</a>
                              <span class="badge badge-primary badge-pill">3</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                              <a href="saved.html" class="sidebar-item"><img
                                      src="../images/icons/left-sidebar/saved.png" alt="saved"> Saved</a>
                              <span class="badge badge-primary badge-pill">8</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                              <a href="find-friends.html" class="sidebar-item"><img
                                      src="../images/icons/left-sidebar/find-friends.png" alt="find-friends">
                                  Find Friends</a>
                              <span class="badge badge-primary badge-pill"><i
                                      class='bx bx-chevron-right'></i></span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                              <a href="matches.html" class="sidebar-item"><img
                                      src="../images/icons/left-sidebar/matches.png" alt="matches">
                                  Matches</a>
                              <span class="badge badge-primary badge-pill"><i
                                      class='bx bx-chevron-right'></i></span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                              <a href="teams.html" class="sidebar-item"><img
                                      src="../images/icons/left-sidebar/team.png" alt="find-friends"> Argon
                                  For Teams</a>
                              <span class="badge badge-primary badge-pill"><i
                                      class='bx bx-chevron-right'></i></span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center newsLink">
                              <a href="https://github.com/ArtMin96/argon-social" target="_blank"
                                  class="sidebar-item"><img src="../images/icons/left-sidebar/news.png"
                                      alt="find-friends"> News</a>
                              <span class="badge badge-primary badge-pill"><i
                                      class='bx bx-chevron-right'></i></span>
                          </li>
                      </ul>
                  </div>
              </div>
              <div class="col-md-10 second-section" id="page-content-wrapper">
                  <div class="mb-3">
                      <div class="btn-group d-flex top-links-fg">
                          <a href="{{route('my_daret')}}" class="btn btn-quick-links">
                              <img src="../images/icons/theme/group-white.png" class="mr-2"
                                  alt="quick links icon">
                              <span class="fs-8">Your Groups</span>
                          </a>
                          <a href="{{route('_daret')}}" class="btn btn-quick-links mr-3">
                              <img src="../images/icons/theme/rocket.png" class="mr-2" alt="quick links icon">
                              <span class="fs-8">Discover</span>
                          </a>
                          <a href="{{route('creer_daret')}}" class="btn btn-quick-links mr-3 ql-active">
                              <img src="../images/icons/theme/create.png" class="mr-2" alt="quick links icon">
                              <span class="fs-8">Create</span>
                          </a>
                      </div>
                  </div>

                  <div class="jumbotron groups-banner">
                      <div class="container group-banner-content">
                          <h1 class="jumbotron-heading mt-auto"><img
                                  src="../images/icons/theme/group-white.png" class="mr-3"
                                  alt="Welcome to groups"> Groups</h1>
                          <p>Get latest active from your groups.</p>
                      </div>
                  </div>
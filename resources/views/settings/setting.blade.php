<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="assets/images/logo-16x16.png" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Argon - Social Network</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Major+Mono+Display" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@1.9.2/css/boxicons.min.css' rel='stylesheet'>

    <!-- Styles -->
    <link href="../css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/components.css" rel="stylesheet">
    <link href="../css/settings.css" rel="stylesheet">
    <link href="../css/forms.css" rel="stylesheet">
    <link href="../css/media.css" rel="stylesheet">
  <style>.profile-picture {
    position: relative;
    width: 80px;
    height: 80px;
    margin: 0 auto;
    border-radius: 50%;
    overflow: hidden;
    }
  
    .profile-picture img {
    width: 100%;
    height: 100%;
    object-fit: cover;
      }
  
  .profile-picture form {
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 100%;
    padding: 10px;
    background-color: rgba(255, 255, 255, 0.8);
    text-align: center;
    display: none;
      }
  
  .profile-picture form button {
    margin-top: 10px;
    display: none;
     }
  
  .profile-picture form input[type="file"] {
    display: none;
     }
  
  
  .profile-picture:hover .edit-icon {
      visibility: visible;
   }
</style>
</head>

<body class="messenger">
    <div class="container-fluid newsfeed d-flex" id="wrapper">
        <div class="row newsfeed-size f-width">
            <div class="col-md-12 message-right-side">
                @include('partials2.nav')
                <div class="row message-right-side-content">
                    <div class="col-md-12">
                        <div id="message-frame">
                            <div class="message-sidepanel">
                                <div class="message-contacts settings-sidebar">
                                    <ul class="conversations">
                                        <h6 class="p-3">General Settings</h6>
                                        <li class="contact setting-active">
                                            <a href="#" class="wrap d-flex align-items-center">
                                                <img src="../images/icons/settings/account.png" class="settings-icon" alt="Settings left sidebar">
                                                <div class="meta">
                                                    <p>Your Account</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="contact ">
                                            <a href="/setting/contact" class="wrap d-flex align-items-center">
                                                <img src="../images/icons/settings/contact.png" class="settings-icon" alt="Settings left sidebar">
                                                <div class="meta">
                                                    <p>Contact Info</p>
                                                </div>
                                            </a>
                                        </li>
                                        <h6 class="p-3">Security &#38; Login</h6>
                                        <li class="contact">
                                            <a href="/setting/password" class="wrap d-flex align-items-center">
                                                <img src="../images/icons/settings/account.png" class="settings-icon" alt="Settings left sidebar">
                                                <div class="meta">
                                                    <p>Password</p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                
                            <div class="content">
                                <div class="settings-form p-4 justify-content-center">
                                    <h2>Your Account</h2>
                                    @if (session('message'))
                                        <div class="alert alert-success col-md-6">
                                        {{ session('message') }}
                                         </div>
                                    @endif
                                    <div class="profile-picture">
                                        <img src="{{ $user->image ? asset('storage/'.$user->image) : asset('/images/users/user-1.jpg')}}" alt="Profile Picture" id="profile-picture">
                                        <form action="/profileupdate" method="POST" id="profile_form" enctype="multipart/form-data">
                                          @csrf
                                          <i class='bx bxs-camera'></i> Update
                                          <input type="file" name="image" id="profile_picture" class="d-none">
                                          {{-- <button type="submit" id="up-button" class="btn btn-primary">Update Picture</button> --}}
                                        </form>
                                      </div>
                                    <form action="/setting" method="post" class="mt-4 settings-form">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="settingsFirstName">First Name</label>
                                                <input type="text" class="form-control" id="settingsFirstName" value="{{ $user->first_name}}" name="first_name" placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="settingsLastName">Last Name</label>
                                                <input type="text" class="form-control" name="last_name" value="{{ $user->last_name}}" id="settingsLastName" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-row mb-3 align-items-center">
                                                <div class="col">
                                                    <label for="settingsUsername">Username</label>
                                                    <input type="text" class="form-control" id="username" name="username" aria-describedby="usernameHelp" value="{{ $user->username}}" placeholder="Username">
                                                    <small id="usernameHelp" class="form-text text-muted">Your public username is the same as your timeline address.</small>
                                                </div>
                                                <div class="col check-username" id="username-feedback">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core -->
    <script src="../js/jquery/jquery-3.3.1.min.js"></script>
    <script src="../js/popper/popper.min.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>
    <!-- Optional -->
    <script type="text/javascript">
    let profilePicture = document.getElementById('profile-picture');
    let profilePictureInput = document.getElementById('profile_picture');

    profilePicture.addEventListener('click', function() {
    profilePictureInput.click();
    });
    
    $(document).ready(function() {
    $('#profile_picture').on('change', function() {
        if (this.files && this.files[0]) {
            $('#profile_form').submit();
            }
        });
    });
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        const usernameInput = document.querySelector('#username');
        const usernameFeedback = document.querySelector('#username-feedback');

usernameInput.addEventListener('input', function() {
    const username = this.value.trim();

    if (username) {
        fetch('/check-username?username=' + encodeURIComponent(username))
       
            .then(response => response.json())
            .then(data => {
                if (data.status === 'unavailable') {
                    usernameFeedback.innerHTML = "<span><i class='bx bx-x error'></i> This username is not available.</span>";
                } else if (data.status === 'same') {
                    usernameFeedback.innerHTML = '';
                } else if(data.status === 'available'){
                    usernameFeedback.innerHTML = "<span><i class='bx bx-check success'></i> Username is available.</span>";
                }
            });
    } else {
        usernameFeedback.innerHTML = '';
    }
});
    </script>
    <script src="../js/components/components.js"></script>
</body></html>

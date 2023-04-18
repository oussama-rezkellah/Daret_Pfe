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
    <link href="{{asset('css/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/components.css')}}" rel="stylesheet">
    <link href="{{asset('css/settings.css')}}" rel="stylesheet">
    <link href="{{asset('css/forms.css')}}" rel="stylesheet">
    <link href="{{asset('css/media.css')}}" rel="stylesheet">
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
                                        <li class="contact ">
                                            <a href="/setting" class="wrap d-flex align-items-center">
                                                <img src="../images/icons/settings/account.png" class="settings-icon" alt="Settings left sidebar">
                                                <div class="meta">
                                                    <p>Your Account</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="contact setting-active">
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
                                <div class="settings-form p-4">
                                    <h2>Contact Info</h2>
                                    @if (session('message'))
                                        <div class="alert alert-success col-md-6">
                                        {{ session('message') }}
                                         </div>
                                    @endif
                                    <form action="/setting/contact" method="post" class="mt-4 settings-form">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="settingsCurrentPassword">Current Password</label>
                                                    <input type="password" class="form-control" name="password" id="settingsCurrentPassword" placeholder="Current Password">
                                                    @error('password')
                                                    <p class="text-red-500 text-xs mt-1" style="color: red">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="settingsEmailAddress">Email Address</label>
                                                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="{{ $user->email}}" placeholder="Email Address">
                                                    </div>
                                                </div>
                                            
                                            <div class="col-md-12 text-right">
                                                <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                                            </div>
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
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        const emailInput = document.querySelector('#email');
        const emailFeedback = document.querySelector('#email-feedback');

        emailInput.addEventListener('input', function() {
    const email = this.value.trim();

    if (email) {
        fetch('/checkemail?email=' + encodeURIComponent(email))
            .then(response => response.json())
            .then(data => {
                if (data.status === 'unavailable') {
                    emailFeedback.innerHTML = "<span><i class='bx bx-x error'></i> This Email is not available.</span>";
                } else if (data.status === 'same') {
                    emailFeedback.innerHTML = '';
                } else if(data.status === 'available'){
                    emailFeedback.innerHTML = "<span><i class='bx bx-check success'></i> Email is available.</span>";
                }
            });
    } else {
        emailFeedback.innerHTML = '';
    }
});
    </script>
    <script src="../js/components/components.js"></script>
</body></html>

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
                @include('partials.nav')
                <div class="row message-right-side-content">
                    <div class="col-md-12">
                        <div id="message-frame">
                            <div class="message-sidepanel">
                                <div class="message-contacts settings-sidebar">
                                    <ul class="conversations">
                                        <h2 class="mb-4">Security &#38; Password</h2>
                                        <h5 class="mb-3 text-muted">Change Password</h5>
                                        <li class="contact ">
                                            <a href="/setting" class="wrap d-flex align-items-center">
                                                <img src="../images/icons/settings/account.png" class="settings-icon" alt="Settings left sidebar">
                                                <div class="meta">
                                                    <p>Your Account</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="contact">
                                            <a href="/setting/contact" class="wrap d-flex align-items-center">
                                                <img src="../images/icons/settings/contact.png" class="settings-icon" alt="Settings left sidebar">
                                                <div class="meta">
                                                    <p>Contact Info</p>
                                                </div>
                                            </a>
                                        </li>
                                        <h6 class="p-3">Security &#38; Login</h6>
                                        <li class="contact setting-active">
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
                                    <form action="/setting/password" method="post" class="mt-4 settings-form">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="settingsCurrentPassword">Current Password</label>
                                                <input type="password" class="form-control" name="old_password" id="settingsCurrentPassword" placeholder="Current Password">
                                                @error('old_password')
                                                <p class="text-red-500 text-xs mt-1" style="color: red">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-row mb-3 align-items-center">
                                                <div class="col">
                                                    <label for="settingsNewPassword">New Password</label>
                                                    <input type="password" class="form-control" name="password" id="settingsNewPassword" aria-describedby="passwordHelp" placeholder="New Password">
                                                    <small id="passwordHelp" class="form-text text-muted">It's a good idea to use a strong password that you're not using elsewhere.</small>
                                                </div>
                                                <div class="col check-username">
                                                    <div class="progress w-25">
                                                        <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="settingsRetypePassword">Re-type New</label>
                                                    <input type="password" class="form-control" name="password_confirmation" id="settingsRetypePassword" placeholder="Re-type New Password">
                                                </div>
                                                <div class="col check-password">
                                                    
                                                </div>
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
        const passwordInput = document.querySelector('#settingsNewPassword');
        const progressBar = document.querySelector('.progress-bar');
        const retypePasswordInput = document.getElementById('settingsRetypePassword');
        const passwordCheck = document.querySelector('.check-password');

retypePasswordInput.addEventListener('input', () => {
  if (retypePasswordInput.value === passwordInput.value) {
    passwordCheck.innerHTML = '<span><i class="bx bx-check-circle success"></i> Passwords match</span>';
  } else {
    passwordCheck.innerHTML = '<span><i class="bx bx-x error"></i> Passwords do not match</span>';
  }
});

const passwordStrength = {
  0: 'Worst',
  1: 'Bad',
  2: 'Weak',
  3: 'Good',
  4: 'Strong'
};

const passwordColors = {
  0: 'bg-danger',
  1: 'bg-danger',
  2: 'bg-warning',
  3: 'bg-info',
  4: 'bg-success'
};

function calculatePasswordStrength(password) {
  let strength = 0;
  if (password.length > 7) strength++;
  if (password.match(/[a-z]/)) strength++;
  if (password.match(/[A-Z]/)) strength++;
  if (password.match(/[0-9]/)) strength++;
  if (password.match(/[$@#&!]/)) strength++;
  return strength;
}

passwordInput.addEventListener('input', function() {
  const password = this.value;
  const strength = calculatePasswordStrength(password);
  progressBar.style.width = (strength * 25) + '%';
  progressBar.className = 'progress-bar ' + passwordColors[strength];
  progressBar.setAttribute('aria-valuenow', strength);
  progressBar.setAttribute('aria-valuetext', passwordStrength[strength]);
});
    </script>
    <script src="../js/components/components.js"></script>
</body></html>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{asset('images/logo-16x16.png')}}" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Argon - Social Network</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Major+Mono+Display" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.1/css/boxicons.min.css' rel='stylesheet'><link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Styles -->
    <link href="{{asset('/css/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/css/components.css')}}" rel="stylesheet">
    <link href="{{asset('/css/media.css')}}" rel="stylesheet">
    <script src="{{asset('js/load.js')}}" type="text/javascript"></script>
</head>

<body>
  
  
@include('partials2.nav')


<div class="container-fluid" id="wrapper">
  <div class="row newsfeed-size">
      <div class="col-md-12 newsfeed-right-side">

          <div class="row newsfeed-right-side-content mt-3">
             @include('daret.ho')
              <div class="col-md-10 second-section" id="page-content-wrapper">
                 
                @include('daret.head')
                
                <div class="container">
                    <h2>support</h2>
                    <form method="POST" action="{{ route('send.email') }}">
                        @csrf
                        <div class="form-group">
                            <label for="title">title :</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter the title" >
                        </div>
                        <div class="form-group">
                            <label for="description">Description :</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Enter the description" ></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>


@include('partials.footer')
    <!-- Core -->
    <script src="{{asset('/js/jquery/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('/js/popper/popper.min.js')}}"></script>
    <script src="{{asset('/js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- Optional -->
    {{-- <script type="text/javascript">
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

    </script> --}}
    <script src="{{asset('/js/app.js')}}"></script>
    <script src="{{asset('/js/components/components.js')}}"></script>





</body>


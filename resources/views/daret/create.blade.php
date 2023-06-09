


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
    <script src="js/load.js" type="text/javascript"></script>
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

                
                  @if($errors->any())
                  <div class="alert alert-danger">
                      <h6>Errors:</h6>
                      <ul> @foreach($errors->all() as $error)
                          <li>{{$error}}</li>
                          @endforeach</ul>
                     
                  </div>
                  @endif
                  <!-- form daret -->
                  <form method="POST" action="{{route('store')}}">
                    @csrf
                    <div class="form-group">
                      <label for="exampleFormControlInput1">name</label>
                      <input type="text"  name="nom" class="form-control" id="exampleFormControlInput1" >
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">amount DH</label>
                        <input type="text"  name="montant" class="form-control" id="exampleFormControlInput1" >
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">the number of people: </label>
                        <input type="number"  name="nbr_per" class="form-control" id="exampleFormControlInput1" >
                      </div>


                    <div class="form-group">
                      <label for="test">the type of period</label>
                      <select name="type_periode" class="form-control" id="test">
                        <option selected>select </option>
                        <option value="month">Month</option>
                        <option value="week">week</option>
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="type_order">the type of order</label>
                        <select name="type_order" class="form-control" id="test">
                          <option selected>select </option>
                          <option value="random">random</option>
                          <option value="manually">manually</option>
                        </select>
                      </div>
                    <input class="btn btn-primary" type="submit" name="" id="" value="Add Daret">
                  </form>
                 
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

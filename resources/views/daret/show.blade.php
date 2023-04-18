


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
  

@include('partials2.nav')


<div class="container-fluid" id="wrapper">
  <div class="row newsfeed-size">
      <div class="col-md-12 newsfeed-right-side">

          <div class="row newsfeed-right-side-content mt-3">
            @include('daret.ho')
              <div class="col-md-10 second-section" id="page-content-wrapper">
                 
                @include('daret.head')
                @if ($membre->role =="user" && $membre->tours->count()==0)
                <a onclick="
                if(confirm('Are you sure you want to quit {{$membre->daret->name}} ?'))
                {
                   window.location.href = '{{route('quituser', ['membre' => $membre])}}';
                }
                
                "  href="#" class="btn btn-primary btn-quick-link border ">quit daret</a>
                @endif
                @if ($membre->role !="admin" && $membre->tours->count()==0 )
                <a href="{{route('destroy',$membre->daret)}}" class="btn btn-danger">delete daret</a>
                    
                @endif
               
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
                                    @if ($membre->daret->etat==0)
                                        
                                    
                                    <p class="card-text">creation date: <b>{{$membre->daret->created_at->format('d-m-Y')}}</b> </p>
                                    <p class="card-text">the amount: <b>{{$membre->daret->montant }}DH</b> </p>

                                    <p class="card-text">the number of people: <b>{{$membre->daret->nbr_membre}}</b> </p>
                                    <p class="card-text">the number of people currently: <b>{{$membre->daret->membre->count() }}</b> </p>
                                    <p class="card-text">the number of people staying: <b>{{$membre->daret->nbr_membre -$membre->daret->membre->count()  }}</b> </p>
                                    <p class="card-text">the number of turns : <b>{{$membre->daret->nbr_tour}}</b> </p>
                                    <p class="card-text">by : <b>{{$membre->daret->type_periode}}</b> </p>
                                    <p class="card-text">order : <b>{{$membre->daret->type_ordre}}</b> </p>
                                    <p class="card-text">tours : <b>
                                      @if ($membre->tours->count()!=0)
                                      exist @else not exist
                                      @endif
                                      </b> </p>
                                    <p class="card-text">the state of Daret : <b>

                                         @if (($membre->daret->etat==0) )
                                         Not yet
                                    @endif
                                    @if ($membre->daret->etat==1)
                                    already launched at {{$membre->daret->date_start}}
                                @endif</b> </p>
                                @foreach ($membre->daret->membre  as $mem)
                                   @if($mem->role== "admin")
                                      @if ($mem->user->username == $membre->user->username )
                                      <p class="card-text">Creator : <b>me</b> </p>     
                                      @else 
                                      <p class="card-text">Creator : <b>{{$mem->user->username}}</b> </p>    
                                      @endif
                                  @endif
                                @endforeach
                             @endif
                               
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
                           
                                
                              @if (session('msgerror'))
                              <div class="alert alert-danger">
                              {{ session('msgerror') }}
                              </div>
                            @endif

                            @if ($membre->daret->nbr_membre -$membre->daret->membre->count()!=0)
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addusermodal" data-whatever="@mdo">add user</button>
                            
                            @endif

                            


                             @if ($membre->daret->nbr_membre -$membre->daret->membre->count()==0
                             &&   $membre->tours->count()!=0 && $membre->daret->etat!=1)
                             <a type="a" href="{{route('start',$membre)}}" class="btn btn-lg btn-primary mr-5"> Start  </a>
                                 @endif
                              @endif
                        </div>
                    </div>
                  </div>
                  <br>
                  @if ($membre->role=='admin' &&$membre->tours->count()==0 )
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#demandesmodal" >the requests for {{$membre->daret->name}}</button>
                  @endif

                  @if (  $membre->role=='admin' &&
                   $membre->daret->nbr_membre -$membre->daret->membre->count()==0 
                  && $membre->tours->count()==0)
                  @if($membre->daret->type_ordre=='manually')
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#toursmodal" >tours </button>
                   @else
                   <a href="{{route('toursrandom',$membre)}}" class="btn btn-primary">create tours</a>
                  @endif

 
                
                   @endif
                   
                   @if (  $membre->daret->etat==0)
                  <h3 class="text-center">the peoples </h3>
                  @else 
                  <h3 class="text-center">{{ $membre->daret->type_periode}} {{$membre->daret->periode_ac}}</h3>
                  @endif
                 <table class="table table-sm">
                  <thead class="table-primary"> 
                    <tr>
                     
                    @if ($membre->tours->count()!=0)
                    <th>ordre</th>
                    @endif
                    <th>name</th>
                    <th>username</th>
                    <th>email</th>
                    <th>action</th>
                </tr></thead>
                @foreach ($membre->daret->membre  as  $mem)
                @if ($mem->role =="user" || $mem->tours->count()!=0)
                    
               
                <tr>
                   
                  @if ($mem->tours->count()!=0)
                 @foreach ($mem->tours as $tour)
               
                 @if ($tour->etat =='taked' || $tour->etat =='not_taked' )
                 <td> {{$tour->nbr}} </td> 
                 @endif
                 @endforeach
                  @endif

             <td>{{$mem->user->first_name}}</td>
             <td>{{$mem->user->username}}</td>
             <td>{{$mem->user->email}}</td>
             <td>
             @if ($mem->daret->etat==0  && $membre->role =="admin"&& $mem->tours->count()==0 
             )
             <a onclick="
                if(confirm('Are you sure you want to delete {{$mem->user->name}} ?'))
                {
                   window.location.href = '{{route('deleteuser', ['membre' => $mem])}}';
                }"  href="#" class="btn btn-danger bi bi-trash">delete</a><i class="bi bi-trash"></i>
                 @endif 

                 @if ($mem->daret->etat==1 && $membre->role =="admin"&& $mem->tours->count() != 0  )
              @if ($mem->tours->count()!=0)
             
              @foreach ($mem->tours as $tour)
              @if($tour->nbr == $membre->daret->periode_ac)
              @if($tour->etat =="not_payed")
                         <a href="{{route('updatetour',$mem)}}"  class="btn btn-primary">pay</a>
              @elseif($tour->etat =="payed")
              <p class="text-success ">payed</p>
              
              @elseif($tour->etat =="not_taked")
              @php $buttonDisplayed = false; @endphp
              @foreach ($mem->daret->membre as $membre)
                  @foreach ($membre->tours as $tour)
                      @if($tour->nbr == $mem->daret->periode_ac )
                          @if($tour->etat == "payed" || $tour->etat == "not_taked" )
                              @if(!$buttonDisplayed)
                            
                                  <a class="btn btn-primary" href="{{route('updatetourtake',['tour'=>$tour,'membre'=>$mem])}}">take</a>
                                 
                                  @php $buttonDisplayed = true; @endphp
                              @endif
                          @endif
                      @endif
                      @if($tour->etat == "payed")
                          @break
                      @endif
                  @endforeach
                  @if($buttonDisplayed)
                      @break
                  @endif
              @endforeach
              @elseif($tour->etat =="taked")
               <p class="text-success ">taked</p>
              @endif
              @endif
              @endforeach
               @endif
                  @endif
            
              </td>
          </tr>
             
                @endif
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




@if ($membre->role=='admin')
<div class="modal fade" id="addusermodal" tabindex="-1" role="dialog" aria-labelledby="addusermodal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('adduser',$membre->daret,)}}">
            @csrf
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" name="user" placeholder="usename or email">

                   
                        
                </div>
            </div>
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
        <input type="submit" @if ($membre->daret->nbr_membre -$membre->daret->membre->count()==0)
        class="btn btn-secondary btn-lg ml-5" disabled 
          @else
         class="btn btn-lg btn-primary ml-5" @endif value="add user"/>
        </form>
      </div>
    </div>
  </div>
</div>
@endif

@if (  $membre->role=='admin'

)
<div class="modal fade" id="demandesmodal" tabindex="-1" role="dialog" aria-labelledby="demandesmodal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">List requests</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        @if ($membre->daret->demandes->count()==0)
        <h3 class="text-center">no request</h3>
      @else
      <h3 class="text-center">the requests </h3>
      <table class="table">
         <tr>
         <th>#</th>
         <th>name</th>
         <th>username</th>
         <th>email</th>
         <th colspan="2">action</th>
        
     </tr>
   
 
     @foreach ($membre->daret->demandes  as $key => $demande)
     <tr>
         <td>{{ $key + 1 }}</td>
           
  <td>{{$demande->user->name}}</td>
  <td>{{$demande->user->username}}</td>
  <td>{{$demande->user->email}}</td>
  <td><a class="btn btn-primary" href="{{route('acceptdemand',[$membre->daret,$demande->user])}}">accept</a></td>
  <td><a class="btn btn-danger" href="{{route('destroydemand',[$demande])}}">delete</a></td>
     </tr>
     @endforeach
     
      </table>
      @endif
       
      </div>
      <div class="modal-footer">
      
      </div>
    </div>
  </div>
</div>

@endif



@if ( $membre->role=='admin' &&
$membre->daret->nbr_membre -$membre->daret->membre->count()==0 
&& $membre->tours->count()==0)
<div class="modal fade" id="toursmodal" tabindex="-1" role="dialog" aria-labelledby="toursmodal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="toursmodal">tours</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <table class="table">
          <tr>
            <th>name</th>
            <th>username</th>
            <th>email</th>
            <th></th>
          </tr>
          @foreach ($membre->daret->membre as $key => $mem)
          <tr>
         
             
              <td>{{$mem->user->name}}</td>
              <td>{{$mem->user->username}}</td>
              <td>{{$mem->user->email}}</td>
              <td>
                <form action="{{route('tours',$membre)}}" method="post">
                  @csrf
                <select  name="select-{{$key}}" id="select-{{$key}}" onchange="updateOptions()">
                  <option disabled selected>Select</option>
                  @foreach ($membre->daret->membre as $subkey => $sub)
                  <option value="{{$subkey+1}}">{{$subkey+1}}</option>
                  @endforeach
                </select>
              </td>
          
          </tr>
          @endforeach
        </table>
        
      </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary">
          </form>
        </div>
    
    </div>
  </div>
</div>

@endif


<script>
  function updateOptions() {
   
    var selectedValues = [];

    @foreach ($membre->daret->membre as $key => $mem)
    selectedValues.push(document.getElementById('select-{{ $key }}').value);
    @endforeach

   
    var allOptions = document.querySelectorAll('select option');

    
    for (var i = 0; i < allOptions.length; i++) {
      allOptions[i].style.display = 'block';
    }

    
    for (var i = 0; i < selectedValues.length; i++) {
      for (var j = 0; j < allOptions.length; j++) {
        if (allOptions[j].value === selectedValues[i]) {
          allOptions[j].style.display = 'none';
        }
      }
    }
  }
</script>


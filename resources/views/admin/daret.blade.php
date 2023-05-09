@extends('admin.master')

@section('main')
<main>
  

<div class="container-fluid px-4">
    <h1 class="mt-4">Daret</h1>
    <ol class="breadcrumb mb-4">
   <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Users</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('users')}}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Darets</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('darets')}}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Darets not yet</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('daret0')}}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Darets launch</div>
                
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('daretl')}}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Darets finish</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('daretf')}}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <br>
    @if(session('msg'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('msg') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
  @if($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

    <div class="card">
        <div class="card-header" >{{$daret->name}} @if (\App\Http\Controllers\AdminController::checkdaret($daret))
            
        <img class="icon" src="{{asset('admin/6928921.png')}}" alt="Nom de l'image">@endif</div>
        

        <div class="card-body">
            <p>Order: {{$daret->type_ordre}}</p>
            <p>Periode: {{$daret->nbr_tour}} {{$daret->type_periode}}</p>
            <p>Current Periode: {{$daret->type_periode}} {{$daret->curent_tour}}</p>
            <p>Members: {{$daret->nbr_membre}}</p>
            <p>Created At: {{$daret->created_at->format('Y-m-d')}}</p>
            <p>Created By:
               @if (\App\Http\Controllers\AdminController::checkdaret($daret))
                   admin(me)
                @else
                @foreach ($daret->membre as $mem)
                    @if($mem->role == 'admin')
                    {{$mem->user->username}}
                    @endif
                @endforeach
                @endif
            </p>
          
            <p>Members:</p>
            @foreach ($daret->membre as $mem)
            @if($mem->role == 'user')
            
            {{$mem->user->username}},
            @endif
             @endforeach
             <hr>

            @if ($daret->etat == 0)
            <p>Status: Not Started Yet</p>
            @else
            <p>Start At: {{$daret->date_start}}</p>
            <p>Finish At: {{$daret->date_final}}</p>
            @endif
        </div>
       
      </div>

      <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            User
        </div>
        <div>
            @if (\App\Http\Controllers\AdminController::checkdaret($daret))
             @php $buttonDisplayed = false; @endphp
               @if ($daret->membre->count()!=0)
                   @foreach ($daret->membre as $mem)
                       @if ($mem->tours->count()==0)
                       @php $buttonDisplayed = true; @endphp
                       @endif
                   @endforeach
                  @if($buttonDisplayed)
                  <a href="{{ route('destroy', $daret) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this daret?')">delete daret</a>

                 @endif
                 @else
                 <a href="{{ route('destroy', $daret) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this daret?')">delete daret</a>

               @endif
            @endif
         
           @if ($daret->nbr_membre -$daret->membre->count()!=0 && \App\Http\Controllers\AdminController::checkdaret($daret))
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addusermodal" data-whatever="@mdo">add user</button>
           
           @endif
           @if (!\App\Http\Controllers\AdminController::checktours2($daret) && 
           \App\Http\Controllers\AdminController::checkdaret($daret)&&$daret->nbr_membre -$daret->membre->count()!=0)
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#demandesmodal" >the requests for {{$daret->name}}</button>
           @endif
           @if ($daret->nbr_membre -$daret->membre->count()==0
           &&  \App\Http\Controllers\AdminController::checktours($daret)  && $daret->etat!=1
         && \App\Http\Controllers\AdminController::checkdaret($daret)  )
           <a type="a" href="{{route('startA',$daret)}}" class="btn btn-primary"> Start  </a>
               @endif
               @if($daret->nbr_membre == $daret->membre->count()
               && \App\Http\Controllers\AdminController::checkdaret($daret)  && !\App\Http\Controllers\AdminController::checktours2($daret) )
             
              @if($daret->type_ordre=='manually')
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#toursmodal" >tours </button>
               @else
               <a href="{{route('toursrandomA',$daret)}}" class="btn btn-primary">create tours</a>
              @endif
            @endif
          
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>username</th>
                        <th> Email</th>
                    
                        
                        <th>action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>username</th>
                        <th> Email</th>
                    
                        
                        <th>action</th>
                    
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($daret->membre as $mem)
                    <tr>
                        <td>{{$mem->user->first_name}}</td>
                        <td>{{$mem->user->last_name}}</td>
                        <td>{{$mem->user->username}}</td>
                        <td>{{$mem->user->email}}</td>
                    <td>
                       @if ($daret->etat == 0)
                      
                        @if (!\App\Http\Controllers\AdminController::checktours($daret) && 
                          \App\Http\Controllers\AdminController::checkdaret($daret))
                          
                            <a onclick="if(confirm('Are you sure you want to delete {{$mem->user->username}} ?'))
                            { window.location.href = '{{route('deleteuser', ['membre' => $mem])}}';}"  href="#" class="btn btn-danger bi bi-trash">delete</a><i class="bi bi-trash"></i>
                            
                       @endif
                     @endif

                     @if($daret->etat == 1 && \App\Http\Controllers\AdminController::checkdaret($daret))
                      
                     @foreach ($mem->tours as $tour)
                     @if($tour->nbr == $daret->curent_tour)
                     @if($tour->etat =="not_payed")
                   
                                <a href="{{route('updatetour',$tour)}}"  class="btn btn-primary">pay</a>
                     @elseif($tour->etat =="payed")
                     <p class="badge bg-success">payed</p>
                     
                     @elseif($tour->etat =="not_taked" )
                     <a class="btn btn-primary" href="{{route('updatetourtake',['tour'=>$tour,'membre'=>$mem])}}">take</a>
                     @php $buttonDisplayed = false; @endphp
       
                   {{--  --}}
                     @elseif($tour->etat =="taked")
                      <p class="badge bg-success">taked</p>
                     @endif
                     @endif
                     @endforeach


                     @elseif($daret->etat == 1 && !\App\Http\Controllers\AdminController::checkdaret($daret))
                     
                     @foreach ($mem->tours as $tour)
                     @if($tour->nbr == $daret->curent_tour)
                     @if($tour->etat =="not_payed")
                     <p class="badge bg-danger ">not payed</p>
                              
                     @elseif($tour->etat =="payed")
                     <p class="badge bg-success ">payed</p>
                    
                     @elseif($tour->etat =="not_taked" )
                    
                     <p class="badge bg-danger">not taked</p>
                     @elseif($tour->etat =="taked")
                     <p class="badge bg-success">taked</p>
                     @endif
                     @endif
                    @endforeach
                    @endif
                    
                    </td>
                    </tr>
                   
                    
                    @endforeach
                </tbody>
            </table> 
        </div>
</div>
</main>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-HVgoWjZYdZG1JS1nFy98hPJG4f4ihM0nH9+eiGjckBPUrOvE+8DHdIktKkoPebxX" crossorigin="anonymous"></script>

<!-- Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js" integrity="sha384-IAoZnE93j1I+XN2OQ8MG3y1Kv0pi+IzOwKi/8rZrPUMvTtvTmXgWDtT8dC0dy2vB" crossorigin="anonymous"></script>

<!-- Bootstrap JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js" integrity="sha384-71+V3q1HTd20Id6D9KjrrC7V/Y+R6u5eVn5zQKnK/7qjoB1N37BIdXpivGGCg5x5" crossorigin="anonymous"></script>


    </div>
</div>
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
          <form method="post" action="{{route('adduser',$daret)}}">
              @csrf
              <div class="col-md-6">
                  <div class="form-group">
                      <input type="text" id="search" class="form-control" name="search" placeholder="usename or email">
  
                      <ul id="results"></ul>
  
                     
                    
                          
                  </div>
              </div>
       
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
          <input type="submit" @if ($daret->nbr_membre -$daret->membre->count()==0)
          class="btn btn-secondary btn-lg ml-5" disabled 
            @else
           class="btn btn-lg btn-primary ml-5" @endif value="add user"/>
          </form>
        </div>
      </div>
    </div>
  </div>

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
        
          @if ($daret->demandes->count()==0)
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
     
   
       @foreach ($daret->demandes  as $key => $demande)
       <tr>
           <td>{{ $key + 1 }}</td>
             
    <td>{{$demande->user->name}}</td>
    <td>{{$demande->user->username}}</td>
    <td>{{$demande->user->email}}</td>
    <td><a class="btn btn-primary" href="{{route('acceptdemand',[$daret,$demande->user])}}">accept</a></td>
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
            @foreach ($daret->membre as $key => $mem)
            <tr>
           
               
                <td>{{$mem->user->name}}</td>
                <td>{{$mem->user->username}}</td>
                <td>{{$mem->user->email}}</td>
                <td>
                  <form action="{{route('tours',$mem)}}" method="post">
                    @csrf
                  <select  name="select-{{$key}}" id="select-{{$key}}" onchange="updateOptions()">
                    <option disabled selected>Select</option>
                    @foreach ($daret->membre as $subkey => $sub)
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
  <script>
    function updateOptions() {
     
      var selectedValues = [];
  
      @foreach ($daret->membre as $key => $mem)
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


@endsection
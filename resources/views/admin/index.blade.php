 @extends('admin.master')

 @section('main')

<main>
  
  
<div class="container-fluid px-4">
        
            <h1 class="mt-4">Daret</h1>
            <ol class="breadcrumb mb-4">
           <li class="breadcrumb-item active">Dashboard</li>
           
            </ol>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
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

  
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Darets
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>order</th>
                        <th>periode</th>
                        <th>curent periode</th>
                        <th>membres</th>
                        <th>curent membres </th>
                        <th>created at</th>
                        <th>start at</th>
                        <th>finish at</th>
                        
                        <th>action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>name</th>
                        <th>order</th>
                        <th>periode</th>
                        <th>curent periode</th>
                        <th>membres</th>
                        <th>curent membres </th>
                        <th>created at</th>
                        <th>start at</th>
                        <th>finish at</th>
                        <th>action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($darets as $daret)
                    <tr>
                        <td>{{$daret->name}} @if (\App\Http\Controllers\AdminController::checkdaret($daret))
            
                            <img class="icon" src="{{asset('admin/6928921.png')}}" alt="Nom de l'image">@endif</td>
                        <td>{{$daret->type_ordre}}</td>
                        <td>{{$daret->nbr_tour}} {{$daret->type_periode}}</td>
                        <td>{{$daret->periode_ac}}</td>
                        <td>{{$daret->nbr_membre}}</td>
                        <td>{{$daret->membre->count()}}</td>
                        <td>{{$daret->created_at->format('Y-m-d')}}</td>
                        @if ($daret->etat == 0)
                        <td>not yet</td>
                        <td>#</td>
                        @else
                        <td>{{$daret->date_start}}</td>
                        <td>{{$daret->date_final}}</td>
                        @endif
                        <td>
                          {{-- data-toggle="modal" data-target="#exampleModal{{$daret->id}}" --}}
                            <a href="{{route('daret',$daret)}}" class="btn btn-primary" >
                                display
                            </a>
                        </td>
                    </tr>
                   
                    
                    @endforeach
                </tbody>
            </table> 
        </div>
     



<!-- Initialiser les composants JavaScript de Bootstrap -->
<script>
    $(document).ready(function() {
        // Initialiser les alertes de Bootstrap
        $(".alert").alert();
    });
</script>


  
</main>

    @endsection

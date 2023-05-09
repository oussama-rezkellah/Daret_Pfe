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
                   <a class="small text-white stretched-link" href="#">View Details</a>
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
               <div class="card-body">Darets lancer</div>
               
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
           Users
       </div>
      
       <div class="card-body">
           <table id="datatablesSimple">
               <thead>
                   <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>action</th>
                    
                      
                   </tr>
               </thead>
               <tfoot>
                   <tr> <th>First name</th>
                    <th>Last name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>action</th>
                     
                   </tr>
               </tfoot>
               <tbody>
                @foreach ($users as $user)
                    
             
                <tr>
                    <td>{{ $user->first_name}}</td>
                    <td>{{ $user->last_name}}</td>
                    <td>{{ $user->username}}</td>
                    <td>{{ $user->email}}</td>
                    <td> <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$user->id}}">
                        display</button>
                    </td>
                </tr> 
                <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{$user->username}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>first name: {{$user->first_name}}</p>
                                <p>last name: {{$user->last_name}} </p>
                                <p> Email: {{$user->email}}</p>
                                <p onclick="showDareList({{$user->id}})"> darets created by {{$user->username}}:
                                    <span id="dare-count-{{$user->id}}" >{{$user->membres->where('role', 'admin')->count()}}</span>
                                </p>
                                <div id="dare-list-{{$user->id}}" style="display:none;">
                                    <ul>
                                        @foreach($user->membres as $membre)
                                            @if($membre->role == 'admin')
                                                <li>{{$membre->daret->name}}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                
                                <p  onclick="showDareList2({{$user->id}})"> {{$user->username}} Member of 
                                <span id="dare-count2-{{$user->id}}" > {{$user->membres->where('role', 'user')->count()}} daret </span> </p>
                                <div id="dare-list2-{{$user->id}}" style="display:none;">
                                    <ul>
                                        @foreach($user->membres as $membre)
                                            @if($membre->role == 'user')
                                                <li>{{$membre->daret->name}}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                  @endforeach

               </tbody>
           </table>
       </div>
   </div>
</div>

</main>



  

  

@endsection

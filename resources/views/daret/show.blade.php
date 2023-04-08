<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Major+Mono+Display" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>
<body>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">name xxxx</h5>
          <h6 class="card-subtitle mb-2 text-muted"></h6>
          <p class="card-text"></p>
          <a href="#" class="card-link"></a>
          <a href="#" class="card-link"></a>
          <p> montant: {{$daret->montant}}</p>
          <p>  nbr tour : {{$daret->nbr_tour}}</p>
          <p> presonne  {{$daret->nbr_membre}}</p>
          <p>  type periode:{{$daret->type_periode}}</p>
          @if( $daret->etat== 0)
          <p>etat: pas encore</p>
      @endif
      @if( $daret->etat == 1)
      <p>etat: start</p>
         @endif
         @foreach ($daret->membres as $membre)
         
             @if ($membre->role == 1)
             <p>admin de daret :{{$membre->user->username}}</p>    
             @endif
         @endforeach
     
        </div>

    
</body>
</html>
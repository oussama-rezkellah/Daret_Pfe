@extends('admin.master')

@section('main')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Statistics</li>
        </ol>
        @if (session('msg'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('msg') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<div class="row">
    {{-- <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"></h5>
                            <h6 class="card-subtitle text-muted"></h6>
                        </div>
                        <div class="card-body">
                            <div class="chart chart-sm">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Darets</h5>
                            <h6 class="card-subtitle text-muted"></h6>
                        </div>
                        <div class="card-body">
                            <div class="chart chart-sm">
                                <canvas id="myChart2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>
</main>


{{-- <script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script> --}}
<script>
  const ctx2 = document.getElementById('myChart2');

  new Chart(ctx2, {
    type: 'pie',
    data: {
      labels: ['not launched', 'launched', 'finish'],
      datasets: [{
        label: '# of Darets',
        data: [
          {{ $darets->where('etat', 0)->count() }},
          {{ $darets->where('etat', 1)->count() }},
          {{ $darets->where('etat', 2)->count() }}
        ],
        borderWidth: 1
      }]
    },
    options: {
      plugins: {
        legend: {
          position: 'right'
        },
        title: {
          display: true,
          text: 'Darets per state'
        }
      },
      responsive: true,
      aspectRatio: 1.5
    }
  });
</script>


@endsection
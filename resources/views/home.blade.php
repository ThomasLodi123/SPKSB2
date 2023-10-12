@extends('template.index')

@section('content')
<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header"></div>

                <div class="card-body">

                    <div class="bg-light">
                        <h2>Selamat datang di Sistem Pendukung Keputusan Bibit Sawit</h2>
                    </div>

                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">{{ __('Chart') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="bg-light">
                        <div class="justify-self-center ">
                            <canvas class="w-100 h-100" id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="
https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js
"></script>
<script>
    var label = {!! json_encode($label, JSON_HEX_TAG) !!};
    var data = {!! json_encode($data, JSON_HEX_TAG) !!};
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: label,
        datasets: [
            {
          label: 'Jumlah',
          data: data,
          borderWidth: 1,
          backgroundColor : ['green', 'red']
        }
    ]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
</script>

@endsection

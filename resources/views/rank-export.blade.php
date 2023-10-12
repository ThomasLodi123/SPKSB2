<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- Datatables-->
    <link rel="stylesheet" href="{{asset('assets/css/datatables.min.css')}}" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
<table id="mytable" class="table table-striped" data-toggle="table" style="border-collapse: collapse">
    <thead>
        <tr>
            <th>No</th>
            <th>Alternatif</th>
            @foreach ($criteriaweights as $criteriaWeight)
            <th>{{$criteriaWeight->name}}</th>
            @endforeach
            <th>Total</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <input type="hidden" value="{{$i=0}}">
        @foreach ($alternatives as $alternative)
        <tr>
            <td class="number">{{ ++$i }}</td>
            <td>{{$alternative->name}}</td>
            @php
            $total = 0;
            @endphp
            @foreach ($scores->where('ida', $alternative->id)->all() as $score)
            @php
            $total += $score->rating;
            @endphp
            <td>{{$score->rating}}</td>
            @endforeach
            <td>{{$total}}</td>
            {{-- {{dd($totalVar)}} --}}
            <td>
                @if ($total >= 0.8)
                    Berkualitas
                @else
                    Tidak Berkualitas
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

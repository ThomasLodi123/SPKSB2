@extends('template.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Peringkat</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('export')}}" class='btn btn-primary ml-2'> <span
                                class='fa fa-'></span>Export</a>
                            <table id="mytable" class="display nowrap table table-striped table-bordered" data-toggle="table" data-sort-name="total" data-sort-order="desc">
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
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col-md-6 -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('script')
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        var table = $('#mytable').DataTable({
            'order': [[7, 'desc']],
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0
            } ],
        });

        table.on( 'draw.dt', function () {
        var PageInfo = $('#mytable').DataTable().page.info();
            t.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        } );

        // $("#mytable").on('draw.dt', function(){
        //     let n = 0;
        //     $(".number").each(function () {
        //             $(this).html(++n);
        //         })
        // })
    });

            // const table = new DataTable('#mytable',{
        //     columnDefs: [
        //         {
        //             searchable: false,
        //             orderable: false,
        //             targets: 0
        //         }
        //     ],
        //     order: [[7, 'desc']],
        //     paging: true,
        //     lengthChange: false,
        //     searching: false,
        //     ordering: true,
        //     info: true,
        //     autoWidth: false,
        //     responsive: true,

        // })

        // table
        //     .on('order.dt search.dt', function () {
        //         let i = 1;

        //         table
        //             .cells(null, 0, { search: 'applied', order: 'applied' })
        //             .every(function (cell) {
        //                 this.data(i++);
        //             });
        //     })
        //     .draw();



</script>
@endsection

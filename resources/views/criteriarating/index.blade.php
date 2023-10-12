@extends('template.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Peringkat Kriteria</h1>
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
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                            @endif

                            @role('admin')
                            <a href="{{route('criteriaratings.create')}}" class='btn btn-primary'> <span
                                    class='fa fa-plus'></span> Tambahkan Peringkat Kriteria</a>
                            @endrole
                            <br>
                            <table id="mytable" class="display nowrap table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kriteria</th>
                                        <th>Subkriteria</th>
                                        <th>Bobot</th>
                                        <th>Nilai</th>
                                        @role('admin')
                                        <th>Aksi</th>
                                        @endrole
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($criteriaWeights as $criteriaWeight)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>({{ $criteriaWeight->name}}) {{$criteriaWeight->description}}</td>
                                        <td>
                                            @foreach ($criteriaWeight->ratings as $criteriaRating)
                                            <div class="mb-4">
                                                {{$criteriaRating->name}}
                                            </div>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($criteriaWeight->ratings as $criteriaRating)
                                            <div class="mb-4">
                                                ({{ $criteriaRating->description}})

                                            </div>

                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($criteriaWeight->ratings as $criteriaRating)
                                            <div class="mb-4">
                                                {{ $criteriaRating->rating}}
                                            </div>

                                            @endforeach
                                        </td>
                                        @role('admin')
                                        <td>
                                            @foreach ($criteriaWeight->ratings as $criteriaRating)
                                            <form action="{{ route('criteriaratings.destroy',$criteriaRating->id) }}" method="POST" class="mb-2">
                                                @csrf
                                                @method('DELETE')
                                                <span data-toggle="tooltip" data-placement="bottom" title="Edit Data">
                                                    <a href="{{ route('criteriaratings.edit',$criteriaRating->id) }}"
                                                        class="btn btn-primary"><span class="fa fa-edit"></span>
                                                    </a>
                                                </span>
                                                <span data-toggle="tooltip" data-placement="bottom" title="Delete Data">
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this sub criteria?')">
                                                        <span class="fa fa-trash-alt"></span>
                                                    </button>
                                                </span>
                                            </form>
                                            @endforeach
                                        </td>
                                        @endrole
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

        $('#mytable').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

</script>
@endsection

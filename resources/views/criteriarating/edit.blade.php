@extends('template.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Peringkat Kriteria</h1>
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
                            <a href="javascript:history.back()" class="btn btn-primary">Back</a>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Ada beberapa masalah dengan masukan Anda.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form action="{{route('criteriaratings.update', $criteriarating->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Nama sub kriteria :</label>
                                    <div class="input-group">
                                        <input id="name" type="text" class="form-control" placeholder="e.g. < 9 bulan"
                                            name="name" value="{{ $criteriarating->name }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="rating">Peringkat :</label>
                                    <div class="input-group">
                                        <input id="rating" type="text" class="form-control" placeholder="e.g. 2.5"
                                            name="rating" value="{{ $criteriarating->rating }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Deskripsi :</label>
                                    <div class="input-group">
                                        <input id="description" type="text" class="form-control" placeholder="e.g. Good"
                                            name="description" value="{{ $criteriarating->description }}" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </form>
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

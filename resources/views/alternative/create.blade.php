@extends('template.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambahkan Alternatif Baru</h1>
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
                            <form action="{{route('alternatives.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama :</label>
                                    <div class="input-group">
                                        <input id="name" type="text" class="form-control"
                                            placeholder="Someone or Something" name="name" required>
                                    </div>

                                </div>
                                @foreach ($criteriaweights as $cw)
                                <div class="form-group">
                                    <label for="criteria[{{$cw->id}}]">{{$cw->description}} :</label>
                                    <select class="form-control" id="criteria[{{$cw->id}}]"
                                        name="criteria[{{$cw->id}}]">
                                        <!--
                                        @php
                                            $res = $criteriaratings->where('criteria_id', $cw->id)->all();
                                        @endphp
                                        -->
                                        @foreach ($res as $cr)
                                        <option value="{{$cr->id}}">{{$cr->description}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endforeach
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

@extends('template.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit user</h1>
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
                            <form action="{{ route('user.update', $user) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama :</label>
                                    <div class="input-group">
                                        <input id="name" type="text" class="form-control" placeholder="Nama"
                                        name="name" required value="{{old('name', $user->name)}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email :</label>
                                    <div class="input-group">
                                        <input id="email" type="email" class="form-control" placeholder="Email"
                                        name="email" required value="{{old('email', $user->email)}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="role">Kriteria :</label>
                                    <select class="form-control" id="role" name="role">
                                    <option selected>Role</option>
                                    <option value="owner" {{old('role', $user->roles->pluck('name')[0]) == 'owner' ? 'selected' : ''}}>Owner</option>
                                    <option value="staff" {{old('role', $user->roles->pluck('name')[0]) == 'staff' ? 'selected' : ''}}>Staff</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password :</label>
                                    <div class="input-group">
                                        <input id="password" type="password" class="form-control" placeholder="Password"
                                            name="password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Konfirmasi Password :</label>
                                    <div class="input-group">
                                        <input id="password_confirmation" type="password" class="form-control" placeholder="Ulangi Password"
                                            name="password_confirmation" required>
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


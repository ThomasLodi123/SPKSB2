@extends('template.index')

@section('content')
<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">{{ __('Import File Excel') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file"
                                class="form-control">
                        <br>
                        <button class="btn btn-success">
                                Import Data Alternatif
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

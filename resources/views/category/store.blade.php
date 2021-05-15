@extends('Layout.main')

@section('content')

<div>
    <h3 class="text-center mb-5 font-weight-bold"> Formularz dodawania kategorii </h3>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block col-12 my-3">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    <form action="{{ route('category.store') }}" method="POST" class="form">
        @csrf
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label font-weight-bold">Kategoria</label>
            <div class="col-sm-10">
                <input type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror"
                    name="name" id="inputName" placeholder="Nazwa kategorii" required>
                @error('name')
                <div class="invalid-feedback d-block"> {{ $message }} </div>
                @enderror
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-lg btn-success"> Dodaj </button>
        </div>
    </form>

</div>

@endsection
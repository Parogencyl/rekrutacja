@extends('Layout.main')

@section('content')

<div>
    <h3 class="text-center mb-5 font-weight-bold"> Formularz dodawania postu </h3>

    <form action="{{ route('store.post') }}" method="POST" class="form">
        @csrf
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label font-weight-bold">Treść</label>
            <div class="col-sm-10">
                <textarea value="{{ old('text') }}" class="form-control @error('text') is-invalid @enderror" name="text"
                    id="inputText" placeholder="Opis" required>{{ old('text') }}</textarea>
                @error('text')
                <div class="invalid-feedback d-block"> {{ $message }} </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="inputCategory" class="col-sm-2 col-form-label font-weight-bold">Kategoria</label>
            <div class="col-sm-10">

                <select id="inputCategory" value="{{ old('categoriesArray') }}" name="category"
                    class="form-control @error('category') is-invalid @enderror"
                    onchange="setCategories(this.value, {{$categories}})">
                    <option disabled selected> -- Wybierz kategorię -- </option>
                    @foreach ($categories ?? [] as $category)
                    <option value="{{ $category['id'] }}">
                        {{ $category['name'] }} </option>
                    @endforeach
                </select>

                @error('categoriesArray')
                <div class="invalid-feedback d-block"> {{ $message }} </div>
                @enderror
            </div>

            <input type="hidden" id="categoriesArray" value="" name="categoriesArray">

            <div id="allCategories" class="mt-3">
            </div>

        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-lg btn-success"> Dodaj </button>
        </div>
    </form>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block col-12 my-3">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif


</div>

<script src="{{ asset('js/postForm.js') }}"></script>

@endsection
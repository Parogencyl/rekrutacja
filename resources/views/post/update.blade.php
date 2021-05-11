@extends('Layout.main')

@section('content')

<div>
    <h3 class="text-center mb-5 font-weight-bold"> Edycja postu </h3>

    <form action="{{ route('update.post') }}" method="POST" class="form">
        @csrf
        @method('put')

        <input type="hidden" value="{{ $post->id }}" name="postId">

        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label font-weight-bold">Treść</label>
            <div class="col-sm-10">
                <input type="text" value="{{ $post->text }}" class="form-control @error('text') is-invalid @enderror"
                    name="text" id="inputText" placeholder="Nazwa kategorii" required>
                @error('text')
                <div class="invalid-feedback d-block"> {{ $message }} </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="inputCategory" class="col-sm-2 col-form-label font-weight-bold">Kategoria</label>
            <div class="col-sm-10">
                <select id="inputCategory" value="{{ old('category') }}" name="category"
                    class="form-control @error('category') is-invalid @enderror">

                    @foreach ($categories ?? [] as $category)
                    @if ($category['name'] == $post->category->name)
                    <option value="{{ $category['id'] }}" class="font-weight-bold" selected> {{ $category['name'] }}
                    </option>
                    @else
                    <option value="{{ $category['id'] }}"> {{ $category['name'] }} </option>
                    @endif
                    @endforeach

                </select>
                @error('category')
                <div class="invalid-feedback d-block"> {{ $message }} </div>
                @enderror
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-lg btn-success"> Edytuj </button>
        </div>

    </form>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block col-12 my-3">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif


</div>

@endsection
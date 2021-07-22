@extends('layouts.main')

@section('content')

    @if ($errors->any())   
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach            
        </ul>
    </div> 
    @endif

    <h1>Modifica del Comic: {{ $comic->title }}</h1>
    <a href="{{ route('comics.show', $comic->id) }}" class="btn btn-primary">Visualizza</a>

    <form action="{{ route('comics.update', $comic->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" placeholder="Inserisci il titolo del Comic" name="title" value="{{ $comic->title }}">
        </div>
        <div class="form-group">
            <label for="series">Serie</label>
            <input type="text" class="form-control" id="series" placeholder="Inserisci il nome della serie" name="series" value="{{ $comic->series }}">
        </div>
        <div class="form-group">
            <label for="price">Prezzo</label>
            <input type="number" step="0.01" class="form-control" id="price" placeholder="Inserisci il prezzo del Comic" name="price" value="{{ $comic->price }}">
        </div>
        <div class="form-group">
            <label for="thumb">Url Immagine</label>
            <input type="text" class="form-control" id="thumb" placeholder="Inserisci l'url dell'immagine" name="thumb" value="{{ $comic->thumb }}">
        </div>
        <div class="form-group">
            <label for="sale_date">Data vendita</label>
            <input type="text" class="form-control" id="sale_date" placeholder="Inserisci la data di vendita" name="sale_date" value="{{ $comic->sale_date }}">
        </div>
        <div class="form-group">
            <label for="description">Descrizione del Comic</label>
            <textarea class="form-control" id="description" name="description" placeholder="Inserisci la descrizione del comic" rows="4">{{ $comic->description }}</textarea>
          </div>
        <button type="submit" class="btn btn-primary">Salva</button>
      </form>
@endsection    
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

    <h1>Crea un nuovo Comic</h1>

    <form action="{{ route('comics.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" placeholder="Inserisci il titolo" name="title">
        </div>
        <div class="form-group">
            <label for="series">Serie</label>
            <input type="text" class="form-control" id="series" placeholder="Inserisci il nome della serie" name="series">
        </div>
        <div class="form-group">
            <label for="price">Prezzo</label>
            <input type="number" step="0.01" class="form-control" id="price" placeholder="Inserisci il prezzo del Comic" name="price">
        </div>
        <div class="form-group">
            <label for="thumb">Url Immagine</label>
            <input type="text" class="form-control" id="thumb" placeholder="Inserisci l'url dell'immagine" name="thumb">
        </div>
        <div class="form-group">
            <label for="sale_date">Data vendita</label>
            <input type="text" class="form-control" id="sale_date" placeholder="Inserisci la data di vendita" name="sale_date">
        </div>
        <div class="form-group">
            <label for="description">Descrizione del Comic</label>
            <textarea class="form-control" id="description" name="description" placeholder="Inserisci la descrizione del comic" rows="4"></textarea>
          </div>
        <button type="submit" class="btn btn-primary">Salva</button>
      </form>
@endsection
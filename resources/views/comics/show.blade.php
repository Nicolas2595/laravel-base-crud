@extends('layouts.main')

@section('content')
    <h1>{{ $comic->title }}</h1>

    <div class="row my-4">
        <div class="col-2">
            <img class="img-fluid" src="{{ $comic->thumb }}" alt="{{ $comic->title}}">
        </div>
        <div class="col-10">
            <h4>Serie</h4>
            <p>{{ $comic->series }} &deg;</p>
            <h4>Prezzo</h4>
            <p>{{ $comic->price }} &euro;</p>
            <h4>Data Vendita</h4>
            <p>{{ $comic->sale_date }}</p>
            <h4>Tipo</h4>
            <p>{{ $comic->type }}</p>
        </div>
    </div>

    <div class="mt-4">
        <a class="btn btn-primary" href="{{ route("comics.index") }}">Torna all'elenco</a>
    </div>
@endsection
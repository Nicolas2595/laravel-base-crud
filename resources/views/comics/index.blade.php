@extends('layouts.main')

@section('content')
    <h1>Elenco comics</h1>

    <table class="mt-4 table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titolo</th>
                <th>Descrizione</th>
                <th colspan="3">Azioni</th>
            </tr>    
        </thead>
        <tbody>  
            @foreach ($comics as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                        <a href="{{ route("comics.show", $item->id) }}" class="btn btn-success">SHOW</a>
                    </td>
                    <td>EDIT</td>
                    <td>DELETE</td>
                </tr> 
            @endforeach
        </tbody>
    </table>

@endsection
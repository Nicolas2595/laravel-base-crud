@extends('layouts.main')

@section('content')
    <h1>Elenco comics</h1>

    @if (session('deleted'))
        <div class="alert alert-success">
            {{ session('deleted') }}
        </div>
    @endif

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
                    <td>
                        <a href="{{ route("comics.edit", $item->id) }}" class="btn btn-primary">EDIT</a>
                    </td>
                    <td>
                        <form 
                            action="{{ route('comics.destroy', $item->id) }}" 
                            method="POST"
                            onSubmit = "return confirm('Sei sicuro di voler cancellare definitivamente {{ $item->title }}?')"
                            >
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="DELETE">
                        </form>
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>

@endsection
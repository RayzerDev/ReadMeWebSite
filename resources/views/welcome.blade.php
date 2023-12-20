<!-- resources/views/welcome.blade.php -->
@extends('templates.app')

@section('content')
    <div class="container">
        <h1>ReadMe</h1>

        @if($derniereHistoire)
            <div>
                <a href="{{ route('storys.show',$derniereHistoire->id) }}">
                <h2>{{ $derniereHistoire->titre }}</h2>
                <p>{{ $derniereHistoire->pitch }}</p>
                <img src="{{ $derniereHistoire->photo }}" alt="Image de la dernière histoire">
                </a>
            </div>
        @else
            <p>Aucune histoire disponible pour le moment.</p>
        @endif
    </div>
@endsection

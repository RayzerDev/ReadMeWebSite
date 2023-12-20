@extends('templates.app')

@section('content')
    <div class="container">
        <h1>ReadMe</h1>

        @if($histoire)
            <div>
                <a href="{{ route('storys.show',$histoire->id) }}">
                <h2>{{ $histoire->titre }}</h2>
                <p>{{ $histoire->pitch }}</p>
                <img src="{{ $histoire->photo }}" alt="histoire">
                </a>
            </div>
        @else
            <p>Aucune histoire disponible pour le moment.</p>
        @endif
    </div>
@endsection

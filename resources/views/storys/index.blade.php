
<x-layout titre="Liste des Histoires">
    <script>
        function submitForm() {
            document.getElementById("filterForm").submit();
        }
    </script>

    <div>
        <h1>Liste des Histoires</h1>
        <form action="{{route('storys.index')}}" method="get" id="filterForm">
            <div class="input-group">
                <div class="mb-3">
                    <select name="cat" class="form-select form-control bg-white" onchange="submitForm()">
                        <option value="All" @if($cat == 'All') selected @endif>-- Tout genres --</option>
                        @foreach($genres as $genre)
                            <option value="{{$genre}}" @if($cat == $genre) selected @endif>{{$genre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>

        <div>
            @foreach ($histoires as $histoire)
                <a href="{{ route('storys.show', $histoire->id) }}">
                    <div>
                        <img src="{{$histoire->photo}}">
                        <h5>{{ $histoire->titre }}</h5>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-layout>


@extends('layouts/default.blade.php')

@section('title', 'Города')

@section('content')
    <h3 class="m-4">Список всех городов</h3>
    <ul class="list-group">
        @foreach($cities as $city)
            <li class="list-group-item">{{ $city['city'] }}</li>
        @endforeach
    </ul>
@endsection

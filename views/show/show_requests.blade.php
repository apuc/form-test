@extends('layouts/default.blade.php')

@section('title', 'Заявки')

@section('content')
    <h3 class="m-4">Список всех заявок</h3>
    <ul class="list-group">
        @foreach($requests as $request)
            <div class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $request['user']['name'] }}</h5>
                    <small>{{ $request['city']['city'] }}</small>
                </div>
                <p class="mb-1">{{ $request['request'] }}</p>
                <small>{{ $request['user']['email'] }}</small>
            </div>
        @endforeach
    </ul>
@endsection

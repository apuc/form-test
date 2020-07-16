@extends('layouts/default.blade.php')

@section('title', 'Главная страница')

@section('content')

    <script src="../public/js/ajax/ajax_request_validation.js"></script>
    <link href="../public/validation/css/validation.css" rel="stylesheet">
    <script src="../public/validation/js/validation.js"></script>
    <div class="m-4">
        <h3>Заполнение заявки</h3>
        <form name="request-form" id="request-form" method="post">
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="name" name="name" class="form-control" id="name" placeholder="Введите имя" required min="1"
                       max="30">
                <small id="nameMessage" class="form-text"></small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email адрес</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                       placeholder="Введите email" required min="1" max="50">
                <small id="emailMessage" class="form-text"></small>
            </div>
            <div class="form-group">
                <label for="formControlSelect">Выберите город</label>
                <select name="city" class="form-control" id="formControlSelect">
                    @foreach($cities as $city)
                        <option value={{ $city['id'] }}>{{ $city['city'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="textarea">Заявка</label>
                <textarea name="request" class="form-control" id="textarea" rows="6" required min="1"
                          max="1000"></textarea>
                <small id="requestMessage" class="form-text"></small>
            </div>
            <button id="submit" name="submit" type="submit" class="btn btn-primary">Подтвердить</button>
        </form>
    </div>
@endsection
@extends('layouts.app')
@section('content')
<div class="container">
<form method="POST" id="id-form_messages" action="{{ route('editadd', ['id' => $_GET['id']]) }}" aria-label="{{ __('editadd') }}" >


        <div class="form-group">
            <div class="alert alert-primary" role="alert">
            <label for="name">№ записи : </label>
            {!!$_GET['id']!!}   
            </div>
        </div>

        <div class="form-group">
            <label for="name">Имя: </label>
            <span class="badge badge-info"> {{ Auth::user()->name }} </span>   
        </div>

        <div class="form-group">
            <label for="email">E-mail:</label>
            <span class="badge badge-pill badge-secondary"> {{ Auth::user()->email }}  </span>  
        </div>

        <div class="form-group">
            <label for="message">Сообщение:*</label>
            <textarea autofocus class="form-control" rows="5"  name="message" cols="50"
                      id="message">{!! $_GET['message'] !!}</textarea>
        </div>

        <div class="form-group">
            <input class="btn btn-success" type="submit" value="Добавить">
            <input type="button" class="btn btn-outline-danger" onclick="history.back();" value="Назад"/>
            <button type="reset" class="btn btn-danger">Очистить</button>
        </div>
    
@csrf
</form>
    </div>
@endsection

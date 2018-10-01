
@extends('index')

@section('content')
     
        @include('_common._form')
<hr>
    
<div class="alert alert-secondary">
        <div class="text-left"><b>Всего сообщений:</b> <i class="badge badge-pill badge-danger">{{$count}}</i></div>
        </div>
       <hr>

        @include('pages.messages._item')
@stop



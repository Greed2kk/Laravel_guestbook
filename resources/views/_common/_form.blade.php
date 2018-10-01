<form method="POST" id="id-form_messages" action="{{ route('add') }}" aria-label="{{ __('add') }}">
{{ csrf_field() }}

        <div class="form-group">
            <div class="alert alert-secondary" role="alert">
            <label for="name">Имя: </label>
            <span class="badge badge-info">{{ Auth::user()->name }} </span>
             </div>
        </div>

        <div class="form-group">
            <div class="alert alert-secondary" role="alert">
            <label for="email">E-mail:</label>
           <span class="badge badge-pill badge-secondary"> {{ Auth::user()->email }} </span>
            </div>
        </div>

        <div class="form-group">
            <label for="message">Сообщение:*</label>
            <textarea class="form-control" rows="5" placeholder="Текст сообщения" name="message" cols="50"
                      id="message"></textarea>
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Добавить">
        </div>
    
</form>
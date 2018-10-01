
<div class="messages" >
     
        @if (!$message->isEmpty())
         
            @foreach ($message as $messages)
             
          <div class="p-3 mb-2 bg-success text-white">
                <div class="card-header">
                    <h5 class="card-title">
                        
                        <span><strong>Отправитель: </strong>#{!! $messages->id !!}  
                             <span class="float-right"><strong>Время/дата: </strong>{{$messages->created_at}}</span>
                          <div class="media">
                              <img class="mr-3" src="{{asset('images/'.$messages->email.'.png')}}" class="figure-img img-fluid rounded" alt="empty">
                              </div>
                           <div class="media-body">
    <h5 class="mt-0">@if (is_null($messages->email))
                            {{ $messages->name }}
                            
                            @else
                            {{ $messages->name }}
                            <a href="mailto::{{$messages->email}}">{{$messages->email}}</a>
                            
                            @endif
                        </span></h5>
                          </div>
                    </h5>
                </div>
                <div class="card-body">  
                    <div class="alert alert-dark"> 
         <p><strong>Сообщение:</strong></p> <p class="lead">{{$messages->message}}</p>
                  </div>
                    
                    @if (Auth::user()->email === $messages->email)
                    
                    <div class="float-left">
                        
                        <form method="POST" id="id-editm" action="{{ route('editm', ['id' => $messages->id, 'message' => $messages->message]) }}" aria-label="{{ __('editm') }}" value="$s=$messages->id">
                            
                        <button class="btn btn-info">
                            <i class="material-icons">build</i>                        
                        </button>
                            @csrf
                        </form>

                        <form method="POST" id="id-delete" action="{{ route('del', ['id' => $messages->id]) }}" aria-label="{{ __('del') }}">
                            
                        <button class="btn btn-danger">
                            <i class="material-icons">delete</i>                        
                        </button>
                            @csrf
                        </form>
                        
                        @endif
                        
                    </div>
                    <br>
                   </div>
                </div>
            <br>
           <hr/>
                @endforeach
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        {{$message->links() }}
                    </ul>
                </nav>
              @else 
               <p><strong>Сообщений нет!</strong></p>
                @endif
        </div>
         
    


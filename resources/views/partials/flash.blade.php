@if(Session::has('flash_message'))
    <div class="alert alert-success {{Session::has('flash_message_important') ? 'alert-dismissible' : ''}}" role="alert">
        @if(Session::has('flash_message_important'))
            <button type="button" class="close" data-dismiss="alert"
                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
        @endif
        @if(Session::has('flash_message_title'))
            <strong>{{session('flash_message_title')}}</strong>
        @endif
        {{session('flash_message')}}
    </div>
@endif
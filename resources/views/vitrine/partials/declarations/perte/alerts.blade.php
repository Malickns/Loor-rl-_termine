@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    
    @endif

    <ul>
        @foreach ($errors->all() as $error)
            <li class="alert alert-danger">
                {{ $error }}
            </li>
        @endforeach    
    </ul>
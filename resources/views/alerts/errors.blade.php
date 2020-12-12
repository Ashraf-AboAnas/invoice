
 {{-- @if(Session::has('errors')) //نفس اللي تحتيها في الشرط --}}

 {{-- @if ($error->any()) --}}
 @if(Session::has('errors'))
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

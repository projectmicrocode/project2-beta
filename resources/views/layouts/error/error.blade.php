
@if (count($errors) > 0)
    <div class="error">
        <ul>
            @foreach ($errors->all() as $error)
                <li><span class="glyphicon glyphicon-exclamation-sign"></span> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <strong>{{ $error }}</strong><br/>
        @endforeach
    </div>
@endif
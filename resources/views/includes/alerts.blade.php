{{-- Alert per i flash messages --}}
@session('message')
    <div class="alert alert-{{session ('type', 'info')}} alert-dismissible fade show mb-0" role="alert">
        {{$value}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endsession 


{{-- Alert per errori --}}
@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
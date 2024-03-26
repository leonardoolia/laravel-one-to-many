@extends('layouts.app')

@section('title', 'Project')

@section('content')




<div class="card my-4">            
    <div class="card-header d-flex align-items-center gap-2">
        <strong>Tecnologie: </strong>{{$project->technologies}}        
    </div>
    <div class="card-body">
        <div class="row">
            @if($project->image)
            <div class="col-3 d-flex flex-column justify-content-between">
                <img src="{{asset('storage/'. $project->image)}}" class="card-img-top" alt="{{$project->title}}">

                <div>
                    <p class="card-title"><strong>Creato il: </strong>{{$project->created_at}}</p>
                    <p><strong>Vai al progetto: </strong> {{$project->url}}</p>
                </div>
            </div>
            @endif

            <div class="col">
                <h5 class="card-title">{{$project->title}}</h5>                
                <p class="card-text">{{$project->description}}</p>  
                                          
            </div>
        </div>
    </div>
</div>

<a href="{{route('guest.home')}}" class="btn btn-secondary">Torna indietro</a>

@endsection
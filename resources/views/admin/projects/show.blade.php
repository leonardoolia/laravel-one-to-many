@extends('layouts.app')

@section('title', 'Projects')

@section('content')

<header class="my-5 border-bottom">
    <h1>{{$project->title}}</h1>
</header>

<section id="project">

    <div class="clearfix">
        @if($project->image)
            <img src="{{asset('storage/'. $project->image)}}" alt="{{$project->title}}" class="me-2 float-start">    
        @endif
    

        <p>{{$project->description}}</p>

        <p><strong>Tecnologie utilizzate:</strong> {{$project->technologies}}</p>

        <div>
            <strong>Creato il:</strong> {{$project->getFormattedDate('created_at')}}   {{-- Funzione per cambiare formato della data, su Project model--}} 
            <strong>Ultima modifica:</strong> {{$project->getFormattedDate('updated_at')}}  {{-- Funzione per cambiare formato della data, su Project model--}}
        </div>

        <p class="mt-4"><strong>Vai al progetto: </strong><a href="{{$project->url}}">{{$project->url}}</a></p>

    </div>

</section>

<footer class="border-top my-4 py-4 d-flex align-items-center justify-content-between">
    <a href="{{route('admin.projects.index')}}" class="btn btn-secondary"><i class="fas fa-arrow-left me-2"></i>Torna indietro</a>

    <div class="d-flex align-items-center gap-4">
        {{-- Tasto per modificare il project--}}
        <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-warning"><i class="fas fa-pencil me-2"></i>Modifica</a>

        {{-- Tasto per eliminare il project --}}
        <form action="{{route('admin.projects.destroy', $project)}}" method="POST" class="delete-form">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-can me-2"></i>Elimina</button>
        </form>
    </div>

</footer>


@endsection

@section('scripts')
  {{-- Conferma cancellazione progetto --}}
  @vite('resources/js/delete_confirmation.js')
@endsection
@extends('layouts.app')

@section('title', 'Home')

@section('content')

<header class="margin-bottom">
    <h1>Progetti di Leonardo</h1>
    <address>Full Stack Web Developer</address>

{{-- Paginazione --}}
@if($projects->hasPages())
  {{$projects->links()}}
@endif

</header>

<section id="guest-home">
    <div class="row">
        @forelse ($projects as $project)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <strong>Tecnologie: </strong>{{$project->technologies}}
                    </div>
                    <div class="card-body">
                        @if($project->image)
                            <img src="{{asset('storage/'. $project->image)}}" class="card-img-top mb-3" alt="{{$project->title}}">
                        @endif
                        <h5 class="card-title">{{$project->title}}</h5>
                        <p><strong class="card-title">Data creazione: </strong> {{$project->created_at}}</p>
                        {{-- <p class="card-text">{{$project->description}}</p> --}}
                        <a href="{{route('guest.projects.show', $project->slug)}}" class="btn btn-primary">Vedi</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col">
                <h3 class="text-center">Non ci sono progetti da mostrare</h3>
            </div>
        @endforelse
    </div>
</section>

@endsection
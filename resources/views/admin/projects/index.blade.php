@extends('layouts.app')

@section('title', 'Progetti')

@section('content')

<header class="my-4 border-bottom">
    <h1>Progetti</h1>
</header>

<section id="projects-table">

<table class="table table-dark table-striped ">
    <thead>
      <tr>
        <th scope="col">N°</th>
        <th scope="col">Titolo</th>
        <th scope="col">Descrizione</th>
        <th scope="col">Tecnologie usate</th>
        <th scope="col">Tag</th>
        <th scope="col">Data di inizio</th>
        <th scope="col">Data di fine</th>
        <th scope="col">Status</th>
        <th>
          <div class="d-flex justify-content-end gap-2 align-items-center">
            <a href="{{route('admin.projects.trash')}}" class="btn btn-secondary"><i class="fas fa-trash me-2"></i>Cestino</a>
            <a href="{{route('admin.projects.create')}}" class="btn btn-sm btn-success"><i class="fas fa-plus me-2"></i>Nuovo progetto</a>
          </div>
        </th>
      </tr>
    </thead>
    <tbody>
        @forelse ($projects as $project)
        <tr>
            <th scope="row">{{$project->id}}</th>
            <td>{{$project->title}}</td>
            <td class="text-truncate" style="max-width: 200px;">{{$project->description}}</td>
            <td>{{$project->technologies}}</td>
            <td>
              @if($project->type)
                <span class="badge" style="background-color: {{$project->type->color}}">{{$project->type ? $project->type->label : '-'}}</span>
              @else 
                -
              @endif              
            </td>
            <td>{{$project->start_date}}</td>
            <td>{{$project->end_date}}</td>           
            <td>{{$project->status}}</td>
            <td>
              <div class="d-flex align-items-center justify-content-end gap-2">

                {{-- Tasto per il dettaglio --}}
                <a href="{{route('admin.projects.show', $project)}}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i>
                </a>
                
                  {{-- Tasto per modificare il project--}}
                  <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-sm btn-warning"><i class="fas fa-pencil"></i></a>
          
                  {{-- Tasto per eliminare il project --}}
                  <form action="{{route('admin.projects.destroy', $project)}}" method="POST" class="delete-form">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-can"></i></button>
                  </form>
              
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="9"> 
                <h2>Non è possibile visualizzare i progetti</h2>
            </td>
          </tr>           
        @endforelse      
    </tbody>
</table>

{{-- Paginazione --}}
@if($projects->hasPages())
  {{$projects->links()}}
@endif

</section>

@endsection


@section('scripts')
  {{-- Conferma cancellazione progetto --}}
  @vite('resources/js/delete_confirmation.js')
@endsection
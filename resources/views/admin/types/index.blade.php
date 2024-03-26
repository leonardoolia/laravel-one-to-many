@extends('layouts.app')

@section('title', 'Tag')

@section('content')

<header class="my-4 border-bottom">
    <h1>Tag</h1>
</header>

<section id="types-table">

<table class="table table-dark table-striped ">
    <thead>
      <tr>
        <th scope="col">N°</th>
        <th scope="col">Etichetta</th>        
        <th scope="col">Creato il</th>        
        <th scope="col">Ultima modifica</th>        
        <th>
          <div class="d-flex justify-content-end gap-2 align-items-center">
            <a href="{{route('admin.types.create')}}" class="btn btn-sm btn-success"><i class="fas fa-plus me-2"></i>Nuovo tag</a>
          </div>
        </th>
      </tr>
    </thead>
    <tbody>
        @forelse ($types as $type)
        <tr>
            <th scope="row">{{$type->id}}</th>
            <td><span class="badge" style="background-color: {{$type->color}}">{{$type->label}}</span>   </td>
            <td>{{$type->created_at}}</td>            
            <td>{{$type->updated_at}}</td>            
            <td>
              <div class="d-flex align-items-center justify-content-end gap-2">
               
                  {{-- Tasto per modificare il type--}}
                  <a href="{{route('admin.types.edit', $type)}}" class="btn btn-sm btn-warning"><i class="fas fa-pencil"></i></a>
          
                  {{-- Tasto per eliminare il type --}}
                  <form action="{{route('admin.types.destroy', $type)}}" method="POST" class="delete-form">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-can"></i></button>
                  </form>
              
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="3"> 
                <h2>Non è possibile visualizzare i tag</h2>
            </td>
          </tr>           
        @endforelse      
    </tbody>
</table>

</section>

@endsection


@section('scripts')
  {{-- Conferma cancellazione progetto --}}
  @vite('resources/js/delete_confirmation.js')
@endsection
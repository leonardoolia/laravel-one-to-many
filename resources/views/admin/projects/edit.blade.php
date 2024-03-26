@extends('layouts.app')

@section('title', 'Modifica progetto')

@section('content')

<header class="my-4 border-bottom">
    <h1>Modifica progetto</h1>
</header>

<section id="edit-project-form">
    @include('includes.projects.form')
</section>

@endsection

@section('scripts')
    @vite('resources/js/image_preview.js')
@endsection

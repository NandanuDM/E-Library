@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Jumbotron component -->
    <div class="jumbotron">
        <h1 class="display-4">{{ $data['title'] }}</h1>
        <p class="lead">{{ $data['description'] }}</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('books.index') }}" role="button">Go To Book</a>
    </div>
@endsection
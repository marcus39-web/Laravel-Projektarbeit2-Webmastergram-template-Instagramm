@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Neuen Post erstellen</a>

    <!-- Hier könnten die Posts aufgelistet werden -->
</div>
@endsection
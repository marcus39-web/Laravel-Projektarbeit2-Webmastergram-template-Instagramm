@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nachricht senden</h1>

    <form action="{{ route('send.email') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Empfänger E-Mail</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="subject">Betreff</label>
            <input type="text" name="subject" id="subject" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="message">Nachricht</label>
            <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Senden</button>
    </form>
</div>
@endsection
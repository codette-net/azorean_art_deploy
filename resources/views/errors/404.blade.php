@extends('layouts.app')

@section('title', 'Page not found')

@section('content')
    <main class="main-wrapper">
        <section class="section wrapper">
            <header class="section-heading">
                <p class="eyebrow">404</p>
                <h1>Page not found</h1>
                <p>
                    Sorry, the page you are looking for could not be found.
                    It may have moved, or the link may be incorrect.
                </p>
            </header>

            <div class="hero-actions">
                <a href="{{ url('/') }}" class="button primary">Back to home</a>
                <a href="{{ url('/joao-cagarro') }}" class="button secondary">View João Cagarro</a>
            </div>
        </section>
    </main>
@endsection

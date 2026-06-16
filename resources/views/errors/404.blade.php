@extends('layouts.app')

@section('title', 'Page not found')

@section('content')
    <div class="main-wrapper">
        <main>
            <section class="section wrapper">
                <article>
                    <header class="section-heading rj-box">
                        <p class="eyebrow">404</p>
                        <h2>Page not found</h2>
                        <p>
                            Sorry, the page you are looking for could not be found.
                            It may have moved, or the link may be incorrect.
                        </p>
                    </header>

                    <div class="hero-actions">
                        <a href="{{ url('/') }}" class="button primary">Back to home</a>
                        <a href="{{ url('/joao-cagarro') }}" class="button primary">View João Cagarro</a>
                    </div>
                </article>
            </section>
        </main>
        @endsection

    </div>

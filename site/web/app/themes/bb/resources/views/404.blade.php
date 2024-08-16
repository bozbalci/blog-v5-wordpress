@extends('layouts.app')

@section('content')
  @if (!have_posts())
    <section class="wrapper">
      <div class="prose mx-auto">
        <h1>404</h1>
        <p>
          The page is not found.
        </p>
        <p>
          <a href="/">Back to the home page</a>
        </p>
      </div>
    </section>
  @endif
@endsection

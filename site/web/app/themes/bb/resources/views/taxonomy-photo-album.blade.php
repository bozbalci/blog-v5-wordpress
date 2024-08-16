@extends("layouts.app")

@section("content")
  <section class="wrapper">
    <header>
      <a href="/gallery">Photos</a> / <span>{{ single_term_title() }}</span>
    </header>
    <div class="image-gallery">
      @while(have_posts())
        @php(the_post())

        <a href="{{ the_permalink() }}">
          {!! wp_get_attachment_image(get_field("photo"), "medium") !!}
        </a>
      @endwhile
    </div>
  </section>
@endsection

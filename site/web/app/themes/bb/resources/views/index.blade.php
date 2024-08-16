@extends("layouts.app")

@section("content")
  <article class="wrapper">
    <div class="prose mx-auto">
      <h1>Hello there!</h1>
      <p>
        My name is Berk and I'm a software engineer, coffee enthusiast,
        amateur photographer and musician living in London.
      </p>
      <p>
        I'm currently working for Apple, making Apple Pay work for billions
        of customers around the world.
      </p>
      <p>
        This is my little home on the internet, my online presence outside
        social media.
      </p>

      <h2>Writing</h2>
      <div class="post-list">
        @while(have_posts())
          @php(the_post())
          <div class="post-thumbnail">
            <a href="{{ the_permalink() }}">
              {!! the_title() !!}
            </a>
            <time>
              {{ get_the_date() }}
            </time>
          </div>
        @endwhile
      </div>

    </div>
  </article>
@endsection

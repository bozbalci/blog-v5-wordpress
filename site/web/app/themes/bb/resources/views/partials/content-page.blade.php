<article id="post-@php(the_ID())" @php(post_class("h-entry wrapper"))>
  <div id="article-container" class="prose mx-auto">
    <header class="post-header">
      @if(is_singular())
        {{ the_title('<h1 class="entry-title">', "</h1>") }}
      @else
        {{ the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', "</a></h2>") }}
      @endif
      @include("partials.entry-meta")
    </header>
    {!! the_content() !!}
  </div>
</article>

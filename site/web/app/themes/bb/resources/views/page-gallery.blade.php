@extends("layouts.app")

@section("content")
  @php
    $photos = new WP_Query(["post_type" => "photo"]);
    $terms = get_terms(["taxonomy" => "photo-album", "hide_empty" => true]);
  @endphp

  <div class="wrapper">
    <ul class="flex items-center space-x-2xs">
      @foreach($terms as $term)
        @php($term_link = get_term_link($term))
        @if(!is_wp_error($term_link))
          <li>
            <a href="{{ esc_url($term_link) }}">
              {{ esc_html($term->name) }}
            </a>
          </li>
        @endif
      @endforeach
    </ul>
  </div>
  <div class="wrapper image-gallery mt-xs" id="gallery">
    @while($photos->have_posts())
      @php($photos->the_post())
      <a href="{{ the_permalink() }}">
        {!! wp_get_attachment_image(get_field("photo"), "medium") !!}
      </a>
    @endwhile
  </div>
@endsection

<article id="post-@php(the_ID())" @php(post_class("h-entry wrapper"))>
  <div id="article-container" class="prose mx-auto">
    <div id="lg-single">
      {!! $image_markup !!}
    </div>

    <div class="image-meta">
      <div class="">
        <div class="e-camera">
          <span class="e-make">{{ $exif_make }}</span>
          <span class="e-model">{{ $exif_model  }}</span>
        </div>
        <div>
          <span class="e-lens">{{ $exif_lens }}</span>
        </div>
        <div>
          <span class="e-focal-length">{{ $exif_focal_length }}</span>,
          <span class="e-aperture">{!! $exif_aperture !!}</span>,
          <span class="e-shutter">{{ $exif_shutter }}</span>,
          <span class="e-iso">{{ $exif_iso }}</span>
        </div>
      </div>
      <div class="text-right">
        @if(!empty($title))
          <div>
            <span class="e-title">&ldquo;{{ $title }}&rdquo;</span>
          </div>
        @endif
        <div>
          <span class="e-uploaded">Uploaded on <time>{{ get_the_date() }}</time></span>
        </div>
        <div>
          <span class="e-taken">Taken on <time>{{ $exif_shot_at }}</time></span>
        </div>
      </div>
    </div>
  </div>

  <div class="max-width-prose mx-auto font-serif mt-s">
    <ul>
      <li>
        <a href="/gallery">Back to the gallery</a>
      </li>
      @foreach($terms as $term)
        <li>
          <a href="{{ esc_url(get_term_link($term)) }}">
            Back to the album '{{ esc_html($term->name) }}'
          </a>
        </li>
      @endforeach
    </ul>
  </div>
</article>

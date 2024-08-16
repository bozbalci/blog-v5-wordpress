<div class="entry-meta">
  <div>
    Posted on
    <a href="{{ the_permalink() }}" rel="bookmark"><time class="entry-date published" datetime="{{ get_the_date(DATE_W3C) }}">{{ get_the_date() }}</time></a>
    @if(get_the_time("U") !== get_the_modified_time("U"))
      &middot; last updated
      <time class="updated" datetime="{{ get_the_modified_date(DATE_W3C) }}">
        {{ get_the_modified_date() }}
      </time>
    @endif
  </div>
</div>

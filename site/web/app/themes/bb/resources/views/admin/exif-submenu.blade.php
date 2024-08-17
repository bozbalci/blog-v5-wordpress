<div class="wrap">
  <h1>Rescan EXIF</h1>
  <form method="post" action="">
    {!! submit_button("Rescan All Image EXIF Data") !!}
  </form>
  @if($didPost)
    <p>All EXIF metadata has been re-processed.</p>
    <p>Oh by the way, even <em>this</em> is a fucking Laravel Blade template.</p>
  @endif
</div>

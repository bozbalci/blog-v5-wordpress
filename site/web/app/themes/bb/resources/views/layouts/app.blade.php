<!doctype html>
<html class="no-js" @php(language_attributes())>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @php(do_action('get_header'))
  @php(wp_head())
</head>

<body @php(body_class())>
@php(wp_body_open())

<a href="#main-content" class="visually-hidden focusable">Skip to main content</a>

@include("sections.header")

<main id="main-content" class="main">
  @yield('content')
</main>

@include('sections.footer')

@php(do_action('get_footer'))
@php(wp_footer())

</body>
</html>

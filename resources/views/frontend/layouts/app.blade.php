<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title> @yield('title') | Text to speech</title>
    <meta
      name="description"
      content="Dex.AI - AI Writer & Tech Startup Landing Page Template"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Place favicon.ico in the root directory -->
    <link
      rel="shortcut icon"
      type="image/x-icon"
      href="assets/img/favicon.png"
    />

    <!-- All style list Here -->
    @include('frontend.layouts.partials.dist.style')
  </head>

  <body>
    <!-- Preloader and Scroll to top part include -->
    @include('frontend.layouts.partials.preloader')
    @include('frontend.layouts.partials.scroll_to_top')

    <!-- Header part include -->
    @include('frontend.layouts.partials.header')

        @yield('content')

    <!-- Footer part include -->
    @include('frontend.layouts.partials.footer')

    <!-- All Script Here -->
    @include('frontend.layouts.partials.dist.script')
  </body>
</html>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/css/all.min.css') }}"  />
    <script src="{{ mix('/js/app.js') }}" defer></script>
    @inertiaHead
  </head>
  <body class="">
    @inertia

    <script src="{{ asset('/js/all.min.js') }}" defer></script>
  </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    a {
      text-decoration: none;
    }
  </style>
  @yield('custom-css')
</head>
<body>
  @if (\Auth::check()) 
    @include('partials.navbar')
  @endif

  @if (session()->has('notification.success'))
    <div class="mb-3">
      <div class="alert alert-success" role="alert">
        {{ session()->get('notification.success') }}
      </div>
    </div>
  @endif

  @yield('content')

  @yield('custom-script')

  @if (session()->has('swal.fire')) 
    @php 
      $swal = session()->get('swal.fire');
    @endphp
    <script>
      Swal.fire({
        title: "{{ $swal['title'] }}",
        text: "{{ $swal['message'] }}",
        icon: "success"
      });
    </script>
  @endif
</body>
</html>
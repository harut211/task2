
{{--@section('title', 'sdada')--}}
<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
</head>
<body>
   <form action="{{route('auth-login')}}" method="get">
       @csrf
          <meta name="csrf-token" content="{{ csrf_token() }}">
        <input type="text" name="login" id="login"><br>
        <input type="password" name="password" id="password">
        <button class="btn btn-primary">Log in</button>
    </form>
</body>
</html>
{{--@section('page-content')--}}
{{--    <button class="btn"></button>--}}
{{--@endsection--}}

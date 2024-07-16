
<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
</head>
<body>
   <form action="{{route('auth-login')}}" method="get">
        <input type="text" name="login" id="login"><br>
        <input type="password" name="password" id="password">
        <button class="btn btn-primary">Log in</button>
    </form>
</body>
</html>

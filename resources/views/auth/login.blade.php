
    <!DOCTYPE html>
    <html>
    <head>
        <title>A Meaningful Page Title</title>

    </head>
    <body>

    <form action="{{route('signin')}}" method="get">
        @csrf <!-- {{ csrf_field() }} -->
        <input type="text" name="login"><br>
        <input type="password" name="password">
        <button>Log in</button>
    </form>
    </body>
    </html>

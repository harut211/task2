
<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
</head>
<body>
<div>{{session('success')}}</div>
    <form action="{{route('post-create')}}" method="post">
        @csrf
        @method("POST")
        <input type="text" id="title" name="title"><br>
        <textarea id="content" name="content"></textarea><br>
        <button class="btn">Publish</button>
    </form>

<a href="{{route('logout')}}">logout</a>
</body>
</html>

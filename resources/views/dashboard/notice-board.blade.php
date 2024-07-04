
<!DOCTYPE html>
<html>
<head>
    <title>A Meaningful Page Title</title>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
</head>
<body>
@foreach($posts as $post)
    <div style="display: block;margin-bottom: 20px;padding: 20px;background-color: #a0aec0">
        <div>Title--
            {{$post->title}}
        </div>
        <span>Content--
            {{$post->content}}
        </span>
    </div>

@endforeach
<script>
    $(document).ready(function () {
        setTimeout(function () {
            location.reload(true);
        }, 1000);
    });
</script>
</body>
</html>

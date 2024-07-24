<!DOCTYPE html>
<html>
<head>
    <title>A Meaningful Page Title</title>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<button class="btn btn-primary">
    <a href="{{route('login')}}" style="color: white ">Log In</a>
</button>
<div class="card" id="post">
    @foreach($posts as $post)
        <div class="alert alert-success" style="margin: 10px;">
            <div>Title--
                {{$post->title}}
            </div>
            <span>Content--
                {{$post->content}}
                </span>
        </div>
    @endforeach
</div>

<script type="module">
    $(function () {

        window.Echo.channel('post').listen('PostSendEvent', (e) => {
            let data = e.data;
            let title = data.title;
            let content = data.content;
            const element = document.getElementById('post');
            let div = `
         <div class="alert alert-success" style="margin: 10px; " >
            <div>Title--${title}</div>
            <span>Content${content}</span>
        </div>
            `
            element.insertAdjacentHTML('afterbegin', div);
            console.log(post);
        })
    })

</script>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
    <title>A Meaningful Page Title</title>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@foreach($posts as $post)
    <div id="post" style="display: block;margin-bottom: 20px;padding: 20px;background-color: #a0aec0">
        <div>Title--
            {{$post->title}}
        </div>
        <span>Content--
            {{$post->content}}
        </span>
    </div>

@endforeach
<script type="module">
    $(function(){
    

    window.Echo.channel('post').listen('PostSendEvent',(e) =>{
        let data = e.data;
        let post = data[0];
        let title = post.title;
        let content = post.content;
        const element = document.getElementById('post');
        let div =  `
        <div style="margin:20px">
            <div>Title--${title}</div>
            <span>Content${content}</span>
        </div>
            `

            element.insertAdjacentHTML('beforeend', div);
        console.log(post);
    })
    })
  
</script>
</body>
</html>

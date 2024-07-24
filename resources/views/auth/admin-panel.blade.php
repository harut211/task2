
<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    @vite(['resources/sass/app.scss'])
</head>
<body>
@if(!empty(session('success')))
    <div class="alert alert-success">{{session('success')}}</div>
@endif

<div class="card">
    <div class="card-body">
        <div class="container ">
            <form action="{{route('post-create')}}" method="post">
                @csrf
                @method("POST")
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <input type="text" id="title" name="title" class="form-control" >
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                    <textarea  id="content" name="content" class="form-control"  rows="3"></textarea>
                </div>
                <button class="btn btn-success">Publish</button>
            </form>
            <button class="btn btn-danger">
                <a href="{{route('logout')}}" style="color: white">logout</a>
            </button>
        </div>
    </div>
</div>

</body>
</html>



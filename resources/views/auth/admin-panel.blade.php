<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
{{--    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>--}}
</head>
<body>

    <form action="{{route('logout')}}" method="post">
        @csrf
        <input type="text" id="title" name="title"><br>
        <textarea id="content" name="content"></textarea><br>
{{--     <meta name="csrf-token" content="{{ csrf_token() }}">--}}
        <button class="btn">Publish</button>
    </form>
{{--    <script>--}}
{{--        $(function (){--}}
{{--            $('.btn').on('click',function (e){--}}
{{--                e.preventDefault()--}}
{{--                let title = $('#title').val();--}}
{{--                let content = $('#content').val();--}}
{{--                $.ajax({--}}
{{--                    headers: {--}}
{{--                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                    },--}}
{{--                    url: "/post",--}}
{{--                    type: 'POST',--}}
{{--                    accepts: "application/json",--}}
{{--                    data: {--}}
{{--                        'title':title,--}}
{{--                        'content':content--}}
{{--                    },--}}
{{--                    success: function(result){--}}
{{--                     --}}
{{--                    }});--}}
{{--            });--}}
{{--        })--}}
{{--    </script>--}}
</body>
</html>

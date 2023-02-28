<!DOCTYPE html>
<head>
<title>Post</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>
<body>
<table class="table text-center table-bordered"> 
    <tr>
        <th>Topic</th>
        <th>Content</th>
        <th>Author</th>
        <th>Created</th>
        <th>Updated</th>
        @if (Auth::user() and Auth::user()->role == 'Admin')
        <th>Delete</th>
        @endif
    </tr>
@foreach ($post as $pst)
    <tr>
            <td>{{$pst->post_topic}}</td>
            <td>{{$pst->post_content}}</td>
            <td>{{$pst->post_by}}</td>
            <td>{{$pst->created_at}}</td>
            <td>{{$pst->updated_at}}</td>
            @if (Auth::user() and Auth::user()->role == 'Admin')
            <td><a href="{{ route('delete.post', $pst->id) }}">Delete</a></td>
            @endif
    </tr>
@endforeach
</table>
<div class="text-center mx-5">
    <button onclick="location.href='{{ $_SERVER['HTTP_REFERER'] }}'" type="button">Go Back</button>
</div>
</body>
</html>
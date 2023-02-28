<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        Create Category
    </title>
</head>
<body>
<div class="container">
    <div class="row">
        <h1>Create Category</h1>
        <form action="{{route('custom.create.category')}}" class="form" method="POST">
            {{ csrf_field() }}
            <div class="form-group @if($errors->has('category_name')) has-error @endif">
                <label>Name of category</label>
                <input type="category_name" class="form-control" name="category_name">
                <span class="text-danger">{{ $errors->first('category_name') }}</span>
            </div>
            <div class="form-group @if($errors->has('description')) has-error @endif">
                <label>Description</label>
                <textarea class="form-control" name="description" cols="3" rows="5"></textarea>
                <span class="text-danger">{{ $errors->first('description') }}</span>
            </div>
            <br>
            <div class="form-group">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
			</div>
        </div>
</body>
</html>
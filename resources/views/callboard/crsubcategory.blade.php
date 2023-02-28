<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        Create Subcategory
    </title>
</head>
<body>
<div class="container">
    <div class="row">
        <h1>Create Subcategory</h1>
        <form action="{{route('custom.create.subcategory')}}" class="form" method="POST">
            {{ csrf_field() }}
            <div class="form-group @if($errors->has('subcategory_name')) has-error @endif">
                <label>Name of subcategory</label>
                <input type="subcategory_name" class="form-control" name="subcategory_name">
                <span class="text-danger">{{ $errors->first('subcategory_name') }}</span>
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
            <div class="form-group mb-3">
            <strong>Select category:</strong>
            <select class="js-example-basic-multiple form-control" id="category" name="category" multiple="multiple">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id === old('category_id') ? 'selected' : '' }}>{{ $category->category_name }}</option>
            @endforeach
</select>
            </div>
        </form>
			</div>
        </div>
        <script>
  $('#category').select2({
    width: '100%',
    placeholder: "Select category",
    tags: true,
    multiple: true,
    tokenSeparators: [', '],
    allowClear: true,
  });
</script>
</body>
</html>
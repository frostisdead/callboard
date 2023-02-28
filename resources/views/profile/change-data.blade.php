<!DOCTYPE html>
<html class="container border border-secondary">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<body class="justify-content-center text-center p-5">
	<form action="{{ route('custom.profile.change', $user->id) }}" method="post">
	<!-- <form action="" method="post">	 -->
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
 	<p>Name: <input type="text" name="name"/></p>
    <p>E-mail: <input type="text" name="email"/></p>
 	<button type="submit" class=""><span>Отправить</span></button>
	<button onclick="location.href='{{ route('profiles') }}'" type="button">Go back to Profiles</button>
</form>
</html>
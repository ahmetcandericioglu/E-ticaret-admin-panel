@component('mail::message')
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Hello {{ $user->username }},</h1>
<p>We understand this happens.</p>
@component('mail::button', ['url' => url('reset/', $user->remember_token)])
    Reset Your Password
@endcomponent
<p>In case you have any issues recovering your password, please contact us. </p>
Thanks <br>
{{ config('app.name') }}
</body>
</html>

@endcomponent

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Search Dogs Sussex</title>

    <!-- Bootstrap Core CSS >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- link href="css/bootstrap.min.css" rel="stylesheet" -->
    <!-- Page specific css -->
@yield('headcss')
<!-- Custom CSS -->
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>


    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    <!-- Js imports -->
    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script-->
    <script src="{{ mix('/js/app.js') }}"></script>
    @yield('headjs')

</head>

<body>

@yield('body')



@yield('scripts')
</body>

</html>
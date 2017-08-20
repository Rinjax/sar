<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Search Dogs Sussex</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- link href="css/bootstrap.min.css" rel="stylesheet" -->
    <!-- Page specific css -->
    @yield('headcss')
    <!-- Custom CSS -->
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link href="css/menu.css" rel="stylesheet">
    <link href="css/SAR.css" rel="stylesheet">
    
    <!-- Js imports -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    @yield('headjs')
    
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-lg-2">
                <nav class="navbar navbar-default navbar-fixed-side">
                    <div class="container">
                        <div class="navbar-header">
                            <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <img class="img-responsive img-circle menu-logo" alt="logo" src="img/SAR logo.png"/>
                            <div class="navbar-brand">SD Members Portal </div>
                        </div>
                        <div class="collapse navbar-collapse">
                            {!! $MyNavBar->asUl( array('class' => 'nav navbar-nav text-center')) !!}
                        <p class="navbar-text">
                            <strong>Made by</strong> Steve Temple
                        </p>
                    </div>
                </div>
            </nav>
        </div>
        
        <!-- ///////////////////
             Main Content Area 
            ///////////////////
        -->
          
        <div class="col-sm-9 col-lg-10">
            <div class="row content-header">
                @yield('title')
            </div>
            <div id="content">
                @yield('content')
            </div>
        </div>
    </div>

    
    <!-- Bootstrap js -->
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>

</html>

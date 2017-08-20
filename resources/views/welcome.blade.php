<!DOCTYPE html>
<html>
    <head>
        <title>DS Sussex</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
                /* background-image: url("/img/background.jpg");
                background-repeat: no-repeat;
                background-size:100%;*/
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
                color: red;
            }


.myButton {
	-moz-box-shadow: 3px 4px 0px 0px #8a2a21;
	-webkit-box-shadow: 3px 4px 0px 0px #8a2a21;
	box-shadow: 3px 4px 0px 0px #8a2a21;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #c62d1f), color-stop(1, #f24437));
	background:-moz-linear-gradient(top, #c62d1f 5%, #f24437 100%);
	background:-webkit-linear-gradient(top, #c62d1f 5%, #f24437 100%);
	background:-o-linear-gradient(top, #c62d1f 5%, #f24437 100%);
	background:-ms-linear-gradient(top, #c62d1f 5%, #f24437 100%);
	background:linear-gradient(to bottom, #c62d1f 5%, #f24437 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#c62d1f', endColorstr='#f24437',GradientType=0);
	background-color:#c62d1f;
	-moz-border-radius:18px;
	-webkit-border-radius:18px;
	border-radius:18px;
	border:1px solid #d02718;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:22px;
	padding:15px 100px;
	text-decoration:none;
	text-shadow:0px 1px 0px #810e05;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #f24437), color-stop(1, #c62d1f));
	background:-moz-linear-gradient(top, #f24437 5%, #c62d1f 100%);
	background:-webkit-linear-gradient(top, #f24437 5%, #c62d1f 100%);
	background:-o-linear-gradient(top, #f24437 5%, #c62d1f 100%);
	background:-ms-linear-gradient(top, #f24437 5%, #c62d1f 100%);
	background:linear-gradient(to bottom, #f24437 5%, #c62d1f 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f24437', endColorstr='#c62d1f',GradientType=0);
	background-color:#f24437;
}
.myButton:active {
	position:relative;
	top:1px;
}


            
            .pulse2 {
	-webkit-animation: pulse2 2s linear infinite;
	-moz-animation: pulse2 2s linear infinite;
	-ms-animation: pulse2 2s linear infinite;
	animation: pulse2 2s linear infinite;
}

@keyframes "pulse2" {
 0% {
    -webkit-transform: scale(1);
   	-moz-transform: scale(1);
   	-o-transform: scale(1);
   	-ms-transform: scale(1);
   	transform: scale(1);
 }
 50% {
    -webkit-transform: scale(0.8);
   	-moz-transform: scale(0.8);
   	-o-transform: scale(0.8);
   	-ms-transform: scale(0.8);
   	transform: scale(0.8);
 }
 100% {
    -webkit-transform: scale(1);
   	-moz-transform: scale(1);
   	-o-transform: scale(1);
   	-ms-transform: scale(1);
   	transform: scale(1);
 }

}

@-moz-keyframes pulse2 {
 0% {
   -moz-transform: scale(1);
   transform: scale(1);
 }
 50% {
   -moz-transform: scale(0.8);
   transform: scale(0.8);
 }
 100% {
   -moz-transform: scale(1);
   transform: scale(1);
 }

}

@-webkit-keyframes "pulse2" {
 0% {
   -webkit-transform: scale(1);
   transform: scale(1);
 }
 50% {
   -webkit-transform: scale(0.8);
   transform: scale(0.8);
 }
 100% {
   -webkit-transform: scale(1);
   transform: scale(1);
 }

}

@-ms-keyframes "pulse2" {
 0% {
   -ms-transform: scale(1);
   transform: scale(1.1);
 }
 50% {
   -ms-transform: scale(0.8);
   transform: scale(0.8);
 }
 100% {
   -ms-transform: scale(1);
   transform: scale(1);
 }
 
 @media all and (max-width: 768px) {
/* 768px is usually the width of tablets in portrait orientation */
/* You can use any other size you see fit */

.logo{
    height: 150px;
}
}
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <img class="logo" src="img/chihu.jpg"/>
                <div class="title pulse2"><a href="/login" class="myButton">Login now!</a></div>
            </div>
        </div>
    </body>
</html>

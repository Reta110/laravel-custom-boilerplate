<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- made by www.metatags.org -->
    <meta name="description" content="Laravel Boilerplate, downlooad laravel with all yours plugins, select componete" />
    <meta name="keywords" content="larave, boilerplate, custom, customized, componentes, packagist" />
    <meta name="author" content="metatags generator">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="3 month">
    <title>Laravel Boilerplate</title>
    <!-- laravel, boilerplate -->

    <link rel="icon" href="../../favicon.ico">

    <title>Laravel BoilerPlate</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link rel="stylesheet" href="css/checkbox">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/ready.js"></script>
    <script src="https://cdn.jsdelivr.net/clipboard.js/1.5.5/clipboard.min.js"></script>

    <link rel="stylesheet" href="css/prism.css">
    <script src="js/prism.js"></script>

    <script>var _gaq = [['_setAccount', 'UA-33746269-1'], ['_trackPageview']];</script>
    <script src="http://www.google-analytics.com/ga.js" async></script>
    <link rel="icon" type="image/png" href="/css/img/ico.png" />
</head>

<body>

<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '647874322016961',
            xfbml      : true,
            version    : 'v2.5'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">

             @yield('content')

            <div class="col-md-6 pull-left">
                <p class="pull-left">
                    <a href="https://twitter.com/share" class="twitter-share-button"{count} data-url="http://www.laravelboilerplate.com.ve/" data-hashtags="LaravelBoilerplate">Tweet</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                </p>
                <p class="pull-left">
                    &nbsp; <div class="fb-like" data-href="http://www.laravelboilerplate.com.ve/" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
                </p>
            </div>
             <div class="col-md-6 pull-left">
                <p class="text-right">See <a href="https://github.com/Reta110/laravel-custom-boilerplate">GitHub</a> project.</p>
                <p class="text-right">@Reta110</p>
            </div>

        </div>
    </div>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>

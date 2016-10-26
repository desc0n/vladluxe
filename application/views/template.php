<!DOCTYPE html>
<html lang="en">
<head>
    <title>Realestate Bootstrap Theme </title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" type="image/png" href="/images/fav.png">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="/assets/style.css"/>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.js"></script>
    <script src="/assets/script.js"></script>
    <!-- Owl stylesheet -->
    <link rel="stylesheet" href="/assets/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="/assets/owl-carousel/owl.theme.css">
    <script src="/assets/owl-carousel/owl.carousel.js"></script>
    <!-- Owl stylesheet -->
    <!-- slitslider -->
    <link rel="stylesheet" type="text/css" href="/assets/slitslider/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/assets/slitslider/css/custom.css" />
    <script type="text/javascript" src="/assets/slitslider/js/modernizr.custom.79639.js"></script>
    <script type="text/javascript" src="/assets/slitslider/js/jquery.ba-cond.min.js"></script>
    <script type="text/javascript" src="/assets/slitslider/js/jquery.slitslider.js"></script>
    <!-- slitslider -->
</head>

<body>


<!-- Header Starts -->
<div class="navbar-wrapper">

    <div class="navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">


                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar">

          </span>
                    <span class="icon-bar">

          </span>
                    <span class="icon-bar">

          </span>
                </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="/">Главная</a>
                    </li>
                    <li>
                        <a href="/page/about">О нас</a>
                    </li>
                    <li>
                        <a href="/contact">Контакты</a>
                    </li>
                </ul>
            </div>
            <!-- #Nav Ends -->

        </div>
    </div>

</div>
<!-- #Header Starts -->





<div class="container">

    <!-- Header Starts -->
    <div class="header">
        <a href="/">
            <img src="/images/logo.png" alt="">
        </a>

        <ul class="pull-right">
            <li>
                <a href="/buysalerent">Купить</a>
            </li>
            <li>
                <a href="/buysalerent">Продать</a>
            </li>
            <li>
                <a href="/buysalerent">Аренда</a>
            </li>
        </ul>
    </div>
    <!-- #Header Starts -->
</div>
<div class="">
<?=$content;?>
</div>


<div class="footer">

    <div class="container">



        <div class="row">
            <div class="col-lg-3 col-sm-3">
                <h4>Информация</h4>
                <ul class="row">
                    <li class="col-lg-12 col-sm-12 col-xs-3">
                        <a href="/page/about">О нас</a>
                    </li>
                    <li class="col-lg-12 col-sm-12 col-xs-3">
                        <a href="/contact">Контакты</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-3 col-sm-3">
                <h4>Сообщение</h4>
                <p>Получать уведомление о новинках</p>
                <form class="form-inline" role="form">
                    <input type="text" placeholder="E-mail" class="form-control">
                    <button class="btn btn-success" type="button">Отправить</button>
                </form>
            </div>

            <div class="col-lg-3 col-sm-3">
                <h4>Мы в соцсетях</h4>
                <a href="#">
                    <img src="/images/facebook.png" alt="facebook">
                </a>
                <a href="#">
                    <img src="/images/twitter.png" alt="twitter">
                </a>
                <a href="#">
                    <img src="/images/linkedin.png" alt="linkedin">
                </a>
                <a href="#">
                    <img src="/images/instagram.png" alt="instagram">
                </a>
            </div>

            <div class="col-lg-3 col-sm-3">
                <h4>Как связаться</h4>
                <p>
                    <b>Bootstrap Realestate Inc.</b>
                    <br>
                    <span class="glyphicon glyphicon-map-marker">

          </span> 8290 Walk Street, Australia <br>
                    <span class="glyphicon glyphicon-envelope">

          </span> hello@bootstrapreal.com<br>
                    <span class="glyphicon glyphicon-earphone">

          </span> (123) 456-7890</p>
            </div>
        </div>
        <p class="copyright">Copyright 2016. All rights reserved.	</p>


    </div>
</div>




<!-- Modal -->
<div id="loginpop" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="row">
                <div class="col-sm-6 login">
                    <h4>Login</h4>
                    <form class="" role="form">
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail2">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputPassword2">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember me
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success">Sign in</button>
                    </form>
                </div>
                <div class="col-sm-6">
                    <h4>New User Sign Up</h4>
                    <p>Join today and get updated with all the properties deal happening around.</p>
                    <button type="submit" class="btn btn-info"  onclick="window.location.href='register.php'">Join Now</button>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /.modal -->



</body>
</html>
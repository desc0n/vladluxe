<!DOCTYPE html>
<html lang="en">
<head>
    <title>Агенство недвижимости Люкс</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" type="image/png" href="/images/fav.png">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="/assets/style.css"/>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.js"></script>
    <script src="/assets/bootstrap/js/bootstrap3-typeahead.js"></script>
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
                    <li class="dropdown">
                        <a data-toggle="dropdown" href="#">Аренда квартир</a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <li>
                                <a href="#">Комната</a>
                                <a href="#">Гостинка</a>
                                <a href="#">1 комнатная</a>
                                <a href="#">2 комнатная</a>
                                <a href="#">3 комнатная</a>
                                <a href="#">4 комнаты и более</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Сдать квартиру</a>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" href="#">Аренда домов</a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <li>
                                <a href="#">Частный дом</a>
                                <a href="#">Котедж</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Вакансии</a>
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
                    <b>Агенство недвижимости "Люкс"</b>
                    <br>
                    <span class="glyphicon glyphicon-map-marker"></span>
                        Владивосток, ул. Ад. Юмашева, 35/1 <br>
                    <span class="glyphicon glyphicon-envelope"></span>
                        hello@bootstrapreal.com<br>
                    <span class="glyphicon glyphicon-earphone">/span>
                        (123) 456-7890
                </p>
            </div>
        </div>
        <p class="copyright">&copy; <?=date('Y');?>. Все права защищены.	</p>
    </div>
</div>
</body>
</html>
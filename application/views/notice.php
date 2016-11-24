<!-- banner -->
<div class="inside-banner">
    <div class="container">
        <span class="pull-right"><a href="/">Главная</a> / Купить</span>
        <h2>Купить</h2>
    </div>
</div>
<!-- banner -->


<div class="container">
    <div class="properties-listing spacer">

        <div class="row">
            <div class="col-lg-3 col-sm-4 hidden-xs">

                <div class="hot-properties hidden-xs">
                    <h4>Популярные</h4>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5"><img src="/images/properties/4.jpg" class="img-responsive img-circle" alt="properties"/></div>
                        <div class="col-lg-8 col-sm-7">
                            <h5><a href="property-detail.php">Квартира на Русской, 1</a></h5>
                            <p class="price">$300,000</p> </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5"><img src="/images/properties/1.jpg" class="img-responsive img-circle" alt="properties"/></div>
                        <div class="col-lg-8 col-sm-7">
                            <h5><a href="property-detail.php">Квартира на Русской, 2</a></h5>
                            <p class="price">$300,000</p> </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-sm-5"><img src="/images/properties/3.jpg" class="img-responsive img-circle" alt="properties"/></div>
                        <div class="col-lg-8 col-sm-7">
                            <h5><a href="property-detail.php">Квартира на Русской, 3</a></h5>
                            <p class="price">$300,000</p> </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-sm-5"><img src="/images/properties/2.jpg" class="img-responsive img-circle" alt="properties"/></div>
                        <div class="col-lg-8 col-sm-7">
                            <h5><a href="property-detail.php">Квартира на Русской, 4</a></h5>
                            <p class="price">$300,000</p> </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-9 col-sm-8 ">
                <h2><?=$notice['name'];?></h2>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="property-images">
                            <!-- Slider Starts -->
                            <div id="carousel" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators hidden-xs">
                                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel" data-slide-to="1" class=""></li>
                                    <li data-target="#carousel" data-slide-to="2" class=""></li>
                                    <li data-target="#carousel" data-slide-to="3" class=""></li>
                                </ol>
                                <div class="carousel-inner">
                                    <!-- Item 1 -->
                                    <div class="item active">
                                        <img src="/images/properties/4.jpg" class="properties" alt="properties" />
                                    </div>
                                    <!-- #Item 1 -->

                                    <!-- Item 2 -->
                                    <div class="item">
                                        <img src="/images/properties/2.jpg" class="properties" alt="properties" />

                                    </div>
                                    <!-- #Item 2 -->

                                    <!-- Item 3 -->
                                    <div class="item">
                                        <img src="/images/properties/1.jpg" class="properties" alt="properties" />
                                    </div>
                                    <!-- #Item 3 -->

                                    <!-- Item 4 -->
                                    <div class="item ">
                                        <img src="/images/properties/3.jpg" class="properties" alt="properties" />

                                    </div>
                                    <!-- # Item 4 -->
                                </div>
                                <a class="left carousel-control" href="#carousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                                <a class="right carousel-control" href="#carousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div>
                            <!-- #Slider Ends -->

                        </div>
                        <div class="spacer">
                            <h4><span class="glyphicon glyphicon-th-list"></span>Описание</h4>
                            <p><?=$notice['description'];?></p>

                        </div>
                        <div>
                            <h4><span class="glyphicon glyphicon-map-marker"></span> Местоположения </h4>
                            <div class="well">
                                <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&source=s_q&hl=ru&geocode=&q=Владивосток+<?=(empty($notice['street']) ? null : $notice['street'] . '+');?><?=$notice['house'];?>&aq=0&oq=pulch&ie=UTF8&hq=&hnear=Владивосток+Маковского+100&t=m&z=14&output=embed"></iframe>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="col-lg-12  col-sm-6">
                            <div class="property-info">
                                <p class="price"><?=$notice['price'];?></p>
                                <p class="area"><span class="glyphicon glyphicon-map-marker"></span><?=(empty($notice['street']) ? null : $notice['street'] . ' ');?><?=$notice['house'];?></p>
                            </div>

<!--                            <h6><span class="glyphicon glyphicon-home"></span> Характеристики</h6>-->
<!--                            <div class="listing-detail">-->
<!--                                <span data-toggle="tooltip" data-placement="bottom" data-original-title="Спальная комната">5</span>-->
<!--                                <span data-toggle="tooltip" data-placement="bottom" data-original-title="Гостевая">2</span>-->
<!--                                <span data-toggle="tooltip" data-placement="bottom" data-original-title="Парковка">2</span>-->
<!--                                <span data-toggle="tooltip" data-placement="bottom" data-original-title="Кухня">1</span>-->
<!--                            </div>-->

                        </div>
                        <div class="col-lg-12 col-sm-6 ">
                            <div class="enquiry">
                                <h6><span class="glyphicon glyphicon-envelope"></span> Отправить запрос</h6>
                                <form role="form">
                                    <input type="text" class="form-control" placeholder="Имя"/>
                                    <input type="text" class="form-control" placeholder="E-mail"/>
                                    <input type="text" class="form-control" placeholder="Номер телефона"/>
                                    <button type="submit" class="btn btn-primary" name="Submit">Отправить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

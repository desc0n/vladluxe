<div id="myCarousel" class="carousel slide hidden-xs hidden-md" data-interval="3000" data-ride="">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="active item" style="background-image: url('/images/slider/1.jpg');">
            <div class="carousel-caption row">
                <h2>Маковского 120</h2>
                <h3>2 спальные комнаты и 1 столовая на продажу</h3>
                <p class="col-lg-8"><button class="btn btn-success"  onclick="window.location.href='/search'">Подробнее</button></p>
            </div>
        </div>
        <div class="item" style="background-image: url('/images/slider/2.jpg');">
            <div class="carousel-caption row">
                <h2>Шевченко 10</h2>
                <h3>3 спальные комнаты и 1 столовая в аренду</h3>
                <p class="col-lg-8"><button class="btn btn-success"  onclick="window.location.href='/search'">Подробнее</button></p>
            </div>
        </div>
        <div class="item" style="background-image: url('/images/slider/3.jpg');">
            <div class="carousel-caption row">
                <h2>Зеленая 10</h2>
                <h3>4 спальные комнаты и 2 столовых в аренду</h3>
                <p class="col-lg-8"><button class="btn btn-success"  onclick="window.location.href='/search'">Подробнее</button></p>
            </div>
        </div>
    </div>
    <!-- Навигация для карусели -->
    <!-- Кнопка, осуществляющая переход на предыдущий слайд с помощью атрибута data-slide="prev" -->
    <a class="carousel-control left" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <!-- Кнопка, осуществляющая переход на следующий слайд с помощью атрибута data-slide="next" -->
    <a class="carousel-control right" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>
<div class="banner-search">
    <div class="container">
        <!-- banner -->
        <h3>Поиск</h3>
        <div class="searchbar">
            <div class="row">
                <div class="col-lg-5 col-sm-12">
                    <div class="col-lg-4 col-sm-4 searchbar-title">
                        Улица
                    </div>
                    <div class="col-lg-8 col-sm-8">
                        <input type="text" class="form-control" placeholder="Введите улицу" name="street" autocomplete="off">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="col-lg-3 col-sm-3 searchbar-title">
                        Цена от
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <input type="text" class="form-control" placeholder="0">
                    </div>
                    <div class="col-lg-1 col-sm-1 searchbar-title">
                        до
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <input type="text" class="form-control" placeholder="0">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <button class="btn btn-success"  onclick="window.location.href='/search'">Найти</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner -->
<div class="container">
    <div class="properties-listing spacer">
        <a href="/search" class="viewall">Все предложения</a>
        <div id="owl-example" class="owl-carousel">
            <div class="properties">
                <div class="image-holder">
                    <img src="images/properties/1.jpg" class="img-responsive" alt="properties"/>
                    <div class="status sold">Сдается</div>
                </div>
                <h4>
                    <a href="/notice/1">Квартира</a>
                </h4>
                <p class="price">Цена: $234,900</p>
                <div class="listing-detail">
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Спальная">5</span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Гостинная">2</span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Парковка">2</span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Кухня">1</span>
                </div>
                <a class="btn btn-primary" href="/notice/1">Подробнее</a>
            </div>
            <div class="properties">
                <div class="image-holder">
                    <img src="images/properties/2.jpg" class="img-responsive" alt="properties"/>
                    <div class="status new">Новое</div>
                </div>
                <h4>
                    <a href="/notice/1">Квартира</a>
                </h4>
                <p class="price">Цена: $234,900</p>
                <div class="listing-detail">
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Спальная">5</span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Гостинная">2</span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Парковка">2</span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Кухня">1</span>
                </div>
                <a class="btn btn-primary" href="/notice/1">Подробнее</a>
            </div>
            <div class="properties">
                <div class="image-holder">
                    <img src="images/properties/3.jpg" class="img-responsive" alt="properties"/>
                </div>
                <h4>
                    <a href="/notice/1">Квартира</a>
                </h4>
                <p class="price">Цена: $234,900</p>
                <div class="listing-detail">
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Спальная">5</span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Гостинная">2</span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Парковка">2</span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Кухня">1</span>
                </div>
                <a class="btn btn-primary" href="/notice/1">Подробнее</a>
            </div>
            <div class="properties">
                <div class="image-holder">
                    <img src="images/properties/4.jpg" class="img-responsive" alt="properties"/>
                </div>
                <h4>
                    <a href="/notice/1">Квартира</a>
                </h4>
                <p class="price">Цена: $234,900</p>
                <div class="listing-detail">
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Спальная">5</span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Гостинная">2</span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Парковка">2</span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Кухня">1</span>
                </div>
                <a class="btn btn-primary" href="/notice/1">Подробнее</a>
            </div>
            <div class="properties">
                <div class="image-holder">
                    <img src="images/properties/1.jpg" class="img-responsive" alt="properties"/>
                    <div class="status sold">Сдается</div>
                </div>
                <h4>
                    <a href="/notice/1">Квартира</a>
                </h4>
                <p class="price">Цена: $234,900</p>
                <div class="listing-detail">
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Спальная">5</span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Гостинная">2</span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Парковка">2</span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Кухня">1</span>
                </div>
                <a class="btn btn-primary" href="/notice/1">Подробнее</a>
            </div>
            <div class="properties">
                <div class="image-holder">
                    <img src="images/properties/2.jpg" class="img-responsive" alt="properties"/>
                    <div class="status sold">Сдается</div>
                </div>
                <h4>
                    <a href="/notice/1">Квартира</a>
                </h4>
                <p class="price">Цена: $234,900</p>
                <div class="listing-detail">
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Спальная">5</span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Гостинная">2</span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Парковка">2</span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Кухня">1</span>
                </div>
                <a class="btn btn-primary" href="/notice/1">Подробнее</a>
            </div>
            <div class="properties">
                <div class="image-holder">
                    <img src="images/properties/3.jpg" class="img-responsive" alt="properties"/>
                    <div class="status new">Новинка</div>
                </div>
                <h4>
                    <a href="/notice/1">Квартира</a>
                </h4>
                <p class="price">Цена: $234,900</p>
                <div class="listing-detail">
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Спальная">5</span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Гостинная">2</span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Парковка">2</span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Кухня">1</span>
                </div>
                <a class="btn btn-primary" href="/notice/1">Подробнее</a>
            </div>
            <div class="properties">
                <div class="image-holder">
                    <img src="images/properties/4.jpg" class="img-responsive" alt="properties"/>
                </div>
                <h4>
                    <a href="/notice/1">Квартира</a>
                </h4>
                <p class="price">Цена: $234,900</p>
                <div class="listing-detail">
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Спальная">5</span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Гостинная">2</span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Парковка">2</span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Кухня">1</span>
                </div>
                <a class="btn btn-primary" href="/notice/1">Подробнее</a>
            </div>
            <div class="properties">
                <div class="image-holder">
                    <img src="images/properties/1.jpg" class="img-responsive" alt="properties"/>
                </div>
                <h4>
                    <a href="/notice/1">Квартира</a>
                </h4>
                <p class="price">Цена: $234,900</p>
                <div class="listing-detail">
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Спальная">5</span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Гостинная">2</span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Парковка">2</span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Кухня">1</span>
                </div>
                <a class="btn btn-primary" href="/notice/1">Подробнее</a>
            </div>
        </div>
    </div>
</div>

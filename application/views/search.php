<!-- banner -->
<div class="inside-banner">
    <div class="container">
        <span class="pull-right"><a href="/">Главная</a> / Аренда</span>
        <h2>Аренда</h2>
    </div>
</div>
<!-- banner -->


<div class="container">
    <div class="properties-listing spacer">
        <div class="row">
            <div class="col-lg-3 col-sm-4 ">
                <form class="search-form">
                    <h4><span class="glyphicon glyphicon-search"></span> Поиск по</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <?=Form::select('district', $districts, null, ['class' => 'form-control']);?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="street" id="street" placeholder="Улица">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <?=Form::select('type', $types, null, ['class' => 'form-control']);?>
                        </div>
                    </div>
                    <button class="btn btn-primary">Найти</button>
                </form>
                <div class="hot-properties hidden-xs">
                    <h4>Популярное</h4>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5"><img src="/images/properties/1.jpg" class="img-responsive img-circle" alt="properties"></div>
                        <div class="col-lg-8 col-sm-7">
                            <h5><a href="/notice/1">Квартира на Русской, 1</a></h5>
                            <p class="price">300,000</p> </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5"><img src="/images/properties/1.jpg" class="img-responsive img-circle" alt="properties"></div>
                        <div class="col-lg-8 col-sm-7">
                            <h5><a href="/notice/1">Квартира на Русской, 2</a></h5>
                            <p class="price">300,000</p> </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-sm-5"><img src="/images/properties/1.jpg" class="img-responsive img-circle" alt="properties"></div>
                        <div class="col-lg-8 col-sm-7">
                            <h5><a href="/notice/1">Квартира на Русской, 3</a></h5>
                            <p class="price">300,000</p> </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5"><img src="/images/properties/1.jpg" class="img-responsive img-circle" alt="properties"></div>
                        <div class="col-lg-8 col-sm-7">
                            <h5><a href="/notice/1">Квартира на Русской, 4</a></h5>
                            <p class="price">300,000</p> </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-sm-8">
                <div class="sortby clearfix">
                    <div class="pull-left result">Показано: 3 из 100 </div>
                    <div class="pull-right">
                        <select class="form-control">
                            <option>Сортировать</option>
                            <option>Цена по возрастанию</option>
                            <option>Цена по убыванию</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <!-- properties -->
                    <div class="col-lg-4 col-sm-6">
                        <div class="properties">
                            <div class="image-holder"><img src="/images/properties/1.jpg" class="img-responsive" alt="properties">
                                <div class="status sold">Сдается</div>
                            </div>
                            <h4><a href="/notice/1">Квартира</a></h4>
                            <p class="price">Цена: 234,900</p>
<!--                            <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> </div>-->
                            <a class="btn btn-primary" href="/notice/1">Подробнее</a>
                        </div>
                    </div>
                    <!-- properties -->


                    <!-- properties -->
                    <div class="col-lg-4 col-sm-6">
                        <div class="properties">
                            <div class="image-holder"><img src="/images/properties/2.jpg" class="img-responsive" alt="properties">
                                <div class="status sold">Сдается</div>
                            </div>
                            <h4><a href="/notice/1">Квартира</a></h4>
                            <p class="price">Цена: 234,900</p>
<!--                            <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> </div>-->
                            <a class="btn btn-primary" href="/notice/1">Подробнее</a>
                        </div>
                    </div>
                    <!-- properties -->

                    <!-- properties -->
                    <div class="col-lg-4 col-sm-6">
                        <div class="properties">
                            <div class="image-holder"><img src="/images/properties/3.jpg" class="img-responsive" alt="properties">
                                <div class="status sold">Сдается</div>
                            </div>
                            <h4><a href="/notice/1">Квартира</a></h4>
                            <p class="price">Цена: 234,900</p>
<!--                            <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> </div>-->
                            <a class="btn btn-primary" href="/notice/1">Подробнее</a>
                        </div>
                    </div>
                    <!-- properties -->

                    <div class="center">
                        <ul class="pagination">
                            <li><a href="#">«</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

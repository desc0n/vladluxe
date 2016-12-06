<?php
/** @var $noticeModel Model_Notice */
$noticeModel = Model::factory('Notice');
?>
<div id="myCarousel" class="carousel slide hidden-xs hidden-md" data-interval="3000" data-ride="">
    <ol class="carousel-indicators">
        <?
        $slideActive = null;

        foreach ($noticeModel->findNoticesIndexTop() as $noticeData) {
            $slideActive = $slideActive === null ? 'active' : '';?>
        <li data-target="#myCarousel" data-slide-to="0" class="<?=$slideActive;?>"></li>
        <?}?>
    </ol>
    <div class="carousel-inner">
        <?
        $itemActive = null;

        foreach ($noticeModel->findNoticesIndexTop() as $noticeData) {
            $itemActive = $itemActive === null ? 'active' : '';?>
        <div class="<?=$itemActive;?> item" style="background-image: url('/public/img/original/<?=$noticeData['imgs'][0]['src'];?>');">
            <div class="carousel-caption row">
                <h2><?=(empty($noticeData['street']) ? null : $noticeData['street'] . ' ');?><?=$noticeData['house'];?></h2>
                <h3><?=$noticeData['name'];?></h3>
                <p class="col-lg-8"><a class="btn btn-success"  href='/notice/<?=$noticeData['id'];?>'>Подробнее</a></p>
            </div>
        </div>
        <?}?>
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
        <form class="searchbar" action="/search">
            <div class="row">
                <div class="col-lg-3 col-sm-12">
                    <div class="col-lg-4 col-sm-4 searchbar-title">
                        Район
                    </div>
                    <div class="col-lg-8 col-sm-8">
                        <?=Form::select('district', $districts, null, ['class' => 'form-control']);?>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12">
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
                        <input type="text" class="form-control" name="price_from" placeholder="0">
                    </div>
                    <div class="col-lg-1 col-sm-1 searchbar-title">
                        до
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <input type="text" class="form-control" name="price_to" placeholder="0">
                    </div>
                </div>
                <div class="col-lg-2 col-sm-12">
                    <button class="btn btn-success"  onclick="window.location.href='/search'">Найти</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- banner -->
<div class="container">
    <div class="properties-listing spacer">
        <a href="/search" class="viewall">Все предложения</a>
        <div id="owl-example" class="owl-carousel">
            <?foreach ($noticeModel->findNoticesIndexBottom() as $noticeData) {
                $noticeImgs = $noticeModel->getNoticeImg(Arr::get($noticeData,'id'));?>
            <div class="properties">
                <div class="image-holder">
                    <?$imgSrc = count($noticeImgs) === 0 ? '/images/nopic.jpg' : '/public/img/thumb/' . $noticeImgs[0]['src'];?>
                    <img src="<?=$imgSrc;?>" class="img-responsive" alt="properties"/>
                </div>
                <h4>
                    <a href="/notice/<?=$noticeData['id'];?>"><?=$noticeData['type_name'];?></a>
                </h4>
                <p class="price">Цена: <?=$noticeData['price'];?></p>
                <div class="listing-detail">
                    <p><?=$noticeData['district_name'];?></p>
                    <p><?=(empty($noticeData['street']) ? null : $noticeData['street'] . ' ');?><?=$noticeData['house'];?></p>
                    <p>2-666-156</p>
                </div>
                <a class="btn btn-primary" href="/notice/<?=$noticeData['id'];?>">Подробнее</a>
            </div>
            <?}?>
        </div>
    </div>
</div>

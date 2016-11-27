<?php
/** @var $noticeModel Model_Notice */
$noticeModel = Model::factory('Notice');
?>
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
                <form class="search-form" id="searchForm">
                    <h4><span class="glyphicon glyphicon-search"></span> Поиск по</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <label>Район</label>
                            <?=Form::select('district', ([null => 'не выбрано'] + $districts), Arr::get($get, 'district'), ['class' => 'form-control']);?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label>Улица</label>
                            <input type="text" class="form-control" name="street" id="street" placeholder="Улица" value="<?=Arr::get($get, 'street');?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label>Тип</label>
                            <?=Form::select('type', ([null => 'не выбрано'] + $types), Arr::get($get, 'type'), ['class' => 'form-control']);?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label>Цена от</label>
                            <input type="text" class="form-control" name="price_from" placeholder="Цена от" value="<?=Arr::get($get, 'price_from');?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label>Цена до</label>
                            <input type="text" class="form-control" name="price_to" placeholder="Цена до" value="<?=Arr::get($get, 'price_to');?>">
                        </div>
                    </div>
                    <input type="hidden" name="order" id="order" value="<?=Arr::get($get, 'order');?>">
                    <input type="hidden" name="page" id="page" value="<?=Arr::get($get, 'page', 1);?>">
                    <button class="btn btn-primary">Найти</button>
                </form>
                <div class="hot-properties hidden-xs">
                    <h4>Популярное</h4>
                    <?foreach ($popularNotices as $popularNotice) {
                        $noticeImgs = $noticeModel->getNoticeImg($popularNotice['id']);
                        $imgSrc = count($noticeImgs) === 0 ? '/images/nopic.jpg' : '/public/img/thumb/' . $noticeImgs[0]['src'];?>
                        <div class="row">
                            <div class="col-lg-4 col-sm-5">
                                <img src="<?=$imgSrc;?>" class="img-responsive img-circle" alt="properties"/>
                            </div>
                            <div class="col-lg-8 col-sm-7">
                                <h5><a href="/notice/<?=$popularNotice['id'];?>"><?=$popularNotice['name'];?></a></h5>
                                <p class="price"><?=$popularNotice['price'];?> руб.</p> </div>
                        </div>
                    <?}?>
                </div>
            </div>
            <div class="col-lg-9 col-sm-8">
                <div class="sortby clearfix">
                    <div class="pull-left result">Показано: <?=count($searchedNotices);?> из <?=Arr::get(Arr::get($searchedNotices, 0, []), 'count', 0);?> </div>
                    <div class="pull-right">
                        <select class="form-control" id="selectPriceOrderSearchForm">
                            <option>Сортировать</option>
                            <option <?=(Arr::get($get, 'order') === 'priceUp' ? 'selected' : null);?> value="priceUp">Цена по возрастанию</option>
                            <option <?=(Arr::get($get, 'order') === 'priceDown' ? 'selected' : null);?> value="priceDown">Цена по убыванию</option>
                        </select>
                    </div>
                </div>
                <div class="row search-result">
                    <?foreach ($searchedNotices as $searchedNotice) {
                        $noticeImgs = $noticeModel->getNoticeImg(Arr::get($searchedNotice,'id'));?>
                    <div class="col-lg-4 col-sm-6">
                        <div class="properties">
                            <div class="image-holder">
                                <?$imgSrc = count($noticeImgs) === 0 ? '/images/nopic.jpg' : '/public/img/thumb/' . $noticeImgs[0]['src'];?>
                                <img src="<?=$imgSrc;?>" class="img-responsive" alt="properties">
                                <div class="status sold">Сдается</div>
                            </div>
                            <h4>
                                <a href="/notice/<?=$searchedNotice['id'];?>"><?=$searchedNotice['type_name'];?></a>
                            </h4>
                            <p class="price">Цена: <?=$searchedNotice['price'];?></p>
                            <a class="btn btn-primary" href="/notice/<?=$searchedNotice['id'];?>">Подробнее</a>
                        </div>
                    </div>
                    <?}?>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="center">
                            <ul class="pagination" id="searchPagination">
                                <?$paginationCount = Arr::get(Arr::get($searchedNotices, 0, []), 'paginationCount', 1);?>
                                <?for ($i = 1; $i < $paginationCount; $i++) {?>
                                <li <?=((int)Arr::get($get, 'page', 1) === $i ? 'class="active"' : null);?>>
                                    <a href="#" data-page="<?=$i;?>"><?=$i;?></a>
                                </li>
                                <?}?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

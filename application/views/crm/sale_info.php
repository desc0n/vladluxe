<?php
$customerName = Arr::get($saleData, 'name');
$customerAddress = Arr::get($saleData, 'address');
$customerTk = Arr::get($saleData, 'tk');
$customerPhone = Arr::get($saleData, 'phone');
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Информация о реализации</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel-body">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Основные данные
                    <a href="#" class="pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil fa-fw"></i></a>
                </div>
                <div class="panel-body">
                    <h4>Контактная информация</h4>
                    <address>
                        <p>
                            <strong>Имя: </strong> <?=$customerName;?>
                            <br>
                        </p>
                        <p>
                            <strong>Адрес: </strong> <?=$customerAddress;?>
                            <br>
                        </p>
                        <p>
                            <strong>ТК: </strong> <?=$customerTk;?>
                            <br>
                        </p>
                        <p>
                            <strong>Телефон: </strong>  <?=$customerPhone;?>
                        </p>
                    </address>
                    <h4>Интернет-контакты</h4>
                    <address>
                        <strong>E-mail</strong>
                        <a href="mailto:<?=Arr::get($saleData, 'email');?>"><?=Arr::get($saleData, 'email');?></a>
                        <br>
                    </address>
                    <?if (!empty($customerPhone) && !empty($customerName) && !empty($customerAddress) && !empty($customerTk) && empty(Arr::get($saleData, 'delivery_id'))) {?>
                        <form method="post">
                            <div class="form-group">
                                <button class="btn btn-default" name="addDelivery">Добавить в список доставок <i class="fa fa-plus fa-fw"></i></button>
                            </div>
                        </form>
                    <?}?>
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        <!-- /.panel -->
        <div class="panel-body">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Список товаров
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bactioned table-hover">
                        <thead>
                        <tr>
                            <th>Название товара</th>
                            <th class="text-center">Кол-во</th>
                            <th class="text-center">Цена</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?foreach ($saleProducts as $product) {?>
                            <tr id="rowProduct<?=$product['id'];?>">
                                <td class="product-name-cell"><?=$product['full_product_name'];?></td>
                                <td class="text-center product-quantity-cell"><?=$product['quantity'];?></td>
                                <td class="text-center product-price-cell"><?=$product['price'];?></td>
                            </tr>
                        <?}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Редактирование данных клиента</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="redactActionClientForm" method="post">
                    <div class="form-group">
                        <div class="col-lg-12">
                            <label>Имя *</label>
                            <label class="control-label hide" for="redactName" id="redactNameError">Поле пустое</label>
                            <input class="form-control" name="name" id="redactName" value="<?=$customerName;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <label>Адрес *</label>
                            <label class="control-label hide" for="redactCity" id="redactCityError">Поле пустое</label>
                            <textarea class="form-control" name="address" id="redactCity"><?=$customerAddress;?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <label>Транспортная компания *</label>
                            <label class="control-label hide" for="redactTk" id="redactTkError">Поле пустое</label>
                            <input class="form-control" name="tk" id="redactTk" value="<?=$customerTk;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-6">
                            <label>Телефон</label>
                            <label class="control-label hide" for="redactPhone" id="redactPhoneError">Длина номера 10 цифр</label>
                            <div class="input-group">
                                <span class="input-group-addon">+7</span>
                                <input class="form-control" id="redactPhone" <?=(empty($customerPhone) ? null : 'disabled');?> value="<?=$customerPhone;?>">
                                <input type="hidden" name="phone" value="<?=$customerPhone;?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label>E-mail</label>
                            <input class="form-control" name="email" value="<?=Arr::get($saleData, 'email');?>">
                        </div>
                    </div>
                    <input type="hidden" name="redactActionClient" value="<?=Arr::get($saleData, 'customers_id');?>">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary" id="redactActionClient">Сохранить изменения</button>
            </div>
        </div>
    </div>
</div>
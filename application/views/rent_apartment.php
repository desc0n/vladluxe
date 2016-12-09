<!-- banner -->
<div class="inside-banner">
    <div class="container">
        <span class="pull-right"><a href="/">Главная</a> / Сдать квартиру</span>
        <h2>Добавление объявления</h2>
    </div>
</div>
<!-- banner -->
<div class="container">
    <div class="spacer send-notice">
        <div class="row">
            <div class="col-lg-8  col-lg-offset-2">
                <div class="row form-group">
                    <div class="col-md-4 col-lg-4">
                        <div class="text-muted col-md-12">Тип:</div>
                        <div class="col-md-12">
                            <?=Form::select('type', ([null => 'не выбрано'] + $types), null, ['class' => 'form-control', 'id' => 'type']);?>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="text-muted col-md-12">Этаж:</div>
                        <div class="col-md-12">
                            <input type="text" class="form-control"  id="floor" value="1">
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="text-muted col-md-12">Цена:</div>
                        <div class="col-md-12">
                            <input type="text" class="form-control"  id="price" placeholder="Стоимость" value="0">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4 col-lg-4">
                        <div class="text-muted col-md-12">Район города:</div>
                        <div class="col-md-12">
                            <?=Form::select('district', ([null => 'не выбрано'] + $districts), null, ['class' => 'form-control', 'id' => 'district']);?>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="text-muted col-md-12"><strong>* Улица:</strong></div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="street" value="" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="text-muted col-md-12">Дом:</div>
                        <div class="col-md-12">
                            <input type="text" class="form-control"  id="house" value="">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <div class="text-muted col-sm-12">
                            <a href="#" class="pop-over" data-toggle="popover">
                                <i class="fa fa-info-circle"></i>
                            </a>
                            Описание:</div>
                        <div class="col-sm-12">
                            <textarea class="form-control"  id="description" placeholder="Описание" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4 col-lg-4">
                        <div class="text-muted col-md-12">Имя:</div>
                        <div class="col-md-12">
                            <input type="text" class="form-control"  id="customerName" value="">
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="text-muted col-md-12"><strong>* Телефон:</strong></div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="customerPhone" value="">
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="text-muted col-md-12">E-mail:</div>
                        <div class="col-md-12">
                            <input type="text" class="form-control"  id="customerEmail" value="">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6 col-lg-6">
                        <div class="col-md-12">
                            <button class="btn btn-block btn-success" id="sendNoticeQuery">Отправить запрос</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="errorModalLabel">Ошибка</h4>
            </div>
            <div class="modal-body" id="errorModalBody">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
<script>
    $('.pop-over').popover({
        placement: 'top',
        trigger: 'hover',
        title: 'Описание квартиры',
        content: 'Мебель (диван, кровать, без мебели), бытовая техника (холодильник, телевизор, стиральная машина), состояние и особенности квартиры (лоджия, балкон, паркет, пластиковые окна)'
    });
</script>
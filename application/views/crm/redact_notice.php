<?php
/** @var $noticeModel Model_Notice */
$noticeModel = Model::factory('Notice');
?>
<div class="col-sm-12">
  <h3>Добавление объявления</h3>
  <div class="row">
    <div class="col-md-12">
      <h3>Изображение</h3>
        <?foreach($noticeModel->getNoticeImg(Arr::get($noticeData,'id')) as $img){?>
        <div class="col-lg-3" id="noticeImg<?=$img['id'];?>">
            <a href="#" class="thumbnail" onclick="redactNoticeImg(<?=$img['id'];?>, '<?=$img['src'];?>');">
                <img src="/public/img/thumb/<?=$img['src'];?>">
            </a>
        </div>
        <?}?>
      <div class="col-lg-3">
        <a  data-toggle="modal" href="#loadImgModal" class="thumbnail">
          <img data-src="holder.js/100%x190" alt="">
        </a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h3>Описание</h3>
      <form method="post">
        <div class="row form-group">
          <div class="col-md-8">
            <div class="text-muted col-md-12">Улица:</div>
            <div class="col-md-12">
              <input type="text" class="form-control"  name="street" id="street" value="<?=Arr::get($noticeData, 'street');?>" autocomplete="off">
            </div>
          </div>
          <div class="col-md-4">
            <div class="text-muted col-md-12">Дом:</div>
            <div class="col-md-12">
              <input type="text" class="form-control"  name="house" value="<?=Arr::get($noticeData, 'house');?>">
            </div>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-6">
            <div class="text-muted col-md-12">Район города:</div>
            <div class="col-md-12">
              <?=Form::select('district', $districts, Arr::get($noticeData, 'district'), ['class' => 'form-control']);?>
            </div>
          </div>
          <div class="col-md-3">
            <div class="text-muted col-md-12">Кол-во комнат:</div>
            <div class="col-md-12">
              <input type="text" class="form-control"  name="flat_count" value="<?=Arr::get($noticeData, 'flat_count');?>">
            </div>
          </div>
          <div class="col-md-3">
            <div class="text-muted col-md-12">Этаж:</div>
            <div class="col-md-12">
              <input type="text" class="form-control"  name="floor" value="<?=Arr::get($noticeData, 'floor');?>">
            </div>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-12">
            <div class="text-muted col-md-12">Название:</div>
            <div class="col-md-12">
              <input type="text" class="form-control"  name="name" placeholder="Название" value="<?=Arr::get($noticeData, 'name');?>">
            </div>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-12">
            <div class="text-muted col-sm-12">Описание:</div>
            <div class="col-sm-12">
              <textarea class="form-control"  name="description" placeholder="Описание" rows="10"><?=Arr::get($noticeData, 'description');?></textarea>
            </div>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-sm-6">
            <button type="submit" class="btn btn-block btn-success" name="redact_notice" value="<?=Arr::get($noticeData, 'id');?>">Сохранить</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="loadImgModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Загрузка изображения</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="post" enctype='multipart/form-data'>
                    <div class="form-group">
                        <label for="exampleInputFile">Выбор файла</label>
                        <input type="file" name="imgname[]" id="exampleInputFile" multiple>
                    </div>
                    <button type="submit" class="btn btn-default">Загрузить</button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="redactImgModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Просмотр изображения</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" onclick="removeNoticeImg();">Удалить изображение</button>
            </div>
        </div>
    </div>
</div>
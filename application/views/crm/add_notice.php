<div class="col-sm-12">
  <h3>Добавление объявления</h3>
  <form method="post">
    <div class="row form-group">
      <div class="col-md-8">
        <div class="text-muted col-md-12">Улица:</div>
        <div class="col-md-12">
          <input type="text" class="form-control"  name="street" id="street" value="">
        </div>
      </div>
      <div class="col-md-4">
        <div class="text-muted col-md-12">Дом:</div>
          <div class="col-md-12">
          <input type="text" class="form-control"  name="house" value="">
        </div>
      </div>
    </div>
    <div class="row form-group">
      <div class="col-md-6">
        <div class="text-muted col-md-12">Район города:</div>
        <div class="col-md-12">
          <?=Form::select('district', $districts, null, ['class' => 'form-control']);?>
        </div>
      </div>
      <div class="col-md-3">
        <div class="text-muted col-md-12">Кол-во комнат:</div>
          <div class="col-md-12">
          <input type="text" class="form-control"  name="flat_count" value="1">
        </div>
      </div>
      <div class="col-md-3">
        <div class="text-muted col-md-12">Этаж:</div>
          <div class="col-md-12">
          <input type="text" class="form-control"  name="floor" value="1">
        </div>
      </div>
    </div>
    <div class="row form-group">
      <div class="col-md-12">
        <div class="text-muted col-md-12">Название:</div>
        <div class="col-md-12">
          <input type="text" class="form-control"  name="name" placeholder="Название" value="">
        </div>
      </div>
    </div>
    <div class="row form-group">
      <div class="col-md-12">
        <div class="text-muted col-sm-12">Описание:</div>
        <div class="col-sm-12">
          <textarea class="form-control"  name="description" placeholder="Описание" rows="10"></textarea>
        </div>
      </div>
    </div>
    <div class="row form-group">
      <div class="col-sm-6">
        <button type="submit" class="btn btn-block btn-success" name="addnotice">Сохранить</button>
      </div>
    </div>
  </form>
</div>
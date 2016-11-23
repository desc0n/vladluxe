<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Список объявлений</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="dataTable_wrapper">
            <table class="table table-bordered table-hover notices-table">
                <thead>
                <tr>
                    <th>Адрес</th>
                    <th>Название</th>
                    <th>Стоимость</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                <?foreach ($noticesList as $notice) {?>
                    <tr id="noticeRow<?=$notice['id'];?>">
                        <td class="text-center">
                            <?=(empty($notice['district_name']) ? null : $notice['district_name'] . ', ');?>
                            <?=(empty($notice['street']) ? null : $notice['street'] . ', ');?>
                            <?=$notice['house'];?>
                        </td>
                        <td class="text-center"><?=$notice['name'];?></td>
                        <td><?=$notice['price'];?></td>
                        <td class="text-center">
                            <a title="Редактировать объявление" class="btn btn-default" href="/crm/redact_notice/<?=$notice['id'];?>"><i class="fa fa-pencil fa-fw"></i></a>
                            <button title="Удалить объявление" class="btn btn-danger" onclick="removeNotice(<?=$notice['id'];?>);"><i class="fa fa-remove fa-fw"></i></button>
                        </td>
                    </tr>
                <?}?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row-md-12">
    <ul class="pagination">
        <?for ($i = 1; $i < $paginationCount; $i++) {
            if ($i == $page) {?>
        <li class="active"><span><?=$i;?><span class="sr-only">(current)</span></span></li>
            <?} else {?>
        <li><a href="/crm/notices_list/?page=<?=$i;?>"><?=$i;?></a></li>
            <?}
        }?>
    </ul>
</div>
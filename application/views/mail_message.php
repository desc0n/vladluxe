<h2>Объявление с сайта</h2>
<table border="0" cellpadding="10">
  <tr>
    <td><strong>Имя: </strong></td>
    <td><?=Arr::get($queryData, 'customerName');?></td>
  </tr>
  <tr>
    <td><strong>Телефон: </strong></td>
    <td><?=Arr::get($queryData, 'customerPhone');?></td>
  </tr>
  <tr>
    <td><strong>E-mail: </strong></td>
    <td><?=Arr::get($queryData, 'customerEmail');?></td>
  </tr>
</table>
<br />
<br />
<table border="0" cellpadding="10">
  <tr>
    <td><strong>Тип: </strong></td>
    <td><?=Arr::get($queryData, 'type');?></td>
  </tr>
  <tr>
    <td><strong>Этаж: </strong></td>
    <td><?=Arr::get($queryData, 'floor');?></td>
  </tr>
  <tr>
    <td><strong>Цена: </strong></td>
    <td><?=Arr::get($queryData, 'price');?></td>
  </tr>
  <tr>
    <td><strong>Район города: </strong></td>
    <td><?=Arr::get($queryData, 'district');?></td>
  </tr>
  <tr>
    <td><strong>Улица: </strong></td>
    <td><?=Arr::get($queryData, 'street');?></td>
  </tr>
  <tr>
    <td><strong>Дом: </strong></td>
    <td><?=Arr::get($queryData, 'house');?></td>
  </tr>
  <tr>
    <td><strong>Описание: </strong></td>
    <td><?=Arr::get($queryData, 'description');?></td>
  </tr>
</table>
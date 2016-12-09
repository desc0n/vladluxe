<h2>Объявление с сайта</h2>
<table border="0" cellpadding="20">
  <tr>
    <td>Имя: </td>
    <td><?=Arr::get($queryData, 'customerName');?></td>
  </tr>
  <tr>
    <td>Телефон: </td>
    <td><?=Arr::get($queryData, 'customerPhone');?></td>
  </tr>
  <tr>
    <td>E-mail: </td>
    <td><?=Arr::get($queryData, 'customerEmail');?></td>
  </tr>
</table>
<br />
<br />
<table border="0">
  <tr>
    <td>Тип: </td>
    <td><?=Arr::get($queryData, 'type');?></td>
  </tr>
  <tr>
    <td>Этаж: </td>
    <td><?=Arr::get($queryData, 'floor');?></td>
  </tr>
  <tr>
    <td>Цена: </td>
    <td><?=Arr::get($queryData, 'price');?></td>
  </tr>
  <tr>
    <td>Район города: </td>
    <td><?=Arr::get($queryData, 'district');?></td>
  </tr>
  <tr>
    <td>Улица: </td>
    <td><?=Arr::get($queryData, 'street');?></td>
  </tr>
  <tr>
    <td>Дом: </td>
    <td><?=Arr::get($queryData, 'house');?></td>
  </tr>
  <tr>
    <td>Описание: </td>
    <td><?=Arr::get($queryData, 'description');?></td>
  </tr>
</table>
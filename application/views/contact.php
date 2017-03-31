<?php
/** @var Model_Content $contentModel */
$contentModel = Model::factory('Content');
?>
<!-- banner -->
<div class="inside-banner">
    <div class="container">
        <span class="pull-right"><a href="/">Главная</a> / Контакты</span>
        <h2>Контакты</h2>
    </div>
</div>
<!-- banner -->
<div class="container">
    <div class="spacer">
        <div class="row contact">
            <div class="col-lg-6 col-sm-6 ">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 ">
                        <?foreach ($contentModel->getContacts(['address']) as $contact){?>
                        <h3><?=$contact['value'];?></h3>
                        <?}?>
                        <?foreach ($contentModel->getContacts(['email']) as $contact){?>
                        <p>
                            <span class="glyphicon glyphicon-envelope"></span>
                            <a href="mailto:<?=$contact['value'];?>"><?=$contact['value'];?></a>
                        </p>
                        <?}?>
                        <?foreach ($contentModel->getContacts(['phone']) as $contact){?>
                        <p>
                            <span class="glyphicon glyphicon-earphone"></span> <?=$contact['value'];?>
                        </p>
                        <?}?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 ">
                <?foreach ($contentModel->getContacts(['address']) as $contact){?>
                <div class="well">
                    <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&source=s_q&hl=ru&geocode=&q=<?=str_replace(' ', '+', $contact['value']);?>&aq=0&oq=pulch&ie=UTF8&hq=&t=m&z=14&output=embed"></iframe>
                </div>
                <?}?>
            </div>
        </div>
    </div>
</div>

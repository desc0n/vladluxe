<!-- banner -->
<div class="inside-banner">
    <div class="container">
        <span class="pull-right"><a href="/">Главная</a> / <?=Arr::get($pageData, 'title');?></span>
        <h2><?=Arr::get($pageData, 'title');?></h2>
    </div>
</div>
<!-- banner -->
<div class="container">
    <div class="spacer">
        <div class="row">
            <div class="col-lg-12">
                <?=Arr::get($pageData, 'content');?>
            </div>

        </div>
    </div>
</div>

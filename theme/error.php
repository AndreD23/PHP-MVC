<?php $v->layout("_theme"); ?>
<div class="error">
    <h2>Ooooops, erro <?= $error ;?>!</h2>
</div>

<?php $v->start("sidebar"); ?>
<a href="<?= url("") ;?>" title="Voltar ao início">Voltar</a>
<?php $v->end(); ?>
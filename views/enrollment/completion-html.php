<?php $view->extend('template-html.php') ?>

<?php $view['slots']->start('body') ?>

<div class="text-center" style="margin-top: 10px;">
  <img src="<?= URL_BASE ?>/imgs/Etapa5.png" height="50px">
</div>

  <br/><br/>
  <div class="alert alert-success" role="alert">
    <p><b>Inscrição realizada com sucesso!</b></p>
    <!-- <p>O comprovante de inscrição foi enviado para seu e-mail.</p> -->
    <p>
      <a href="<?php echo URL_BASE ?>" class="btn btn-default">Voltar para a página inicial</a>
      <a href="<?php echo URL_BASE . '/enrollment/receipt/' . $inscript->id ?>" class="btn btn-success right-block">
       Gerar Comprovante
      </a>
    </p>
  </div>


<?php $view['slots']->stop() ?>

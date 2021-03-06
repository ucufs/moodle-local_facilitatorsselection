<?php $view->extend('template-html.php') ?>

<?php $view['slots']->start('body') ?>

<h3 class="text-center">Relação de Inscritos</h3>

<div class="well well-small">
  <p>
    <b>Edital n° <?= $edict->edict_number ?>/<?= $edict->validity_year ?></b><br/>
    <?= $edict->title ?>
  </p>
  <p><b><small>Inscrições ativas: <?= $active_inscripts ?></small></b></p>
</div>

<table class="table table-condensed table-hover sortable">
  <tr>
  	<th><small>Inscrição</small></th>
    <th><small>Nome</small></th>
    <th><small>CPF</small></th>
    <th><small>SIAPE</small></th>
    <th><small>Evento</small></th>
    <th><small>Função</small></th>
    <th><small>Data de Inscrição</small></th>
    <th colspan="2"><small>Ações</small></th>
  </tr>
  <?php foreach ($inscripts as $inscript) { ?>
  <tr class="<?= ($inscript->checked == 1) ? 'success' : '' ?>" >
  	<td style="vertical-align: middle"><small><?= $inscript->inscription_number; ?></small></td>
    <td style="vertical-align: middle"><small><?= $inscript->name; ?></small></td>
    <td style="vertical-align: middle"><small><?= $inscript->cpf; ?></small></td>
    <td style="vertical-align: middle"><small><?= $inscript->siape; ?></small></td>
    <td style="vertical-align: middle"><small><?= $inscript->course_name; ?></small></td>
    <td style="vertical-align: middle"><small><?= $inscript->role_name; ?></small></td>
    <td style="vertical-align: middle" sorttable_customkey="<?= date("YmdHi", $inscript->inscription_date); ?>"><small><?= date("d/m/Y H:i", $inscript->inscription_date); ?></small></td>
    <td style="vertical-align: middle">
    	<small>
    		<?php if ($inscript->status == 0) : ?>
	      <span class="label label-important">Cancelada</span><br/>
	      <?php endif; ?>
    		<a href="<?php echo URL_BASE . '/management/edict/show_inscription/' . $inscript->id ?>" title="Ver detalhes"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
        <a href="<?php echo URL_BASE . '/management/edict/show_mirror/' . $inscript->id ?>" title="Ver espelho de análise curricular"><i class="fa fa-book" aria-hidden="true"></i></i></a>
    		<a href="<?php echo URL_BASE . '/management/edict/cancel_inscription/' . $inscript->id ?>" title="Cancelar inscrição" onclick="confirm('Tem certeza que deseja cancelar a inscrição?')"><i class="fa fa-times" aria-hidden="true"></i></a>
    	</small>
    </td>
  </tr>
  <?php } ?>
  
</table>

<?php $view['slots']->stop() ?>

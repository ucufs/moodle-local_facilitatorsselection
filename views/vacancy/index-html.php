<?php include __DIR__ . '/../base/header.php'; ?>

<div class="container-fluid">
  <div class="row">
    <div class="span8 offset2">
    
      <h3 class="text-center">Gerenciar Vagas</h3>

        <p class="pull-right">
          <a href="<?php echo URL_BASE . '/vacancy/new_vacancy/' . $edict->id ?>" class="btn btn-default">
          <i class="fa fa-file-text" aria-hidden="true"></i> Adicionar item</a>
        </p>

      <?php if (count($vacancies) == 0): ?>
      <p>Ainda não há vagas cadastradas.</p>
      <?php else: ?>
      <small>
      <table class="table table-condensed table-hover">
        <tr>
          <th style="width: 300px;">Evento/Curso</th>
          <th>Função</th>
          <th>Vagas</th>
          <th>Módulo</th>
          <th>Campi</th>
          <th colspan="2" class="center">Ações</th>
        </tr>
        <?php foreach ($vacancies as $vacancy) { ?>   
        <tr>
          <td><?= local_psf_get_course_name($vacancy->courseid); ?></td>
          <td><?= local_psf_get_role_name($vacancy->roleid); ?></td>
          <td><?= $vacancy->quantity; ?></td>
          <td><?= $vacancy->module ?></td>
          <td><?= $vacancy->campus ?></td>
          <td>
            <a href="<?php echo URL_BASE . '/vacancy/edit/' . $vacancy->edictid . '/' . $vacancy->id ?>" title="Alterar informações">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
            </a>            
            <a href="<?php echo URL_BASE . '/vacancy/destroy/' . $vacancy->id ?>" title="Excluir" onclick="confirm('Deseja excluir o item?')">
              <i class="fa fa-times" aria-hidden="true"></i>
            </a>
          </td>
        </tr>
        <?php }; ?>
      </table>
      </small>
      <?php endif; ?>
    </div>
  </div>
</div>

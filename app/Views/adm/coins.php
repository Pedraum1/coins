<?= $this->extend('templates/member_tmp') ?>

<?= $this->section('page_css') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/dashboard.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container main bg-white rounded-5">
  <?= form_open('dashboard/coins/submit') ?>
  <div class="row justify-content-center p-4">

    <h1><?= $membro->name ?>: <?= $membro->coins ?> coins</h1>

    <input type="hidden" name="idInput" value="<?= $membro->id ?>">
    <div class="col-4">
      <div>
        <label for="coinInput" class="form-label">Adicionar coins</label>
        <input type="number" class="form-control" id="coinInput" name="coinInput" placeholder="0" value="0">
      </div>
      <div class="mb-3">
        <label for="titleInput" class="form-label">Título</label>
        <input type="text" class="form-control" id="titleInput" name="titleInput">
      </div>
      <div class="d-grid gap-2">
        <button class="btn btn-success" type="submit" name="submit">Enviar</button>
      </div>
    </div>
    <div class="col-8">
      <div class="mb-3">
        <label for="descriptionInput" class="form-label">Motivo</label>
        <textarea class="form-control" id="descriptionInput" name="descriptionInput" rows="3"></textarea>
      </div>
    </div>

    <div class="col-6 mt-3">
      <h3>Lista de coins</h3>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">data</th>
            <th scope="col">titulo</th>
            <th scope="col">Valor</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($coins as $coin): ?>
            <tr>
            <th scope="row"><?= $coin->updated_at ?></th>
            <td><?= $coin->title ?></td>
            <td><?= $coin->coins ?></td>
            <td>
              <a href="/dashboard/coins/delete/<?= $coin->id ?>/<?= $membro->id ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
              <a href="/dashboard/coins/update/<?= $membro->id?>/<?= $coin->id ?>" class="btn btn-warning"><i class="fa-solid fa-pen" style="color: #FFF;"></i></a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>
  <?= form_close() ?>
</div>

<?= $this->endSection() ?>
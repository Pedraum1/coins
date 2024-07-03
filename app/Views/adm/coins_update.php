<?= $this->extend('templates/member_tmp') ?>

<?= $this->section('page_css') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/dashboard.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container main bg-white rounded-5">
  <?= form_open('dashboard/coins/updateSubmit') ?>
  <div class="row justify-content-center p-4">

    <h1>Atualizar:  <?= $coin->title ?></h1>

    <input type="hidden" name="coinIdInput" value="<?= $coin->id ?>">
    <input type="hidden" name="personalIdInput" value="<?= $membro->id ?>">
    <div class="col-4">
      <div>
        <label for="coinInput" class="form-label">Adicionar coins</label>
        <input type="number" class="form-control" id="coinInput" name="coinInput" placeholder="0" value="<?= $coin->coins ?>">
      </div>
      <div class="mb-3">
        <label for="titleInput" class="form-label">Título</label>
        <input type="text" class="form-control" id="titleInput" name="titleInput" value="<?= $coin->title ?>">
      </div>
      <div class="d-grid gap-2">
        <button class="btn btn-success" type="submit" name="submit">Atualizar</button>
      </div>
    </div>
    <div class="col-8">
      <div class="mb-3">
        <label for="descriptionInput" class="form-label">Motivo</label>
        <textarea class="form-control" id="descriptionInput" name="descriptionInput" rows="3"><?= $coin->description ?></textarea>
      </div>
    </div>

  </div>
  <?= form_close() ?>
</div>

<?= $this->endSection() ?>
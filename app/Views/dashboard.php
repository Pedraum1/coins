<?= $this->extend('templates/member_tmp') ?>

<?= $this->section('page_css') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/dashboard.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container main bg-white rounded-5">
  <div class="row justify-content-center p-4">

    <div class="col-md-8 me-4">
      <?php if (!empty($membros)) : ?>
        <div class="row align-items-center mb-3">

          <div class="col-md-3">
            <a href="dashboard/add" class="btn btn-secondary">
              Adicionar membro
            </a>
          </div>

          <div class="col-md-5">
            <?= form_open('/dashboard/search') ?>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Pesquisar membro" aria-label="Recipient's username" aria-describedby="button-addon2">
              <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <?= form_close() ?>
          </div>
        </div>

        <h1 class="text-center">Membros</h1>

        <table class="table text-center align-items-center">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Membro</th>
              <th scope='col'>Cargo</th>
              <th scope="col">Coins</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php $ranking = 1; ?>
            <?php foreach ($membros as $membro) : ?>
              <tr>
                <th scope="row"><?= $ranking++ ?></th>
                <td><?= $membro->name ?></td>
                <td>
                  <?= $membro->role ?>
                  <a href="dashboard/edit/role" class="btn btn-warning">
                    <i class="fa-solid fa-pen" style="color: #FFF;"></i>
                  </a>
                </td>
                <td><?= $membro->coins ?></td>
                <td>
                  <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <?php if(session()->acesso == 2): ?>
                      <a href="dashboard/delete/<?= $membro->id ?>" type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                    <?php endif; ?>
                    <a href="dashboard/coins/<?= $membro->id ?>" type="button" class="btn btn-success"><i class="fa-solid fa-coins"></i></a>
                  </div>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>

      <?php endif; ?>

      <?php if (!empty($coins)) : ?>

        <h1 class="text-center">Coins</h1>
        <h4 class="text-center">Total de coins: <?= session()->coins ?></h4>

        <table class="table text-center">
          <thead>
            <tr>
              <th scope="col">Coins</th>
              <th scope="col">Título</th>
              <th scope="col">Atualização</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($coins as $coin) : ?>
              <tr>
                <th scope="row"><?= $coin->coins ?></th>
                <td><?= $coin->title ?></td>
                <td><?= $coin->updated_at ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>

      <?php endif; ?>

    </div>

    <div class="col-md-3 text-center">
      <div class="profile-img" style="background-image: url('<?= base_url('assets/media/') . session()->imagem ?>')"></div>
      <h1><?= session()->nome ?></h1>
      <h4><?= session()->cargo ?></h4>
      <a href="/logout" class="btn btn-danger">Logout</a>
    </div>



  </div>
</div>

<?= $this->endSection() ?>
<?= $this->extend('templates/member_tmp') ?>

<?= $this->section('page_css') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/dashboard.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container main bg-white rounded-5">
  <?= form_open('dashboard/edit/roleSubmit') ?>
  <div class="row justify-content-center p-4">

    <h1>Atualizar cargo: <?= $membro->name ?></h1>

    <input type="hidden" name="idInput" value="<?= encrypt($membro->id) ?>">

    <div class="col-4">
      <div>
        <label for="roleInput" class="form-label">Escolher cargo</label>
        <select class="form-select" aria-label="Default select example" name="roleInput" id="roleInput">

          <option selected value="0"><?= $membro->role ?></option>

          <?php foreach ($roles as $role) : ?>
            <option value="<?= $role->id ?>"><?= $role->role ?></option>
          <?php endforeach; ?>

        </select>
      </div>
      <div class="mb-3">
        <label for="newRoleInput" class="form-label">Novo cargo</label>
        <input type="text" class="form-control" id="newRoleInput" name="newRoleInput" value="">
      </div>
      <div class="d-grid gap-2">
        <button class="btn btn-success" type="submit" name="submit">Atualizar</button>
      </div>
    </div>
    <div class="col-8">
      <p>Nível de acesso</p>
      <div class="row justify-content-around align-items-center">

        <div class="col-4 border rounded-start-4 p-3">          
          <div class="form-check">
            <input class="form-check-input" type="radio" name="accessInput" id="membroInput" value="0" <?php if($membro->access == 0){echo('checked');}  ?>>
            <label class="form-check-label" for="flexRadioDefault2">
              <h5>Membro</h5>
            </label>
            <p>Membros comuns da empresa que não possuem cargo de liderança, todos os membros iniciam na empresa a aprtir daqui</p>
          </div>
        </div>
        
        <div class="col-4 border p-3">          
          <div class="form-check">
            <input class="form-check-input" type="radio" name="accessInput" id="gerenteInput" value="1" <?php if($membro->access == 1){echo('checked');}  ?>>
            <label class="form-check-label" for="flexRadioDefault2">
              <h5>Gerente</h5>
            </label>
            <p>Membros com cargo de liderança, possuem membros comuns sob sua tutela e cuidam de projetos ou áreas como um todo das diretorias</p>
          </div>
        </div>
        <div class="col-4 border rounded-end-4 p-3">          
          <div class="form-check">
            <input class="form-check-input" type="radio" name="accessInput" id="diretorInput" value="2" <?php if($membro->access == 2){echo('checked');}  ?> >
            <label class="form-check-label" for="flexRadioDefault2">
              <h5>Diretor</h5>
            </label>
            <p>Membros resposáveis pelas diretorias da empresa, possuem áreas da empresa sob sua tutela e gerenciam outros membros gerentes</p>
          </div>
        </div>

      </div>
    </div>

  </div>
  <?= form_close() ?>
</div>

<?= $this->endSection() ?>
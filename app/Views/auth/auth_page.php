<?= $this->extend('templates/member_tmp') ?>

<?= $this->section('page_css') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/auth.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="login-box">
  <div class="row justify-content-center align-items-center form-box">
    <div class="col-8 text-center">
      <h1 class="mb-5">Login</h1>
      <?php if(!empty($erro)): ?>
        <p><?= $erro ?></p>
      <?php endif; ?>

      <?= form_open('submit') ?>

      <div class="mb-2">
        <label for="email">
          <h4>Email</h4>
        </label>
        <input type="text" name="email" id="email">
      </div>

      <div class="mb-2">
        <label for="senha">
          <h4>Senha</h4>
        </label>
        <input type="password" name="senha" id="senha">
      </div>

      <div class="mb-4">
        <a href="">Esqueci a senha</a>
      </div>

      <button type="submit" name="submit" class="btn btn-success" >Entrar</button>

      <?= form_close() ?>

    </div>
  </div>
</div>

<?= $this->endSection() ?>
<?= $this->extend('templates/member_tmp') ?>

<?= $this->section('page_css') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/auth.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="login-box">
  <div class="row justify-content-center align-items-center form-box">
    <div class="col-8 text-center">
      <h1 class="mb-5">Login</h1>
      <?php if (!empty($erro)) : ?>
        <p><?= $erro ?></p>
      <?php endif; ?>

      <?= form_open('submit') ?>

      <h4 class="text-start">Email</h4>
      <div class="mb-3">
        <input type="email" name="email" class="form-control" id="email">
      </div>
      <h4 class="text-start">Senha</h4>
      <div class="input-group mb-3">
        <input type="password" name="senha" id="senha" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary toggle-password" type="button" id="button-addon2" onclick="togglePassword()"><i id="icon" class="fa-solid fa-eye"></i></button>
      </div>

      <div class="mb-4">
        <a href="">Esqueci a senha</a>
      </div>

      <button type="submit" name="submit" class="btn btn-success">Entrar</button>

      <?= form_close() ?>

    </div>
  </div>
</div>

<script>
  function togglePassword() {
    const passwordField = document.getElementById("senha");
    const toggleButton = document.getElementById("icon");
    if (passwordField.type === "password") {
      passwordField.type = "text";
      toggleButton.classList.add("fa-eye-slash");
      toggleButton.classList.remove("fa-eye");
    } else {
      passwordField.type = "password";
      toggleButton.classList.add("fa-eye");
      toggleButton.classList.remove.remove("fa-eye-slash");
    }
  }
</script>

<?= $this->endSection() ?>
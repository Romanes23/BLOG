<? require_once COMPONENTS."/header.tmpl.php";?>

        <main class="conteiner py-3">
            <div class="row">

 <form action="posts/storeUs" method="POST" class="col-lg-6 col-md-12 col-sm-12">
    <div class="mb-3">
        <label for="username" class="form-label">input your username</label>
        <input type="text" class="form-control" id="username" name="username">
   <?= isset($validation)? $validation->listErrors('username') : "" ?>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">input your email</label>
        <input type="email" class="form-control" id="email" name="email">
        <?= isset($validation)? $validation->listErrors('email') : "" ?>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">input your password</label>
        <input type="password" class="form-control" id="password" name="password">
         <?= isset($validation)? $validation->listErrors('password') : "" ?>
    </div>
    <div class="mb-3">
        <label for="password_confirm" class="form-label">confirm your password</label>
        <input type="password" class="form-control" id="password_confirm" name="password_confirm">
         <?= isset($validation)? $validation->listErrors('password_confirm') : "" ?>
    </div>

    <!-- <div class="mb-3 form-check">
        <input type="password" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div> -->

    <button type="submit" class="btn btn-primary">Register</button>
</form>
        </main>
<? require_once COMPONENTS."/footer.tmpl.php";?>

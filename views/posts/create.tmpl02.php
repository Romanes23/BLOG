<? require_once COMPONENTS."/header.tmpl.php";?>

        <main class="conteiner py-3">
            <div class="row">
                    <h2>Вход</h2>
                  
 <form action="posts/storeUsInp" method="POST" class="col-lg-6 col-md-12 col-sm-12">
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
   <p>Нет аккаунта? <a href="posts/reg">Создайте его за минуту</a>.</p>
    <!-- <div class="mb-3 form-check">
        <input type="password" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div> -->

    <button type="submit" class="btn btn-primary">Войти</button>
</form>
        </main>
<? require_once COMPONENTS."/footer.tmpl.php";?>


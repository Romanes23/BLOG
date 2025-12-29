
<? require_once COMPONENTS."/header.tmpl.php";?>
        <main class="conteiner py-3">
            <div class="row">
<? require_once COMPONENTS."/sidebar.tmpl.php";?>
                <div class="col-10">
                    <h3><?= $header ?? 'TEST' ?></h3>
                    <!-- <p><?= $post['content'] ?></p> -->
                    <form action="posts/edit" method="GET">
                        <input type="hidden" name="post_id" value= "<?= $post['post_id'] ?>">  <!-- передачяа id через скрытое поле input -->
                        <button type="submit" class = "btn btn-primary">Edit</button>
                    </form>
                    <form action="" method="">
                         <input type="hidden" name="post_id" value= "<?= $post['post_id'] ?>">
                        <button type="submit" class = "btn btn-danger">Delite</button>
                    </form>
                   
                </div>
            </div>
        </main>
<? require_once COMPONENTS."/footer.tmpl.php";?>

//

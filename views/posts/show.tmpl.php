
<? require_once COMPONENTS."/header.tmpl.php";?>
        <main class="conteiner py-3">
            <div class="row">
<? require_once COMPONENTS."/sidebar.tmpl.php";?>
                <div class="col-10">
                    <h3><?= $header ?? 'TEST' ?></h3>
                    <p><?= $post['content'] ?></p>

                   
                </div>
            </div>
        </main>
<? require_once COMPONENTS."/footer.tmpl.php";?>

//

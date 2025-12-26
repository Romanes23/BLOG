<? require_once COMPONENTS."/header.tmpl.php";?>
        <main class="conteiner py-3">
            <div class="row">
<? require_once COMPONENTS."/sidebar.tmpl.php";?>
                <div class="col-10">
                    <h3><?= $header ?? '' ?></h3>

                         <? foreach ($posts as $post): ?>
                    <div class="card mb-3"> 
                        <div class="card-body">
                       <!-- <img src="..." class="card-img-top" alt="..."> -->
                            <a href="posts?id=<?= $post['post_id'] ?>"><h5 class="card-title"><?=$post['title']?></h5></a>
                            <p class="card-text"><?=$post['descr']?></p>
                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                        <? endforeach;?> 
                   
                </div>
            </div>
        </main>
<? require_once COMPONENTS."/footer.tmpl.php";?>

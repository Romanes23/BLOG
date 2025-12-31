
<? require_once COMPONENTS."/header.tmpl.php";?>
        <main class="conteiner py-3">
            <div class="row">
<? require_once COMPONENTS."/sidebar.tmpl.php";?>
                <div class="col-10">
                    <h3><?= $header ?? 'TEST' ?></h3>
                    <p><?= $post['content'] ?></p>
                      <!-- ======================= AJAX ============================ -->
                    <div id="rate-container" class="row col-3">    <!--Это не форма, те кнопки на JS     -->                    
                        <button id="up_btn" class="btn btn-link col" data-post-id="<?= $post['post_id'] ?>">Up</button>      
                        <p id="rate_p" class="col" ><?= isset($post['rate']) ? $post['rate'] : "0" ?></p> 
                        <button id="down_btn" class="btn btn-link col" data-post-id="<?= $post['post_id'] ?>">Down</button>    
                     </div>
<!--Кнопки id="up_btn" и id="down_btn" нужны для оценки, те установки рейтинга поста +1 -1 $post['rate'].
 AJAX здесь используется чтобы не перезагружать страницу.
 В HTML есть способ созд свои собств данные data-post-id те post-id запись ч/з тире. Но со стороны JS обращаться будем 
   CamelCase те postId те также как и CSS стилями-->
                     <!-- ======================= AJAX ============================ -->

                    <form action="posts/edit" method="GET">
                        <input type="hidden" name="post_id" value= "<?= $post['post_id'] ?>">  <!-- передачяа id через скрытое поле input -->
                        <button type="submit" class = "btn btn-primary">Edit</button>
                    </form>
                    <form action="posts" method="POST">
                         <input type="hidden" name="post_id" value= "<?= $post['post_id'] ?>"> 
                         <input type="hidden" name="_method" value= "DELETE">       <!--    передача чз API -->
                        <button type="submit" class = "btn btn-danger">Delete</button>
                    </form>
                   
                </div>
            </div>
        </main>
<? require_once COMPONENTS."/footer.tmpl.php";?>

//

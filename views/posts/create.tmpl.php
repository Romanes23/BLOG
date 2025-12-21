<? require_once COMPONENTS."/header.tmpl.php";?>

        <main class="conteiner py-3">
            <div class="row">
<? ?>
                <div class="col-10">
                            <h3><?= $header ?? '' ?></h3>
                    <form action="post/create" method="POST" class = py-3 col-8>
                            <div class="mb-3">
                                <label for="title" class="form-label">Post title</label>
                                <input type="text" class="form-control" id="title" name ="title"placeholder="Post title">
                            </div>
                            <div class="mb-3">
                                <label for="descr" class="form-label">Post description</label>
                                <input type="text" class="form-control" id="descr" name="descr" placeholder="Post description">
                            </div>
                            <input type="hidden"  name ="HHHHH" value="1212121">
                            <div class="mb-3">
                                <label for="content" class="form-label">Post content</label>
                                <textarea class="text" id="content"  name="content" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mb-3">Create</button>
                   </form>
                </div>
            </div>
        </main>
<? require_once COMPONENTS."/footer.tmpl.php";?>

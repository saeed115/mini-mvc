<?php

    if (!empty($errors)):

        foreach($errors as $error): ?>


            <div class="alert alert-danger" role="alert">
                <?php echo $error ?>
            </div>

        <?php endforeach;

    endif;
?>

<form method="post" enctype="multipart/form-data">
    <?php

        if ($product['img']): ?>

            <img class="img-thumbnail w-25" src="/<?php echo $product['img'] ?>">

        <?php endif

    ?>

    <div class="mb-3">
        <label for="img" class="form-label">Image</label>
        <input type="file" name="img" class="form-control" id="img">
    </div>

    <div class="mb-3">
        <label for="exampleInputTitle" class="form-label">Title</label>
        <input type="text" name="title" value="<?php echo $product['title'] ?>" class="form-control" id="exampleInputTitle">
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" name="price" step=".01" value="<?php echo $product['price'] ?>" class="form-control" id="price" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
        <label for="desc" class="form-label">Description</label>
        <textarea class="form-control" name="desc" id="desc" cols="30" rows="10">
            <?php echo $product['p_desc'] ?>
        </textarea>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>

<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="my-3">Products CRUD</h1>

        <a href="/products/create" type="button" class="btn btn-sm btn-success">Create Product</a>
    </div>

    <form>
        <div class="input-group mb-3">
            <input type="text" name="s" value="<?php echo $s ?>" class="form-control" placeholder="search products" aria-label="search products" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
        </div>
    </form>

    <table class="table" aria-label="">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Price</th>
            <th scope="col">Create Date</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

        <?php

        foreach ($products as $i => $product): ?>

            <tr>
                <th scope="row"><?php echo $i + 1 ?></th>
                <td>
                    <?php if ($product['img']): ?>

                        <img class="img-thumbnail" src="<?php echo $product['img'] ?>">

                    <?php endif ?>
                </td>
                <td><?php echo $product['title'] ?></td>
                <td><?php echo $product['price'] ?></td>
                <td><?php echo $product['c_at'] ?></td>
                <td>
                    <a href="/products/update?id=<?php echo $product['id'] ?>" type="button" class="btn btn-sm btn-outline-primary">Edit</a>

                    <form class="d-inline" action="/products/destroy" method="post">
                        <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                        <button type="submit" class="btn btn-sm btn-outline-danger ">Delete</button>
                    </form>
                </td>
            </tr>

        <?php endforeach; ?>

        </tbody>
    </table>
</div>
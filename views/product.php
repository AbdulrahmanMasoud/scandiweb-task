<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <title>Product</title>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">Product</a>
        <ul class="actions justify-content-end my-0">
            <a href="/add-product" class="btn btn-success">Add Product</a>
            <a href="/mass-delete" class="btn btn-danger">Mass Delete</a>
        </ul>
    </nav>
    <section class="products m-4">
        <div class="container">
            <form method="post" class="container py-4" id="products_form" action="/mass-delete">
                <input type="hidden" id="deleted-products" name="mass_delete">
                <div class="row">
                    <?php foreach ($products as $product): ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="product"
                            id="product<?php echo $product['id']; ?>"
                            onclick="checkBox('<?php echo $product['id']; ?>')">
                            <input type="checkbox" class="btn-check"
                                id="btn-check<?php echo $product['id']; ?>"
                                autocomplete="off" />
                            <span class="sku font-weight-bold"><?php echo $product['sku']; ?></span>
                            <h5 class="name"><?php echo $product['name']; ?>
                            </h5>
                            <p class="price">$<?php echo $product['price']; ?>
                            </p>
                            <p class="type">Size: 100m</p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </form>
        </div>
    </section>

    <script src="../../assets/js/jquery3.4.1.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/main.js"></script>
</body>

</html>
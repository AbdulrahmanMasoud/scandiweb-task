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
            <button onclick="window.location.replace('/add-product');" class="btn btn-success">ADD</button>
            <button id="delete-product-btn" class="btn btn-danger">MASS DELETE</button>
        </ul>
    </nav>
    <section class="products m-4">
        <div class="container">
            <form method="post" class="container py-4" id="products_form" action="/mass-delete">
                <div class="row">
                    <?php foreach ($products as $product): ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="product"
                            id="product<?php echo $product['id']; ?>"
                            onclick="checkBox('<?php echo $product['id']; ?>')">

                            <input name="ids[]" type="checkbox" class="btn-check delete-checkbox"
                                id="btn-check<?php echo $product['id']; ?>"
                                value="<?php echo $product['id']; ?>"
                                autocomplete="off" />

                            <span class="sku font-weight-bold"><?php echo $product['sku']; ?></span>
                            <h5 class="name"><?php echo $product['name']; ?>
                            </h5>
                            <p class="price">$<?php echo $product['price']; ?>
                            </p>
                            <p class="type">
                                <?php echo $product['size'] ? "Size: ".$product['size']." MB" : null ?>
                                <?php echo $product['weight'] ? "Weight: ".$product['weight']." KG" : null ?>
                                <?php echo $product['size'] == null && $product['weight'] == null? "Dimensions: ".$product['height']."x".$product['width']."x".$product['length'] : null ?>
                            </p>

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
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
                    <div class="col-md-3 col-sm-6">
                        <div class="product" id="product1" onclick="checkBox('1')">
                            <input type="checkbox" class="btn-check" id="btn-check1" autocomplete="off" />
                            <span class="sku font-weight-bold">SKU</span>
                            <h5>Name</h5>
                            <p>$1000</p>
                            <p>Size: 100m</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="product" id="product2" onclick="checkBox('2')">
                            <input type="checkbox" class="btn-check" id="btn-check2" autocomplete="off" />
                            <span class="sku font-weight-bold">SKU</span>
                            <h5 class="name">Name</h5>
                            <p class="price">$1000</p>
                            <p class="type">Size: 100m</p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <script src="../../assets/js/jquery3.4.1.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/main.js"></script>
</body>

</html>
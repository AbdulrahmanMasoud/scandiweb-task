<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Add Product</title>
</head>

<body>
    <div class="form-body">
        <div class="row" style="justify-content: center;">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <div id="alert"></div>

                        <h3>Hey, Add Product Now</h3>
                        <form id="product_form" method="POST" action="#">
                            <div class="col-md-12">
                                <input class="form-control" type="text" name="sku" id="sku" placeholder="SKU">
                            </div>

                            <div class="col-md-12">
                                <input class="form-control mt-3" type="text" name="name" id="name"
                                    placeholder="Product Name">
                            </div>

                            <div class="col-md-12">
                                <input class="form-control mt-3" type="number" name="price" id="price"
                                    placeholder="Price ($)">
                            </div>

                            <div class="col-md-12">
                                <select class="form-select m-0 mt-3" id="productType">
                                    <option value="" selected>Type Switcher</option>
                                    <option value="DVD" id="DVD">DVD-disc</option>
                                    <option value="Book" id="Book">Book</option>
                                    <option value="Furniture" id="Furniture">Furniture</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <div class="dvd d-none py-2" id="dvd-inputs">
                                    <input class="form-control" type="number" id="size" name="dvd"
                                        placeholder="Size (MB)">
                                    <small class="my-2 text-secondary">
                                        Please provide DVD size in mega bytes
                                    </small>
                                </div>
                                <div class="book d-none py-2" id="book-inputs">
                                    <input class="form-control" type="number" id="weight" name="book"
                                        placeholder="Wight (KG)">
                                    <small class="my-2 text-secondary">
                                        Please provide book weight in kilo grams
                                    </small>
                                </div>
                                <div class="furniture d-none py-2" id="furniture-inputs">
                                    <input class="form-control mt-1" type="number" id="height" name="dimension_h"
                                        placeholder="Dimension (H)">
                                    <input class="form-control mt-1" type="number" id="width" name="dimension_w"
                                        placeholder="Dimension (W)">
                                    <input class="form-control mt-1" type="number" id="length" name="dimension_L"
                                        placeholder="Dimension (L)">

                                    <small class="my-2 text-secondary">
                                        Please provide dimensions in HxWxL format
                                    </small>
                                </div>
                            </div>

                            <div class="form-button mt-3">
                                <button id="add-product" type="button" class="btn btn-primary">Save</button>
                                <a href="/" class="btn btn-danger">Cancel</a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="../../assets/js/jquery3.4.1.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/main.js"></script>
</body>

</html>
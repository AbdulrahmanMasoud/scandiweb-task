
function checkBox(product) {
    let checkBoxes = $('.product #btn-check' + product);
    checkBoxes.attr("checked", !checkBoxes.attr("checked"))
    $("#product" + product).toggleClass('product-borderd');
}

// Determine special attribute according to type switcher
$('#productType').change(function () {
    let option = $('#productType').val();
    let dvd = $('#dvd-inputs');
    let book = $('#book-inputs');
    let furniture = $('#furniture-inputs');
    switch (option) {
        case "DVD":
            dvd.removeClass('d-none');
            book.addClass('d-none');
            furniture.addClass('d-none');
            break;
        case "Book":
            dvd.addClass('d-none');
            book.removeClass('d-none');
            furniture.addClass('d-none');
            break;
        case "Furniture":
            dvd.addClass('d-none');
            book.addClass('d-none');
            furniture.removeClass('d-none');
            break;
        default:
            dvd.addClass('d-none');
            book.addClass('d-none');
            furniture.addClass('d-none');
            break;
    }
});

//Add new product
$('#add-product').on('click', function () {

    let sku = $("#sku").val();
    let name = $("#name").val();
    let price = $("#price").val();
    let size = $("#size").val();
    let weight = $("#weight").val();
    let height = $("#height").val();
    let width = $("#width").val();
    let length = $("#length").val();


    $.ajax({
        url: "/store-product",
        method: "POST",
        data: {
            sku: sku,
            name: name,
            price: price,
            size: size,
            weight: weight,
            height: height,
            width: width,
            length: length,
        },
        success: function (product) {
            if(!JSON.parse(product).status){
                $('#alert').html('<div class="alert alert-danger" role="alert">' + JSON.parse(product).message + '</div>');
            }else if(JSON.parse(product).status && JSON.parse(product).message){
                window.location.replace("/");
            }
        },
        error: function (err) {
            console.log(err);
        },
    });

});

//Mass Delete

$("#delete-product-btn").on('click', function () {
    $('#products_form').submit();
});

$("#products_form").on('submit',function(e) {
    if(!$('input[type=checkbox]').is(':checked')){
        return false;
    }
});



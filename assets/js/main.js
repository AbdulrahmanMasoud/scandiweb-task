
function checkBox(product) {
    let checkBoxes = $('.product #btn-check'+product);
    const deletedProducts = [];
    checkBoxes.attr("checked", !checkBoxes.attr("checked"))
    $("#product"+product).toggleClass('product-borderd');
    if($('#btn-check'+product).is(':checked')){
        deletedProducts.push(product);
    }else{
        // deletedProducts.splice(0, deletedProducts.length, product);
    }
    console.log(deletedProducts);
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
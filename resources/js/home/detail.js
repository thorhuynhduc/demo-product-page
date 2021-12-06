const addToCart = (productId, price, quantity = 1, image = '', name = '', brand = '', isBuy = false) => {
    let _token = $('meta[name="csrf-token"]').attr('content')

    axios({
        method: "post",
        url: `${appDomainUrl}/cart/add`,
        data: {
            _token: _token,
            product_id: productId,
            name: name,
            brand: brand,
            price: price,
            quantity: Number(quantity),
            image: image,
        },
        responseType: 'json',
    })
    .then(function (response) {
        if (response.status) {
            if (!isBuy) {
                showSuccess('Add to cart success !!!')
            }
        }
    })
    .catch(function (errors) {
        if (errors.response.data.error) {
            showError(errors.response.data.error)
        } else {
            console.log(errors)
        }
    })
}
$(document).on('click', '.add-product-to-cart', function() {
    let quantity = $('#quant').val()
    let productId = $(this).data('id')
    let price = $(this).data('price')
    let image = $(this).data('image')
    let name = $(this).data('name')
    let brand = $(this).data('brand')
    addToCart(productId, price, quantity, image, name, brand)
})

$(document).on('click', '.btn-buy-now', function() {
    let quantity = $('#quant').val()
    let productId = $(this).data('id')
    let price = $(this).data('price')
    let image = $(this).data('image')
    let name = $(this).data('name')
    let brand = $(this).data('brand')
    addToCart(productId, price, quantity, image, name, brand, true)

    setTimeout(function () {
        window.location.href = `${appDomainUrl}/cart`
    }, 500);
})

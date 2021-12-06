const searchProduct = (sortBy = 'created_at', sortType = 'desc') => {
    let keyword = $('#keyword').val()
    let priceFormTo = $('input[name="price_form_to"]:checked').val()
    let brandIds = $.map($('input:checkbox[name="brand_id"]:checked'), function(c){return Number(c.value); })

    axios({
        method: "get",
        url: `${appDomainUrl}/search`,
        params: {
            keyword: keyword,
            price_form_to: priceFormTo,
            brand_id: brandIds,
            sort_by: sortBy,
            sort_type: sortType,
        },
        responseType: 'json',
    })
    .then(function (response) {
        if (response.status) {
            let html = ''
            _.forEach(response.data.data.data, function(value) {
                html += `<div class="col-sm-6 col-md-4">
                        <div class="shop__thumb">
                            <a href="${appDomainUrl}/product/${value.id}/detail">
                                <div class="shop-thumb__img">
                                    <img style="height: 220px;" src="${appDomainUrl}/storage/${value.images[0].path}" class="img-responsive" alt="...">
                                </div>
                                <h5 class="shop-thumb__title">
                                    ${value.name}
                                </h5>
                                <div class="shop-thumb__price">
                                    <span class="shop-thumb-price_new">$${value.price}</span>
                                </div>
                            </a>
                            
                            <button class="btn btn-dark btn-rounded mr-1 add-product-to-cart mt-3"
                                        data-toggle="tooltip"
                                        data-id="${value.id}"
                                        data-price="${value.price}"
                                        data-name="${value.name}"
                                        data-brand="${value.brand_id}"
                                        data-image="${appDomainUrl}/storage/${value.images[0].path}"
                                        data-original-title="Add to cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                                <button class="btn btn-primary btn-rounded btn-buy-now mt-3"
                                        data-id="${value.id}"
                                        data-price="${value.price}"
                                        data-name="${value.name}"
                                        data-brand="${value.brand_id}"
                                        data-image="${appDomainUrl}/storage/${value.images[0].path}"
                                >Buy Now</button>
                        </div>
                    </div>`
            });

            $('#product-list').html(html)
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

$('.search-product').click(function () {
    searchProduct()
})

$('input[name="price_form_to"]').change(function () {
    searchProduct()
})

$('input[name="brand_id"]').change(function () {
    searchProduct()
})

$('.sorting-product').click(function (e) {
    e.preventDefault()

    $('.sorting-product').removeClass('active')
    $(this).addClass('active')

    let sortBy = $(this).data('sort-by')
    let sortType = $(this).data('sort-type')

    searchProduct(sortBy, sortType)
})

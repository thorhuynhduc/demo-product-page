const convertDataFromToObject = (element) => {
    let object = {}
    let data = element.serializeArray()
    //transform into simple data/value object
    for(let i = 0; i < data.length; i++){
        let record = data[i];
        object[record.name] = record.value
    }

    return object
}

$('.btn-search-product').click(function (e) {
    e.preventDefault()
    let param = convertDataFromToObject($('#search-product-form'))

    axios({
        method: "get",
        url: `${appDomainUrl}/product/search`,
        params: param,
        responseType: 'json',
    })
    .then(function (response) {
        if (response.status) {
            let html = ''
            _.forEach(response.data.data.data, function(value) {
                html += `<tr class="product-item-${value.id}">
                            <th scope="row">${value.id}</th>
                            <td>${value.name}</td>
                            <td class="abc">${value.description}</td>
                            <td>$${value.price}</td>
                            <td>
                                <a href="${appDomainUrl}/product/${value.id}/edit" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                <a type="button" class="btn btn-danger btn-sm delete-product" data-id="${value.id}"><i style="color: white" class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>`
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
})

$(document).on('click', '#product-list .delete-product', function() {
    let productId = $(this).data('id')
    let productItem = $(`.product-item-${productId}`)
    let _token = $('meta[name="csrf-token"]').attr('content')

    axios({
        method: "post",
        url: `${appDomainUrl}/product/${productId}`,
        data: {
            _token: _token,
            _method: 'DELETE'
        },
        responseType: 'json',
    })
    .then(function (response) {
        if (response.status) {
            productItem.remove()
            showSuccess('Delete product success', () => {
                console.log(121313)
            })
        }
    })
    .catch(function (errors) {
        if (errors.response.data.error) {
            showError(errors.response.data.error)
        } else {
            console.log(errors)
        }
    })
});

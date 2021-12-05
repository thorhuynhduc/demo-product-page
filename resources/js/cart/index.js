$('.btn-remove-cart').click(function () {
  let productId   = $(this).data('product-id')
  let key         = $(this).data('key')
  let cartElement = $(`#cart-item-${key}`)
  let _token      = $('meta[name="csrf-token"]').attr('content')

  axios({
    method:       "post",
    url:          `${appDomainUrl}/cart/${productId}`,
    data:         {
      _token:  _token,
      _method: 'DELETE',
    },
    responseType: 'json',
  })
  .then(function (response) {
    if (response.status) {
      cartElement.remove()
      $('#sum-price').text(`$${response.data.data}`)
      showSuccess('Remove success')
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
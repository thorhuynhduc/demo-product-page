require('jquery-validation')

$('#updateProduct').validate({
  rules: {
    name: {
      required: true
    },
    description: {
      required: true
    },
    price: {
      required: true
    },
  },
  messages: {
    name: {
      required: "Name is required",
    },
    description: {
      required: "Description is required",
    },
    price: {
      required: "Price is required",
    },
  },
  onKeyup: true,
  eachValidField: function () {
    $(this).removeClass('error')
  },
  eachInvalidField: function () {
    $(this).addClass('error')
  },
  submitHandler: function () {
    let _token = $('meta[name="csrf-token"]').attr('content')
    let formData = new FormData()

    formData.append("_method", "PUT")
    formData.append("_token", _token)
    formData.append("name", $('#name').val())
    formData.append("brand_id", $('#brand_id').val())
    formData.append("description", $('#description').val())
    formData.append("delivery", $('#delivery').val())
    formData.append("warranty_information", $('#warranty_information').val())
    formData.append("price", $('#price').val())

    _.forEach($('.file-upload'), function (fileElement) {
      if (fileElement.files[0]) {
        formData.append("images[]", fileElement.files[0])
      } else {
        formData.append("images_old[]", $(fileElement).data('name'))
      }
    })

    axios({
      method: "post",
      url: `${appDomainUrl}/product/${$('#product_id').val()}`,
      data: formData,
      responseType: 'json',
      headers: {"Content-Type": "multipart/form-data"},
    })
      .then(function (response) {
        if (response.status) {
          showSuccess('Edit product success', () => {
            window.location.href = `${appDomainUrl}/product`
          }, 500)
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
})

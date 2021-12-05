require('jquery-validation')

$('#createProduct').validate({
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
    'images[]': {
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
    'images[]': {
      required: "Images product is required",
    }
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

    formData.append("_token", _token)
    formData.append("name", $('#name').val())
    formData.append("description", $('#description').val())
    formData.append("price", $('#price').val())

    _.forEach($('.file-upload'), function (fileElement) {
      if (fileElement.files[0]) {
        formData.append("images[]", fileElement.files[0])
      }
    })

    axios({
      method: "post",
      url: `${appDomainUrl}/product`,
      data: formData,
      responseType: 'json',
      headers: {"Content-Type": "multipart/form-data"},
    })
      .then(function (response) {
        if (response.status) {
          showSuccess('Create product success', () => {
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
  }
})

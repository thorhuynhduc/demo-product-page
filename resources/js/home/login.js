$('.btn-login').click(function () {
    let email = $('#email').val()
    let password = $('#password').val()

    axios({
        method: "post",
        url: `${appDomainUrl}/login`,
        data: {
            email: email,
            password: password,
        },
        responseType: 'json',
    })
    .then(function (response) {
        if (response.status) {
            showSuccess('Login success', () => {
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
})

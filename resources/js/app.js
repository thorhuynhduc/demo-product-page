require('./bootstrap')

window.Toastify = require('toastify-js')
window._ = require('lodash')
window.axios = require('axios')
window.appDomainUrl = `${process.env.MIX_APP_URL}:${process.env.MIX_PROJECT_PORT}`

window.showError = (error) => {
  if (typeof error === "string") {
    Toastify({
      text: error,
      style: {
        background: "linear-gradient(to right, rgb(255, 95, 109), rgb(255, 195, 113))",
      },
      duration: 3000
    }).showToast()
  }

  if (error.code && error.code === 422) {
    _.forOwn(error.message, (value) => {
      Toastify({
        text: value,
        style: {
          background: "linear-gradient(to right, rgb(255, 95, 109), rgb(255, 195, 113))",
        },
        duration: 3000
      }).showToast()
    })
  }
}

window.showSuccess = (message, callback = () => {}, time = 3000) => {
  Toastify({
    text: message,
    style: {
      background: "linear-gradient(to right, #00b09b, #96c93d)",
    },
    duration: time
  }).showToast()

  setTimeout(callback, time);
}

// Remove button click
$(document).on(
  'click',
  '[data-role="dynamic-fields"] > .form-inline [data-role="remove"]',
  function(e) {
    e.preventDefault();
    $(this).closest('.form-inline').remove();
  }
);
// Add button click
$(document).on(
  'click',
  '[data-role="dynamic-fields"] > .form-inline [data-role="add"]',
  function(e) {
    e.preventDefault();
    var container = $(this).closest('[data-role="dynamic-fields"]');
    new_field_group = container.children().filter('.form-inline:first-child').clone();
    new_field_group.find('label').html('Upload image');
    new_field_group.find('img').attr('src', 'http://bppl.kkp.go.id/uploads/publikasi/karya_tulis_ilmiah/default.jpg');
    new_field_group.find('input').each(function(){
      $(this).val('');
    });
    container.append(new_field_group);
  }
);

// file upload
$(document).on('change', '.file-upload', function(e){
  var file = this.files[0].name;
  $(this).prev('label').text(file);
  $(this).parent().nextAll('img').attr('src', URL.createObjectURL(this.files[0]));
});

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"/>
        <style>
            .form-inline .form-control.custom-file-upload {
                border: 1px solid #ccc;

                padding: 6px 12px;
                cursor: pointer;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                width: 100%;
            }

            .wrap-input-container {
                display: inline-block;
                position: relative;
                overflow: hidden;
                height: 32px;
            }
            .wrap-input-container input {
                position: absolute;
                font-size: 400px;
                opacity: 0;
                z-index: 1;
                top: 0;
                left: 0;
            }
        </style>
    </head>
    <body>
    <div class="form-group row custom-upload">

        <div class="col-md-6">
            <label class="col-form-label" for="pancardupload">Lorem Ipsum is simply dummy text</label>
        </div>

        <div class="col-md-6">
            <div data-role="dynamic-fields">
                <div class="form-inline form-row">
                    <!-- file upload start-->
                    <div class="mb-2 mr-sm-2 col-sm-5 wrap-input-container">
                        <label class="custom-file-upload form-control">
                            <i class="fa fa-cloud-upload"></i> Upload Document
                        </label>
                        <input class="file-upload" name="file_name" type="file">
                    </div>
                    <!-- file upload ends-->

                    <button class="btn btn-sm btn-danger  mb-2" data-role="remove">
                        <i class="fa fa-minus"></i>
                    </button>
                    <button class="btn btn-sm btn-primary  mb-2" data-role="add">
                        <i class="fa fa-plus"></i>
                    </button>


                </div>  <!-- /div.form-inline -->
            </div>  <!-- /div[data-role="dynamic-fields"] -->
        </div>
    </div>

    <script>
      // Dynamically add-on fields

      $(function() {
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
            new_field_group.find('label').html('Upload Document'); new_field_group.find('input').each(function(){
              $(this).val('');
            });
            container.append(new_field_group);
          }
        );
      });



      // file upload

      $(document).on('change', '.file-upload', function(){
        var i = $(this).prev('label').clone();
        var file = this.files[0].name;
        $(this).prev('label').text(file);
      });
    </script>
    </body>
</html>

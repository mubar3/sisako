<html>

<head>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Codeigniter 4 Image Crop with jQuery Croppie Example</title>

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css" />
</head>

<body>
    <div class="container mt-4">
        <input type="file" name="file" id="img-crop" accept="image/*" />
    </div>

    <div id="imageModel" class="modal fade bd-example-modal-lg" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Crop and Resize Image</h4>
                </div>
                <div class="modal-body">
                    <div id="img_prev" style="width:400px;"></div>
                    <button class="btn btn-primary btn-block crop_my_image">Store</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
    <script>
        $(document).ready(function () {
            $image_crop = $('#img_prev').croppie({
                // enableExif: true,
                viewport: {
                    width: 300,
                    height: 400,
                    type: 'square' // square
                },
                boundary: {
                    width: 600,
                    height: 400
                }
            });

            $('#img-crop').on('change', function () {
                var reader = new FileReader();
                reader.onload = function (event) {
                    $image_crop.croppie('bind', {
                        url: event.target.result
                    }).then(function () {

                    });
                }
                reader.readAsDataURL(this.files[0]);
                $('#imageModel').modal('show');
            });

            // $('.crop_my_image').click(function (event) {
            //     $image_crop.croppie('result', {
            //         type: 'canvas',
            //         size: 'viewport'
            //     }).then(function (response) {
            //         $.ajax({
            //             type: 'post',
            //             url: "<?php echo base_url('ImageCrop/store'); ?>",
            //             data: {
            //                 "image": response
            //             },
            //             success: function (data) {
            //                 console.log(data);
            //                 $('#imageModel').modal('hide');
            //             }
            //         })
            //     });
            // });
        });
    </script>
</body>

</html>

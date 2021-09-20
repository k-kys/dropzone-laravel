<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dropzone Image</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>
</head>

<body>
    <div class="container">
        <h2>Laravel Upload Image Using Dropzone</h2>
        <form action="{{ url('dropzone/store') }}" method="POST" enctype="multipart/form-data" class="dropzone" id="dropzone">
            @csrf
        </form>
    </div>

    <script>
        Dropzone.options.dropzone = {
            maxFilesize: 10, // 10MB
            renameFile: (file) => {
                var date = new Date();
                var time = date.getTime();
                return `${time}-${file.name}`;
            },
            acceptedFiles: '.jpg,.jpeg,.png,.gif',
            addRemoveLinks: true,
            timeout: 60000,
            success: (file, response) => {
                console.log(response);
            },
            error: (file, response) => {
                return false;
            }
        }
    </script>
</body>

</html>

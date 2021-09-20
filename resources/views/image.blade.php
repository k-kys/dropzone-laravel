<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dropzone Image</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>
</head>

<body>
    <div class="container">
        <h2>Index Image Dropzone</h2>
        <div id="list-image">
            @foreach ($images as $img)
            <div>
                <img src="{{ asset('images/'.$img->path) }}" alt="{{ $img->id }}"
                    style="max-width: 200px; height: auto;">
                <button type="button" class="btn btn-primary btn-delete-image" data-id="{{ $img->id }}">X</button>
                <a href="{{ url('/dropzone/delete/'.$img->id) }}" class="btn btn-secondary">Xoa</a>
            </div>
            @endforeach
        </div>

    </div>

    <script>
        $(document).ready(() => {
            // loadImage();
        });

        function loadImage() {
            $.ajax({
                type: "get",
                url: "dropzone/image-data",
                dataType: "json",
                success: function (response) {
                    var str = '';
                    $.each(response, (index, value) => {
                    str += `<div>
                        <img src="/images/${value.path}" alt="${value.id}" style="max-width: 200px; height: auto;">
                        <button type="button" class="btn btn-primary btn-delete-image" data-id="${value.id}">X</button>
                    </div>`;
                    });
                    $(this).html(str);
                }
            });
        }

        $('.btn-delete-image').on('click', () => {
            var id = $(this);
            console.log('button id = ', id);
            $.ajax({
                type: "get",
                url: `/dropzone/delete/${id}`,
                dataType: "json",
                success: (response) => {
                    console.log(response.images);
                    loadImage();
                },
                error: () => {
                    alert('Failed!');
                }
            });
        })
    </script>
</body>

</html>

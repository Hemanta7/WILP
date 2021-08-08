<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css"
        integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    {{-- Fonts --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:500" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
</head>

<body>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
    <script>
        // Normal
        tinymce.init({
            height: "400",
            selector: 'textarea.normal',
            // selector: "textarea",
            // selector: "textarea:not(.mceNoEditor)",

            // menubar:false,
            statusbar: false,
            plugins: "paste lists link",
            toolbar: 'styleselect link backcolor forecolor bold italic link lineheight underline strikethrough subscript superscript fontsizeselect alignleft aligncenter alignjustify alignnone  alignright indent outdent numlist bullist removeformat',
            // paste_as_text: true,
        });
    </script>
    <style>
        .tox-notifications-container {
            display: none !important;
        }

    </style>
    <div class="wrapper">
        @include('admin.layouts.sidebar')
        <div class="main-panel">
            @include('admin.layouts.navigation')
            @yield('content')
            @include('admin.layouts.footer')
        </div>
    </div>
    {{-- Scripts --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"
        integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous">
    </script>
    {{-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> --}}
    <script src="{{ asset('vendors/datatables.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('table.display').DataTable();
        });
    </script>
    <script>
        $('#metaTable').dataTable({
            "aLengthMenu": [100]
        });
    </script>
</body>

</html>

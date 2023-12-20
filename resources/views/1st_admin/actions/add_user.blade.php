<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" sizes="4x4" href="{{asset('assets/img/nmpc-logo.png')}}">
    <title>msu-iit nmpc</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">

    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{asset('assets/plugins/bs-stepper/css/bs-stepper.min.css')}}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{asset('assets/plugins/dropzone/min/dropzone.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">

    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote-bs4.min.css')}}">
    <!-- CodeMirror -->
    <link rel="stylesheet" href="{{asset('assets/plugins/codemirror/codemirror.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/codemirror/theme/monokai.css')}}">
    <!-- SimpleMDE -->
    <link rel="stylesheet" href="{{asset('assets/plugins/simplemde/simplemde.min.css')}}">
    <title>Add User Form</title>
    <style>
        .password-container {
            position: relative;
        }

        #togglePassword {
            position: absolute;
            top: 50%;
            right: 10px;
            cursor: pointer;
        }

        #passwordMismatch {
            color: red;
        }
    </style>
</head>

<body>

    <h2>Add User</h2>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <div class="password-container">
           
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required> <span id="togglePassword" onclick="togglePasswordVisibility()">
                👁️
            </span>
        </div>

        <label for="photo">Photo:</label>
        <input type="file" id="photo" name="photo"><br>

        <label for="admin">Admin:</label>
        <select id="admin" name="admin">
            <option value="0">BOARD OF DIRECTOR</option>
            <option value="1">BOARD OF DIRECTOR SEC.</option>
            <option value="1">ADMIN SEC.</option>
        </select><br>

        <button type="submit">Add User</button>
    </form>

    <!-- jQuery -->
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{asset('assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
    <!-- InputMask -->
    <script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets/plugins/inputmask/jquery.inputmask.min.js')}}"></script>
    <!-- date-range-picker -->
    <script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- bootstrap color picker -->
    <script src="{{asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
    <!-- BS-Stepper -->
    <script src="{{asset('assets/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
    <!-- dropzonejs -->
    <script src="{{asset('assets/plugins/dropzone/min/dropzone.min.js')}}"></script>
    <!-- AdminLTE App -->


    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var toggleIcon = document.getElementById("togglePassword");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.textContent = "👁️";
            } else {
                passwordInput.type = "password";
                toggleIcon.textContent = "👁️";
            }
        }
    </script>
</body>

</html>

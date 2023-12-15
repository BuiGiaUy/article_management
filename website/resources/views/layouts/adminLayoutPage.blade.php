<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>XRay - Responsive Bootstrap 4 Admin Dashboard Template</title>
    @include("Partial.head")
</head>
<body>
<div id="loading">
    <div id="loading-center">
    </div>
</div>
<!-- loader END -->
<!-- Wrapper Start -->
<div class="wrapper">
    @include("Partial.sidebar")
    <!-- Page Content  -->
    <div id="content-page" class="content-page">
        @include("Partial.header")
        <div class="container-fluid">
            @yield("content")
        </div>
        @include("Partial.footer")
    </div>
</div>
<!-- Wrapper END -->

@include("Partial.bodyJs")
</body>
</html>


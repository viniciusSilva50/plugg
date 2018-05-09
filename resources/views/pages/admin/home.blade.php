<html>
<head>
    @include('includes.head')
</head>
<body>

@include('includes.header')

<div class="container">
    <div id="main" class="row">
        @yield('content')
    </div>
</div>
    @include('includes.scripts')
</body>
</html>
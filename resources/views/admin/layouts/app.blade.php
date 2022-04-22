<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students Administration</title>

    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>
<body class="bg-gray-200">

    <div class="container mx-auto p-10">
        @include('admin.includes.header')

        <div class="flex flex-wrap" id="tabs-id">
            <div class="w-full">
                @include('admin.includes.navigation')
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                    <div class="px-10 py-10 flex-auto">
                        <div class="tab-content tab-space">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>
@props(['title', 'assets' => null, 'page' => null])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} - Trustmedika</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        canvas: '#1f253d',
                        card: '#394264',
                        icon: '#9099b7',
                        badge: '#50597b',

                    }
                }
            }
        }
    </script>
    {{ $assets }}
</head>

<body class="bg-canvas w-screen h-screen overflow-auto">
    <div class="py-24 px-12 md:px-6 w-[1028px] mx-auto relative">
        <header class="w-full mx-auto bg-card flex justify-between rounded-lg relative">
            {{-- menu --}}
            <x-layouts.menu :page="$page" />
            {{-- profile --}}
            <x-layouts.profile/>
        </header>

        {{ $slot }}
    </div>

</body>

</html>

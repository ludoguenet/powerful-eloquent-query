<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="mx-auto container mt-5">
        <div class="overflow-x-auto relative">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                       Date de l'évenement
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($schedules as $schedule)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $schedule->event_at->format('d/m/Y à H:i') }}
                            @dump($schedule->games)
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

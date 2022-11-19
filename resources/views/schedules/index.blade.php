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

                            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">
                                            Equipe 1
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Equipe 2
                                        </th>
                                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">
                                            Huis clos?
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Ville
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($schedule->games as $game)
                                            <tr>
                                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                    {{ $game->team_one }}
                                                </th>
                                                <td class="py-4 px-6">
                                                    {{ $game->team_two }}
                                                </td>
                                                <td class="py-4 px-6 bg-gray-50 dark:bg-gray-800">
                                                    {{ $game->stadium->doors_closed }}
                                                </td>
                                                <td class="py-4 px-6">
                                                   {{ $game->city->name }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

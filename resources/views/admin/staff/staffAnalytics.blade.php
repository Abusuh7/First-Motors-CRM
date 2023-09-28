<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Staff Analytics Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg p-4">
        <h1 class="text-2xl font-semibold mb-4">Leaderboard</h1>
        <table class="w-full">
            <thead>
                <tr>
                    <th class="text-left">Rank</th>
                    <th class="text-left">Name</th>
                    <th class="text-left">Score</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>500</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jane Smith</td>
                    <td>450</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Bob Johnson</td>
                    <td>400</td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>

</x-app-layout>

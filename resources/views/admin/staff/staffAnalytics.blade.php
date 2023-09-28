<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Staff Analytics Dashboard') }}
        </h2>
    </x-slot>




    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-8 mt-6 mx-3">

        <div class="flex flex-col items-center">
            <h1 class="text-center mb-4">Leaderboard</h1>
            <div class="w-full">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="bg-gray-800 text-white py-2 px-4"><i class="fa fa-trophy"></i> Rank</th>
                            <th class="bg-gray-800 text-white py-2 px-4"><i class="fa fa-user"></i> Name</th>
                            <th class="bg-gray-800 text-white py-2 px-4"><i class="fa fa-star"></i> Sales Commission
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

                        <tr class="bg-gray-300">
                            <td>1st</td>
                            <td>{{ $staffLeaderboard1->users->name }}</td>
                            <td>Rs {{ number_format($staffLeaderboard1->commission) }}</td>
                        </tr>

                        <tr class="bg-gray-400">
                            <td>2nd</td>
                            <td>{{ $staffLeaderboard2->users->name }}</td>
                            <td>Rs {{ number_format($staffLeaderboard2->commission) }}</td>
                        </tr>

                        <tr class="bg-gray-500">
                            <td>3rd</td>
                            <td>{{ $staffLeaderboard3->users->name }}</td>
                            <td>Rs {{ number_format($staffLeaderboard3->commission) }}</td>
                        </tr>

                        @if (!empty($staffLeaderboardAfter3))
                            @foreach ($staffLeaderboardAfter3 as $restOfTheStaffLeaderboard)
                                <tr class="bg-gray-200">
                                    <td>{{ $loop->iteration + 3 }}</td>
                                    <td>{{ $restOfTheStaffLeaderboard->users->name }}</td>
                                    <td>Rs {{ number_format($restOfTheStaffLeaderboard->commission) }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="bg-gray-100">
                                <td>4th</td>
                                <td></td>
                                <td></td>
                            </tr>

                        @endif
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            <canvas id="mybarChart"></canvas>
        </div>
    </div>


    <script>
        var ctx = document.getElementById('mybarChart').getContext('2d');

        const commission = @json($staffLeaderboardBar);
        const names = @json($staffLeaderboardBarName);

        var mybarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: names,
                datasets: [{
                    label: 'Sales',
                    data: commission,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1,
                    barThickness: 50
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>


</x-app-layout>

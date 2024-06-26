<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'IBM Plex Mono', sans-serif;
        }
    </style>
</head>
<body class="flex h-screen bg-[#E5E5E5]">
    <!-- sidebar -->
    @include('master.sidebar')
    <!-- Main content -->
    <div class="flex flex-col flex-1 overflow-y-auto ml-8 bg-[#E5E5E5]">
        <div class="p-4 mt-8">
            @auth
                <h1 class="text-4xl font-bold pb-8 text-[#000E9C]">Bonjour {{ auth()->user()->name }} 👋 !</h1>
            @endauth
        </div>
        <div class="grid grid-cols-1 gap-4 px-4 mt-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 sm:px-8">
        <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
    <div class="p-4 bg-[#ff6700]">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
            </path>
        </svg>
    </div>
    <div class="px-4 text-[#000E9C]">
        <h3 class="text-sm tracking-wider">Totale Client</h3>
        <p class="text-3xl">{{ $data['clientsCount'] }}</p>
    </div>
</div>
<div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
    <div class="p-4 bg-[#3a6ea5]">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2">
            </path>
        </svg>
    </div>
    <div class="px-4 text-[#000E9C]">
        <h3 class="text-sm tracking-wider">Totale Devis</h3>
        <p class="text-3xl">{{$data['devisCount']}}</p>
    </div>
</div>
<div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
    <div class="p-4 bg-[#04e762]">
        <svg class="h-12 w-12 text-white"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20"
            fill="currentColor">
            <path fill-rule="evenodd"
                d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                clip-rule="evenodd" />
            <path
                d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
        </svg>
    </div>
    <div class="px-4 text-[#000E9C]">
        <h3 class="text-sm tracking-wider">Totale Service</h3>
        <p class="text-3xl">{{ $data['servicesCount'] }}</p>
    </div>
</div>

    <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
        <div class="p-4 bg-[#f21b3f]"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4">
                </path>
            </svg></div>
        <div class="px-4 text-[#000E9C]">
            <h3 class="text-sm tracking-wider">Server Load</h3>
            <p class="text-3xl"></p>
        </div>
    </div>

</div>
<div class="mt-8 flex flex-wrap space-x-0 space-y-2 md:space-x-4 md:space-y-0">
    <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
        <h2 class="text-[#000E9C] text-lg font-semibold pb-1">Clients</h2>
        <div class="my-1"></div>
        <div class="bg-[#000E9C] h-px mb-6"></div>
        <div class="chart-container d-flex justify-content-center align-items-center mx-auto my-auto" style="position: relative; height:200px; width:200px">
    <canvas id="usersChart"></canvas>
</div>

    </div>
    <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
        <h2 class="text-[#000E9C] text-lg font-semibold pb-1">Services</h2>
        <div class="my-1"></div>
        <div class="bg-[#000E9C] h-px mb-6"></div>
        <div class="chart-container d-flex justify-content-center align-items-center mx-auto my-auto" style="position: relative; height:200px; width:200px">
            <canvas id="serviceChart"></canvas>
        </div>

    </div>
    <div class="flex-1 p-4 shadow rounded-lg md:w-1/2 bg-white">
                <h2 class="text-[#000E9C] text-lg font-semibold pb-1">Devis par Mois</h2>
                <div class="my-1"></div>
                <div class="bg-[#000E9C] h-px mb-6"></div>
                <div class="chart-container d-flex justify-content-center align-items-center" style="position: relative; height:200px; width:400px">
                    <canvas id="devisChart"></canvas>
                </div>
            </div>
</div>


</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var usersChartCanvas = document.getElementById('usersChart').getContext('2d');
        var serviceChartCanvas = document.getElementById('serviceChart').getContext('2d');

        var usersChart = new Chart(usersChartCanvas, {
            type: 'doughnut',
            data: {
                labels: ['Clients'],
                datasets: [{
                    label: 'Number of Clients',
                    data: [{{ $data['clientsCount'] }}],
                    backgroundColor: ['#f5b700'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Clients Distribution',
                        position: 'top'
                    },
                }
            }
        });

        var serviceChart = new Chart(serviceChartCanvas, {
            type: 'doughnut',
            data: {
                labels: ['Services'],
                datasets: [{
                    label: 'Number of Services',
                    data: [{{ $data['servicesCount'] }}],
                    backgroundColor: ['#008bf8'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Services Distribution',
                        position: 'top'
                    },
                }
            }
        });
    });
    document.addEventListener("DOMContentLoaded", function () {
            var devisChartCanvas = document.getElementById('devisChart').getContext('2d');

            var devisChart = new Chart(devisChartCanvas, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Nombre de Devis',
                        data: [12, 19, 3, 5, 2, 3, 15, 22, 30, 10, 5, 6], // Remplacez ces valeurs par vos données réelles
                        backgroundColor: '#000E9C',
                        borderColor: '#000E9C',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true
                        },
                        title: {
                            display: true,
                            text: 'Devis par Mois',
                            position: 'top'
                        },
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
</script>









 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

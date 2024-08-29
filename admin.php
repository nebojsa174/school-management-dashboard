<?php include './includes/header.php'; ?>

<div class="h-screen flex">
    <!-- MENU -->
    <?php include './includes/menu.php'; ?>

    <!-- NAVBAR -->
    <div class="w-[86%] md:w-[92%] lg:w-[84%] xl:w-[86%] bg-[#F7F8FA] flex flex-col">
        <?php include './includes/navbar.php'; ?>

        <div class="p-4 flex gap-4 flex-col md:flex-row">
            <!-- LEFT -->
            <div class="w-full lg:w-2/3 flex flex-col gap-8">
                <!-- USER CARDS -->
                <div class="flex gap-4 justify-between flex-wrap">
                    <!-- STUDENTS -->
                    <div class="rounded-2xl odd:bg-purple even:bg-yellow p-4 flex-1 min-w-[130px]">
                        <div class="flex justify-between items-center">
                            <span class="text-[10px] bg-white px-2 py-1 rounded-full text-green-600">
                                2024/25
                            </span>
                            <img src="./public/assets/more.png" alt="more" width="20" height="20">
                        </div>
                        <h1 class="text-2xl font-semibold my-4">1,234</h1>
                        <h2 class="capitalize text-sm font-medium text-gray-500">Students</h2>
                    </div>

                    <!-- TEACHERS -->
                    <div class="rounded-2xl odd:bg-purple even:bg-yellow p-4 flex-1 min-w-[130px]">
                        <div class="flex justify-between items-center">
                            <span class="text-[10px] bg-white px-2 py-1 rounded-full text-green-600">
                                2024/25
                            </span>
                            <img src="./public/assets/more.png" alt="more" width="20" height="20">
                        </div>
                        <h1 class="text-2xl font-semibold my-4">1,234</h1>
                        <h2 class="capitalize text-sm font-medium text-gray-500">Teachers</h2>
                    </div>

                    <!-- PARENTS -->
                    <div class="rounded-2xl odd:bg-purple even:bg-yellow p-4 flex-1 min-w-[130px]">
                        <div class="flex justify-between items-center">
                            <span class="text-[10px] bg-white px-2 py-1 rounded-full text-green-600">
                                2024/25
                            </span>
                            <img src="./public/assets/more.png" alt="more" width="20" height="20">
                        </div>
                        <h1 class="text-2xl font-semibold my-4">1,234</h1>
                        <h2 class="capitalize text-sm font-medium text-gray-500">Parents</h2>
                    </div>

                    <!-- STAFFS -->
                    <div class="rounded-2xl odd:bg-purple even:bg-yellow p-4 flex-1 min-w-[130px]">
                        <div class="flex justify-between items-center">
                            <span class="text-[10px] bg-white px-2 py-1 rounded-full text-green-600">
                                2024/25
                            </span>
                            <img src="./public/assets/more.png" alt="more" width="20" height="20">
                        </div>
                        <h1 class="text-2xl font-semibold my-4">1,234</h1>
                        <h2 class="capitalize text-sm font-medium text-gray-500">Staffs</h2>
                    </div>
                </div>
                <!-- MIDDLE CHARTS -->
                <div class="flex gap-4 flex-col lg:flex-row">
                    <!-- COUNT CHART -->
                    <div class="w-full lg:w-1/3 h-[450px]">
                        <div class="bg-white rounded-xl w-full h-full p-4">
                            <!-- TITLE -->
                            <div class="flex justify-between items-center">
                                <h1 class="text-lg font-semibold">Students</h1>
                                <img src="./public/assets/moreDark.png" alt="" width="20" height="20">
                            </div>
                            <!-- CHART -->
                            <div class="relative w-full h-[75%] flex items-center justify-center">
                                <canvas id="countChart" class="max-w-full max-h-full"></canvas>
                                <img
                                    src="./public/assets/maleFemale.png"
                                    alt=""
                                    width="50"
                                    height="50"
                                    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" />
                            </div>
                            <!-- BOTTOM -->
                            <div class="flex justify-center gap-16">
                                <div class="flex flex-col gap-1">
                                    <div class="w-5 h-5 bg-sky rounded-full"></div>
                                    <h1 class="font-bold">1,234</h1>
                                    <h2 class="text-xs text-gray-300">Boys (55%)</h2>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <div class="w-5 h-5 bg-yellow rounded-full"></div>
                                    <h1 class="font-bold">1,234</h1>
                                    <h2 class="text-xs text-gray-300">Girls (45%)</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ATTENDANCE CHART -->
                    <div class="w-full lg:w-2/3 h-[450px]">
                        <div class="bg-white rounded-lg p-4 h-full">
                            <div class="flex justify-between items-center">
                                <h1 class="text-lg font-semibold">Attendance</h1>
                                <img src="./public/assets/moreDark.png" alt="more" width="20" height="20">
                            </div>
                            <canvas id="attendanceChart" class="w-full h-[75%]"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/3 flex flex-col gap-8">
                R
            </div>
        </div>
    </div>
</div>
<script>
    // Ensure the DOM is fully loaded before running the script
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('countChart').getContext('2d');

        const data = {
            labels: ['Girls', 'Boys'],
            datasets: [{
                data: [53, 53],
                backgroundColor: ['#FAE27C', '#C3EBFA'],
                borderColor: ['#FAE27C', '#C3EBFA'],
                borderWidth: 1
            }],
        };

        const config = {
            type: 'doughnut',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                const dataset = tooltipItem.dataset;
                                const total = dataset.data.reduce((a, b) => a + b, 0);
                                const currentValue = dataset.data[tooltipItem.dataIndex];
                                const percentage = Math.round((currentValue / total) * 100);
                                return `${tooltipItem.label}: ${currentValue} (${percentage}%)`;
                            },
                        },
                        yAlign: 'bottom',
                    },
                    datalabels: {
                        display: true,
                        color: '#fff',
                        formatter: function(value) {
                            return `${value}`;
                        },
                        font: {
                            weight: 'bold'
                        }
                    }
                },
                cutout: '70%' // This makes the chart a donut chart
            }
        };

        new Chart(ctx, config);
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('attendanceChart').getContext('2d');

        const data = {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
            datasets: [
                {
                    label: 'Present',
                    data: [60, 70, 90, 90, 65],
                    backgroundColor: '#FAE27C',
                    borderColor: '#FAE27C',
                    borderWidth: 1,
                    borderRadius: 10,
                    barThickness: 20,
                },
                {
                    label: 'Absent',
                    data: [40, 60, 75, 75, 55],
                    backgroundColor: '#C3EBFA',
                    borderColor: '#C3EBFA',
                    borderWidth: 1,
                    borderRadius: 10,
                    barThickness: 20,
                }
            ]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                const datasetLabel = tooltipItem.dataset.label || '';
                                const value = tooltipItem.raw;
                                return `${datasetLabel}: ${value}`;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            color: '#d1d5db'
                        },
                        grid: {
                            display: false
                        },
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: '#d1d5db'
                        },
                        grid: {
                            color: '#ddd',
                            borderColor: '#ddd'
                        }
                    }
                }
            }
        };

        new Chart(ctx, config);
    });
</script>
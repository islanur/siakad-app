<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          {{-- Content --}}
          <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12" x-data="dashboardData()">
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
              <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
                <div class="flex items-center">
                  <div class="bg-blue-500 text-white p-3 rounded-full">
                    <i class="fas fa-user-graduate"></i>
                  </div>
                  <div class="ml-4 text-gray-600 dark:text-gray-400">
                    <h4 class="text-2xl font-semibold">{{ $studentsCount }}</h4>
                    <p class="text-sm">Mahasiswa</p>
                  </div>
                </div>
              </div>

              <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
                <div class="flex items-center">
                  <div class="bg-green-500 text-white p-3 rounded-full">
                    <i class="fas fa-chalkboard-teacher"></i>
                  </div>
                  <div class="ml-4 text-gray-600 dark:text-gray-400">
                    <h4 class="text-2xl font-semibold">{{ $lecturersCount }}</h4>
                    <p class="text-sm">Dosen</p>
                  </div>
                </div>
              </div>

              <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
                <div class="flex items-center">
                  <div class="bg-yellow-500 text-white p-3 rounded-full">
                    <i class="fas fa-book"></i>
                  </div>
                  <div class="ml-4 text-gray-600 dark:text-gray-400">
                    <h4 class="text-2xl font-semibold">{{ $coursesCount }}</h4>
                    <p class="text-sm">Mata Kuliah</p>
                  </div>
                </div>
              </div>

              <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
                <div class="flex items-center">
                  <div class="bg-red-500 text-white p-3 rounded-full">
                    <i class="fas fa-exchange-alt"></i>
                  </div>
                  <div class="ml-4 text-gray-600 dark:text-gray-400">
                    <h4 class="text-2xl font-semibold">{{ $enrollmentsCount }}</h4>
                    <p class="text-sm">Transaksi</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Charts -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
              <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Statistik Mahasiswa</h3>
                <canvas id="studentsChart" x-init="renderStudentsChart()"></canvas>
              </div>
              <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Statistik Pendaftaran</h3>
                <canvas id="enrollmentsChart" x-init="renderEnrollmentsChart()"></canvas>
              </div>
            </div>

            <!-- Recent Activities -->
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
              <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Aktivitas Terbaru</h3>
              <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($recentActivities as $activity)
                  <li class="py-4">
                    <div class="text-gray-600 dark:text-gray-400">
                      <span class="font-semibold">{{ $activity->student->user->name }}</span> mendaftar mata kuliah
                      <span class="font-semibold">{{ $activity->course->name }}</span>
                      <span class="text-sm text-gray-500">{{ $activity->created_at->diffForHumans() }}</span>
                    </div>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @push('scripts')
    <script>
      function dashboardData() {
        return {
          studentsChartData: {!! json_encode($studentsChartData) !!},
          studentsChartLabels: {!! json_encode($studentsChartLabels) !!},
          enrollmentsChartData: {!! json_encode($enrollmentsChartData) !!},
          enrollmentsChartLabels: {!! json_encode($enrollmentsChartLabels) !!},

          renderStudentsChart() {
            const ctx = document.getElementById('studentsChart').getContext('2d');
            new Chart(ctx, {
              type: 'bar',
              data: {
                labels: this.studentsChartLabels,
                datasets: [{
                  label: 'Jumlah Mahasiswa',
                  data: this.studentsChartData,
                  backgroundColor: 'rgba(54, 162, 235, 0.2)',
                  borderColor: 'rgba(54, 162, 235, 1)',
                  borderWidth: 1
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
          },

          renderEnrollmentsChart() {
            const ctx = document.getElementById('enrollmentsChart').getContext('2d');
            new Chart(ctx, {
              type: 'line',
              data: {
                labels: this.enrollmentsChartLabels,
                datasets: [{
                  label: 'Jumlah Pendaftaran',
                  data: this.enrollmentsChartData,
                  backgroundColor: 'rgba(255, 99, 132, 0.2)',
                  borderColor: 'rgba(255, 99, 132, 1)',
                  borderWidth: 1
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
          }
        }
      }
    </script>
  @endpush
</x-app-layout>

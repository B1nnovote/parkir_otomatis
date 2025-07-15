<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="{{ asset('assets/backend/style.css') }}">
	<title>Dashboard Petugas</title>

	<style>
		.box-info {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
			gap: 1rem;
			margin-top: 2rem;
			width:100%;
		}
	
		.box-info li {
			align-items: center;
			gap: 1rem;
			padding: 1rem;
			border-radius: 12px;
			width: 100%;
			box-shadow: 0 4px 8px rgba(0,0,0,0.05);
			color: white;
			
		}
	
		.box-info li i {
			font-size: 2.5rem;
			padding: 1rem;
			border-radius: 50%;
			min-width: 60px;
			text-align: center;
			background: rgba(255,255,255,0.2);
		}
	
		.box-info li .text h3 {
			margin: 0;
			font-size: 1.4rem;
		}
	
		.box-info li .text p {
			margin: 0;
			font-size: 0.9rem;
		}
	
		.bg-1 { background: #3b82f6; }     /* biru - kendaraan masuk */
		.bg-2 { background: #10b981; }     /* hijau - kendaraan keluar */
		.bg-3 { background: #f59e0b; }     /* kuning - data kendaraan */
		.bg-4 { background: #ef4444; }     /* merah - slot mobil */
		.bg-5 { background: #8b5cf6; }     /* ungu - slot motor */
	</style>
	
</head>
<body>

	<!-- SIDEBAR -->
	@include('layouts.part.sidebar')
	<!-- END SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		@include('layouts.part.navbar')
		<!-- END NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li><a href="#">Dashboard</a></li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li><a class="active" href="#">Petugas</a></li>
					</ul>
				</div>
			</div>

			<p style="font-size:25px;">Selamat datang, <strong>{{ Auth::user()->name }}</strong></p>


			<ul class="box-info">
				
				
				<li class="bg-1">
					<i class='bx bx-log-in-circle'></i>
					<span class="text">
						<h3>{{ $totalMasuk }}</h3>
						<p>Sedang Terparkir</p>
					</span>
				</li>
				<li class="bg-2">
					<i class='bx bx-log-out-circle'></i>
					<span class="text">
						<h3>{{ $totalKeluar }}</h3>
						<p>Kendaraan Keluar</p>
					</span>
				</li>
				<li class="bg-3">
					<i class='bx bx-spreadsheet'></i>
					<span class="text">
						<h3>{{ $totalKendaraan }}</h3>
						<p>Total Data Kendaraan</p>
					</span>
				</li>
			{{-- </ul>
				<ul class="box-info"> --}}
				<li class="bg-4">
					<i class='bx bx-car' style="color:black; background:#10b98193;"></i>
					<span class="text">
						<h3>{{ $sisaMobil }}</h3>
						<p>Sisa Slot Mobil</p>
					</span>
				</li>
				<li class="bg-5">
					<i class='bx bx-cycling' style="color:black; background:#8a5cf659;"></i>
					<span class="text">
						<h3>{{ $sisaMotor }}</h3>
						<p>Sisa Slot Motor</p>
					</span>
				</li>
			</ul>

			{{-- <div  style="margin-top: 3rem; width:60%; background: white; padding: 1.5rem;
			 border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.05);">
				<h2 style="margin-bottom: 1rem;">Grafik Kendaraan Masuk per Bulan</h2>
				<canvas id="grafikMasuk" height="100%"></canvas>
			</div> --}}
			<div style="
	margin-top: 3rem;
	background: white;
	padding: 1.5rem 2rem;
	border-radius: 12px;
	box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
	width: 60%;
	hight:150px;
	max-width: 1000px;
	margin-right: auto;">
	<h2 style="margin-bottom: 1rem; font-size: 1.25rem; color: #111;">Grafik Kendaraan Masuk per Bulan</h2>
	<canvas id="grafikMasuk"></canvas>
</div>

			

		</main>
		<!-- END MAIN -->
	</section>
	<!-- END CONTENT -->

	<script src="{{ asset('assets/backend/script.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script>
		const ctx = document.getElementById('grafikMasuk').getContext('2d');
		const gradient = ctx.createLinearGradient(0, 0, 0, 400);
		gradient.addColorStop(0, 'rgba(139, 92, 246, 0.5)'); // ungu muda
		gradient.addColorStop(1, 'rgba(139, 92, 246, 0.1)'); // ungu transparan
	
		const chart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: {!! json_encode($labels) !!},
				datasets: [{
					label: 'Jumlah Kendaraan Masuk',
					data: {!! json_encode($dataMasuk) !!},
					backgroundColor: gradient,
					borderColor: '#8b5cf6',
					fill: true,
					tension: 0.4,
					pointBackgroundColor: '#8b5cf6'
				}]
			},
			options: {
				responsive: true,
				scales: {
					y: {
						beginAtZero: true,
						grid: {
							color: '#f3f4f6'
						}
					},
					x: {
						grid: {
							color: '#f3f4f6'
						}
					}
				}
			}
		});
	</script>
	
</body>
</html>

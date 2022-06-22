<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>APTS</title>
		<link rel="stylesheet" href="{{asset('css/style.css')}}" />
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
			crossorigin="anonymous"
		/>
	</head>
	<body>
		<!-- nav  -->
		<section >
			<div class="d-flex justify-content-between mb-4 align-items-center navbar" style="position: fixed; width: 100%;">
				<div>
					<img src="{{asset('img/logo.png')}}" alt="" class="logo" srcset="" />
					<span class="logo-heading"
						>APTS</span
					>
				</div>
				<div>
					<a class="btn btn-success" href="{{ route('login')}}">Login</a>
					@if (Route::has('register'))
                            <a href="{{ route('register') }}" class= "btn btn-primary">Register</a>
                    @endif
				</div>
			</div>
		</section>

		<!-- welcome -->
		<section>
			<div
				class="d-flex text-center align-items-center mx-4 justify-content-around mb-5"
			>
				<img src="{{asset('img/trading.png')}}" class="welcome-img rounded" />
				<div class="d-flex align-items-center">
					<div>
						<h2>Welcome to <span class="text-success">APTS</span></h2>
						<p>
							Et voluptate esse accusantium accusamus natus reiciendis quidem
							voluptates similique aut.
						</p>
					</div>
				</div>
			</div>
		</section>

		<!-- about us -->
		<section>
			<div class="text-center mb-3"><h3>About Us</h3></div>
			<p class="text-center mx-4">
				Architecto nobis eos vel nam quidem vitae temporibus voluptates qui hic
				deserunt iusto omnis nam voluptas asperiores sequi tenetur dolores
				incidunt enim voluptatem magnam cumque fuga.
			</p>
			<div class="d-flex justify-content-between align-items-center mb-4 mx-4">
				<div>
					<img class="about-img" src="{{asset('img/about.jpg')}}" alt="" srcset="" />
				</div>
				<div class="mx-5 my-4">
					<h1>Farmers</h1>
					Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio
					perferendis, ad, ipsum nostrum repudiandae, expedita inventore sed
					cumque nihil dignissimos explicabo natus aliquam possimus beatae
					<br />
					<br />
					<h1>Vendor</h1>
					praesentium modi consequatur voluptate perspiciatis! Lorem ipsum dolor
					sit, amet consectetur adipisicing elit. Distinctio perferendis, ad,
					ipsum nostrum repudiandae, expedita inventore sed cumque nihil
					dignissimos explicabo natus aliquam possimus beatae praesentium modi
					<br/>
					<br/>
				</div>
			</div>
		</section>

		<!-- team -->
		<section>
			<div class="text-center mb-3"><h3>Our Team</h3></div>
			<p class="text-center mx-4">
				Architecto nobis eos vel nam quidem vitae temporibus voluptates qui hic
				deserunt iusto omnis nam voluptas asperiores sequi tenetur dolores
				incidunt enim voluptatem magnam cumque fuga.
			</p>

			<div class="text-center mb-3 contact-email">
				Contact Us Via : sujitshrestha665@gmail.com <br>
				Contact Us Via : 023-455402
			</div>
			<div class="d-flex justify-content-center mb-4">
				<div>
					<div class="card team-card mx-4">
						<img class="card-img-top" src="{{asset('img/ss.jpg')}}" alt="Card image" />
						<div class="card-body text-center">
							<h4 class="card-title">Sujit Shrestha</h4>
							<p class="card-text">
								Some example text some example text. John Doe is an architect
								and engineer
							</p>
						</div>
					</div>
				</div>
				<div>
					<div class="card team-card mx-4">
						<img class="card-img-top" src="{{asset('img/hria.jpg')}}" alt="Card image" />
						<div class="card-body text-center">
							<h4 class="card-title">Manish Pyakurel</h4>
							<p class="card-text">
								Some example text some example text. John Doe is an architect
								and engineer
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- footer -->
		<section>
			<div class="bg-dark footer d-flex align-items-center">
				<div class="px-5 text-light">
					&copy; Copyright <strong><span>HiraLand And Pyacural</span></strong>
				</div>
			</div>
		</section>
	</body>
	<script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
		crossorigin="anonymous"
	></script>
</html>

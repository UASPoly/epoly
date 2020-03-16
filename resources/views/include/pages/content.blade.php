

@include('include.pages.slide')

@include('include.pages.colleges')		
@include('include.pages.departments')		
@include('include.pages.programmes')	
@include('include.pages.procedure')
<br><br>
<!-- paralax section -->
		<div class="parallaxed">
			<div class="parallax-image" data-parallax-left="0.5" data-parallax-top="0.3" data-parallax-scroll-speed="0.5">
				<img src="img/parallax.png" alt="">
			</div>
			
			<div class="them-mask bg-color-1"></div>
			<div class="grid-row">
				<div class="grid-col-row clear-fix">
					<div class="grid-col grid-col-3 alt">
						<div class="counter-block">
							<i class="flaticon-hotel"></i>
							<div class="counter" data-count="{{count($departments)}}">0</div>
							<div class="counter-name">Departments</div>
						</div>
					</div>
					<div class="grid-col grid-col-3 alt">
						<div class="counter-block">
							<i class="flaticon-book1"></i>
							<div class="counter" data-count="{{count($programmes)}}">0</div>
							<div class="counter-name">Programmes</div>
						</div>							
					</div>
					<div class="grid-col grid-col-3 alt">
						<div class="counter-block">
							<i class="flaticon-college"></i>
							<div class="counter" data-count="{{count($colleges)}}">0</div>
							<div class="counter-name">Colleges</div>
						</div>
					</div>
					<div class="grid-col grid-col-3 alt">
						<div class="counter-block last">
							<i class="flaticon-calendar"></i>
							<div class="counter" data-count="3">0</div>
							<div class="counter-name">Events</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- / paralax section -->
		<br>
	
@include('include.pages.contact')
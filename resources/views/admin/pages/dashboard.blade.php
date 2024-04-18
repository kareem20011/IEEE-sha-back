@extends("admin.layouts.layout")
@section("admin_content")

<div class="content-header">
	<h1>Dashboard</h1>
	<p></p>
</div>

<div class="row">

	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4>Recent Events</h4>
			</div>
			<div class="card-body pb-4">
				@if(count($recentEvents) < 1)
				<p class="text-center p-5">No Event yet!</p>
				@else
					@foreach($recentEvents as $recentEvent)
						<div class="recent-message d-flex px-4 py-3">
							<div class="avatar avatar-lg">
							@if($recentEvent->hasMedia('images'))
								<img src="{{ $recentEvent->getFirstMediaUrl('images') }}" class="card-img-top" alt="...">
							@else
								<p>no images found</p>
							@endif
							</div>
							<div class="name ms-4">
								<h5 class="mb-1">{{ $recentEvent->title }}</h5>
								<h6 class="text-muted mb-0">
									@if (\Carbon\Carbon::parse($recentEvent->expiry_date)->isPast())
										<h6 class="text-danger h6">Event has expired!</h6>
									@else
										<h6 class="text-success h6">{{ $recentEvent->expiry_date }}</h6>
									@endif
								</h6>
							</div>
						</div>
					@endforeach
				@endif
				
				<div class="px-4">
					<a href="{{ route( 'admin.events.index' ) }}" class='btn btn-block btn-xl btn-primary font-bold mt-3'>Show All</a>
				</div>
			</div>
		</div>
	</div>


	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4>Recent Workshops</h4>
			</div>
			<div class="card-body pb-4">
				@if(count($recentWorkshops) < 1)
				<p class="text-center p-5">No Workshops yet!</p>
				@else
					@foreach($recentWorkshops as $recentWorkshop)
						<div class="recent-message d-flex px-4 py-3">
							<div class="avatar avatar-lg">
							@if($recentWorkshop->hasMedia('images'))
								<img src="{{ $recentWorkshop->getFirstMediaUrl('images') }}" class="card-img-top" alt="...">
							@else
								<p>no images found</p>
							@endif
							</div>
							<div class="name ms-4">
								<h5 class="mb-1">{{ $recentWorkshop->title }}</h5>
								<h6 class="text-secondary">{{ $recentWorkshop->category->title }}</h6>
							</div>
						</div>
					@endforeach
				@endif
				
				<div class="px-4">
					<a href="{{ route( 'admin.workshops.index' ) }}" class='btn btn-block btn-xl btn-primary font-bold mt-3'>Show All</a>
				</div>
			</div>
		</div>
	</div>


	</div>

	

@endsection
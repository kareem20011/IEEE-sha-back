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
				@foreach($recentEvents as $recentEvent)
					<div class="recent-message d-flex px-4 py-3">
						<div class="avatar avatar-lg">
						@if($recentEvent->hasMedia('images'))
							<img src="{{ $recentEvent->getFirstMediaUrl('images') }}" class="card-img-top" alt="...">
						@else
							<img src="{{ asset( 'temp/images/message/1.jpg' ) }}">
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
				
				<div class="px-4">
					<a href="{{ route( 'admin.events.index' ) }}" class='btn btn-block btn-xl btn-primary font-bold mt-3'>Show All</a>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4>Latest Transaction</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">Order Id</th>
								<th scope="col">Billing Name</th>
								<th scope="col">Date</th>
								<th scope="col">Total</th>
								<th scope="col">Payment Status</th>
								<th scope="col">Payment Method</th>
								<th scope="col">View Details</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">#SK2548 </th>
								<td>Neal Matthews</td>
								<td>07 Oct, 2022</td>
								<td>$400</td>
								<td><span class="text-success">Paid</span></td>
								<td>Mastercard</td>
								<td><button class="btn btn-primary">View Details</button></td>
							</tr>

							<tr>
								<th scope="row">#SK2548 </th>
								<td>Neal Matthews</td>
								<td>07 Oct, 2022</td>
								<td>$400</td>
								<td><span class="text-success">Paid</span></td>
								<td>Visa</td>
								<td><button class="btn btn-primary">View Details</button></td>
							</tr>

							<tr>
								<th scope="row">#SK2548 </th>
								<td>Neal Matthews</td>
								<td>07 Oct, 2022</td>
								<td>$400</td>
								<td><span class="text-danger">Chargeback</span></td>
								<td>Paypal</td>
								<td><button class="btn btn-primary">View Details</button></td>
							</tr>

							<tr>
								<th scope="row">#SK2548 </th>
								<td>Neal Matthews</td>
								<td>07 Oct, 2022</td>
								<td>$400</td>
								<td><span class="text-warning">Refund</span></td>
								<td>Visa</td>
								<td><button class="btn btn-primary">View Details</button></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

</div>

	

@endsection
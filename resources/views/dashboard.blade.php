@extends('master')
@section('title', 'Dashboard')
@section('content')
<div class="container">
<div class="row banner">
<div class="col-md-12">
<h1 class="text-center margin-top-100 editContent">Learning Laravel 5</h1>
<div class="text-center">
<!-- <img src="http://learninglaravel.net/img/LearningLaravel5_cover0.png" width="302" height="391" alt=""> -->
@if($tickets->isEmpty())
You have no ticket.
@else
<h3>Your Tickets</h3>
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Title</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		@foreach($tickets as $ticket)
			<tr>
			    <td>{!! $ticket->id !!}</td>
			    <td><a href="{!! action('TicketsController@show', $ticket->slug) !!}">{!! $ticket->title !!}</a></td>
			    <td>{!! $ticket->status ? 'Pending' : 'Answered' !!}</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endif
</div>
</div>
</div>
</div>
@endsection
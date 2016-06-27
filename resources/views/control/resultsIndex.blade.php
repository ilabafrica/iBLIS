@extends("app")
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{!! URL::route('user.home')!!}}">{!! trans('menu.home') !!}</a></li>
	  <li class="active">{!!trans('menu.controlresults')!!}</li>
	</ol>
</div>
@if (Session::has('message'))
	<div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif
<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-adjust"></span>
		{!! trans('terms.list-controls') !!}
	</div>
	<div class="panel-body">
		<table class="table table-striped table-hover table-condensed search-table">
			<thead>
				<tr>
					<th>{!! trans_choice('terms.name', 1) !!}</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			@foreach($controls as $control)
					<td>{!! $control->name !!}</td>
					<td>
						<a class="btn btn-sm btn-info" href="{!! URL::to("controlresults/" . $control->id . "/resultsEntry") !!}" >
							<span class="glyphicon glyphicon-edit"></span>
							{!! trans('action.enter-results') !!}
						</a>
						<a class="btn btn-sm btn-success" href="{!! URL::to("controlresults/" . $control->id . "/resultsList") !!}">
							<span class="glyphicon glyphicon-eye-open"></span>
							{!!trans('action.view')!!}
						</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		{!! Session::put('SOURCE_URL', URL::full()) !!}
	</div>
</div>
@stop
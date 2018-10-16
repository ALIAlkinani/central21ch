<aside class="photofromlastyear">

		<h2>Poets</h2>
		<p>A poet is a person who creates poetry. Poets may describe themselves as such or be described as such by others. A poet may simply be a writer of poetry, or may perform their art to an audience.</p>
		<div class="modalphotos photogrid clearfix">
				@foreach ($poems as $poem)
				<a href="/poets/{{ $poem->arthur->id}}"><img class="img-thumbnail mr-1"  width="110"
					height="120"
					data-toggle="tooltip" data-original-title="{{ $poem->arthur->first_name }} {{ $poem->arthur->last_name }}" src="{{ $poem->arthur->avatar_path }}" alt="{{ $poem->arthur->first_name }} {{ $poem->arthur->last_name }}"></a>
				@endforeach
		</div>
		<a href="/poets" class="btn btn-primary"> All Poets</a>
		
	</aside>






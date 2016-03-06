<div class="container-fluid">
	
	<div class="team-wrapper">	

		<div class="row">
		@foreach ($members as $index => $member)
			@if($index != 0 && $index % 3 == 0)
				</div>
				<div class="row">
				@include('partials.member')
			@else
				@include('partials.member')
			@endif
			
		@endforeach
		</div>
		
		<div class="row">
			<div class="col-sm-12"><div class="bottom-padder"></div></div>
		</div>
	</div>
</div>
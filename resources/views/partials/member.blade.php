<div class="col-sm-12 col-md-4 member-wrapper">
	<div class="row">
		<div class="col-xs-4">
			<div class="member-thumbnail" style="background-image: url('{{ $member->image }}')">
			</div>
		</div>
		<div class="col-xs-8">
			<strong><p>{{ $member->name }}</p></strong>
			<p>{{ $member->function }}</p>
			<a data-popup-open="popup-{{ $index }}" href="#">CV</a>
			
			<div class="popup" data-popup="popup-{{ $index }}">
				<div class="popup-inner">
					<div class="row">
						<div class="col-sm-4">
							<div class="member-image">
								<img src="{{ $member->image }}" alt="">
							</div>
						</div>
						<div class="col-sm-8">
							<div class="bio-container">
								<p><strong>{{ $member->name }}</strong></p>
								@foreach ($member->experiences as $experience)
								@if($experience->end == 'Since')
								<p>{{ $experience->end.' '.$experience->start.' - '.$experience->function.' - '.$experience->institution }}</p>
								@else
								<p>{{ $experience->start.' - '.$experience->end.' - '.$experience->function.' - '.$experience->institution }}</p>
								@endif
								@endforeach
								
							</div>
						</div>
					</div>
					<a class="popup-close" data-popup-close="popup-{{ $index }}" href="#">x</a>
				</div>
			</div>

		</div>
	</div>
</div>
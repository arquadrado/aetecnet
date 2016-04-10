<div class="project-wrapper">
	@foreach($projects as $project)
	<div class="grid-item">
		<div class="rect1" style="background-image: url('{{ $url.$project->cover_path }}');">
			<div class="image-filter">
				<a class="link" href="{{ route('projects_page', [$current_company, $project->id]) }}"></a>
				<p class="project-name">{{ $project->name }}</p>
			</div>
		</div>
	</div>
	@endforeach
</div>

	
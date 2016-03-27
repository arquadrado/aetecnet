<div class="project-wrapper">
	@foreach($stepaetecProjects as $project)
	<div class="grid-item">
		<div class="rect1" style="background-image: url('{{ $url.$project->cover_path }}');">
			<a class="link" href="{{ route('projects_page', [$company['slug'], $project->id]) }}"></a>
			<div class="image-filter">
				<p class="project-name">{{ $project->name }}</p>
			</div>
		</div>
	</div>
	@endforeach
</div>

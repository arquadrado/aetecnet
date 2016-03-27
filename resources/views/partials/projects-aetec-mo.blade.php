<div class="project-wrapper">
	@foreach($aetecProjects as $project)
	<div class="grid-item">
		<a href="{{ route('projects_page', [$company['slug'], $project->id]) }}">
			<div class="rect1" style="background-image: url('{{ $url.$project->cover_path }}');"></div>
		</a>
	</div>
	@endforeach
</div>

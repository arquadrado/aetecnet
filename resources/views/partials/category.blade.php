<div class="project-wrapper">
	@foreach($category->projects as $project)
	<div class="grid-item">
		<div class="rect1" style="background-image: url('{{ $url.$project->cover_path }}');">
			<a class="link" href="{{ route('projects_page', [$current_company, $project->id]) }}"></a>
		</div>
	</div>
	@endforeach
</div>

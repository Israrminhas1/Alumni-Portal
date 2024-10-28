@auth
	@role('Trainee')
	<li class="nav-item">
		<a class="nav-link " href="{{ route('templates') }}">
			Create Resume
		</a>
	</li>
	@endrole
@else
	<li class="nav-item">
		<a class="nav-link " href="{{ route('templates') }}">
			Create Resume
		</a>
	</li>
@endauth
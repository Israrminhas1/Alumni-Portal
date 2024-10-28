@role('Trainee')
<li class="nav-item {{ (request()->is('resume*')) ? 'active' : '' }}">
	<a class="nav-link" href="{{ route('resume.index') }}">
		<i class="far fa-file-alt"></i>
		<span>My Resumes</span></a>
</li>

<li class="nav-item {{ (request()->is('alltemplates*')) ? 'active' : '' }}">
	<a class="nav-link" href="{{ url('alltemplates')}}">
		<i class="far fa-window-maximize"></i>
		<span>Templates</span></a>
</li>
@endrole

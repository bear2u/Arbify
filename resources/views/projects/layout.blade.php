@extends('layout')

@section('content')
    <div class="container">
        <div class="mb-3 d-flex align-items-center">
            <h2 class="mr-auto">{{ $project->name }}</h2>
            <div class="btn-group mr-2">
                @can('update', $project)
                    <a href="{{ route('projects.edit', $project) }}" class="btn btn-outline-secondary">Edit</a>
                @endcan
            </div>
            <a href="{{ route('projects.export', $project) }}" class="btn btn-outline-primary">Export</a>
        </div>
        <ul class="nav nav-tabs mb-4">
            <li class="nav-item">
                <a href="{{ route('projects.show', $project) }}"
                   class="nav-link @if(request()->route()->getName() == 'projects.show') active @endif">Overview</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('messages.index', $project) }}"
                   class="nav-link @if(request()->route()->getName() == 'messages.index') active @endif"><b>Messages</b></a>
            </li>
            <li class="nav-item">
                <a href="{{ route('project-languages.index', $project) }}"
                   class="nav-link @if(request()->route()->getName() == 'project-languages.index') active @endif">Languages</a>
            </li>
            @can('view-any', [App\Models\ProjectMember::class, $project])
                <li class="nav-item">
                    <a href="{{ route('project-members.index', $project) }}"
                       class="nav-link @if(request()->route()->getName() == 'project-members.index') active @endif">Members</a>
                </li>
            @endcan
        </ul>
    </div>

    @yield('project-content')
@endsection

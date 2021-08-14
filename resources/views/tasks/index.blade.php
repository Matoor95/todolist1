@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des tâches
                  <a href="{{ route('tasks.create') }}" role="button" class="btn btn-primary btn-sm float-right">Créer une tâche</a>
                </div>
                <div class="card-body">
                    <table class="table table-borderless table-striped table-hover table-sm bg-light">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Titre</th>
                          <th>Etat</th>
                          <th></th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($tasks as $task)
                          <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->title }}</td>
                            <td>@if($task->state) Accomplie @else A faire @endif</td>
                            <td><a href="{{ route('tasks.show', $task->id) }}" role="button" class="btn btn-primary btn-sm">Voir</a></td>
                            <td><a href="{{ route('tasks.edit', $task->id) }}" role="button" class="btn btn-warning btn-sm">Modifier</a></td>
                            <td><a role="button" class="btn btn-danger btn-sm"
                                onclick="event.preventDefault(); document.getElementById('destroy{{ $task->id }}').submit();">
                                Supprimer</a>
                            </td>
                            <form id="destroy{{ $task->id }}" action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

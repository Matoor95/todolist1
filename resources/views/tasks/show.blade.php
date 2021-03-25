@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Fiche d'une tâche</div>
                <div class="card-body">
                    <h4>Titre</h4>
                    <p>{{ $task->title }}</p>
                    <h4>Détail</h4>
                    <p>{{ $task->detail }}</p>
                    <h4>Etat</h4>
                    <p>
                      @if($task->state)
                        La tâche a été accomplie !
                      @else
                        La tâche n'a pas encore été accomplie.
                      @endif
                    </p>
                    <h4>Date de création</h4>
                    <p>{{ $task->created_at->format('d/m/Y') }}</p>
                    @if($task->created_at != $task->updated_at)
                      <h4>Dernière mise à jour</h4>
                      <p>{{ $task->updated_at->format('d/m/Y') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

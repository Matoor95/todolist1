@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modification d'une tâche</div>
                <div class="card-body">
                    <form action="{{ route('tasks.update', $task->id) }}" method="post">
                        @csrf
                        @method('put')
                        @if (session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="title">Titre</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Titre de la tâche" value="{{ old('title', $task->title) }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Détail</label>
                            <textarea class="form-control @error('detail') is-invalid @enderror" id="detail" name="detail" placeholder="Détail de la tâche">{{ old('detail', $task->detail) }}</textarea>
                            @error('detail')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="state" name="state" @if(old('state', $task->state)) checked @endif>
                            <label class="form-check-label" for="state">
                              Tâche accomplie
                            </label>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

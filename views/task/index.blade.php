@extends('layouts.app')

@section('template_title')
Task
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Task') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-sm float-right"
                                data-placement="left">
                                {{ __('Create New') }}
                            </a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Sprints Id</th>
                                    <th>Description</th>
                                    <th>Developer</th>
                                    <th>Estado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $task->sprint->numero_sprint }}</td>
                                    <td>{{ $task->description }}</td>
                                    <td>{{ $task->developer->nombre_developer }}</td>
                                    <td>{{ $task->estado }}</td>
                                    <td>
                                        <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('tasks.show',$task->id) }}"><i
                                                    class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('tasks.edit',$task->id) }}"><i
                                                    class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $tasks->links() !!}
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('template_title')
    Sprint
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Sprint') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('sprints.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Numero Sprint</th>
										<th>Fecha Inicio</th>
										<th>Fecha Fin</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sprints as $sprint)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $sprint->numero_sprint }}</td>
											<td>{{ $sprint->fecha_inicio }}</td>
											<td>{{ $sprint->fecha_fin }}</td>

                                            <td>
                                                <form action="{{ route('sprints.destroy',$sprint->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('sprints.show',$sprint->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('sprints.edit',$sprint->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $sprints->links() !!}
            </div>
        </div>
    </div>
@endsection

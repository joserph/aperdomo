@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Control de Ventas</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('create-blog')
                                <a class="btn btn-info" href="{{ route('controls.create') }}"><i class="fas fa-plus-circle"></i> Crear</a>
                            @endcan
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($controls as $item)
                                            <tr>
                                                <th scope="row">{{ $item->name }}</th>
                                                
                                                <td>
                                                    @can('edit-blog')
                                                        <a class="btn btn-warning" href="{{ route('controls.edit', $item->id) }}"><i class="far fa-edit"></i></a>
                                                    @endcan
                                                    @can('delete-blog')
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['controls.destroy', $item->id], 'style' => 'display:inline']) !!}
                                                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => 'return confirm("¿Seguro de eliminar?")']) !!}
                                                        {!! Form::close() !!}
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    
                                    </tbody>
                                </table>
                            </div>
                            <div class="pagination justify-content-end">
                                {{ $controls->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


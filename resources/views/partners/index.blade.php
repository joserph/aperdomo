@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Partners</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('create-blog')
                                <a class="btn btn-info" href="{{ route('partners.create') }}"><i class="fas fa-plus-circle"></i> Crear</a>
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
                                        @foreach ($partners as $item)
                                            <tr>
                                                <th scope="row">{{ $item->name }}</th>
                                                
                                                <td>
                                                    @can('edit-blog')
                                                        <a class="btn btn-warning" href="{{ route('partners.edit', $item->id) }}"><i class="far fa-edit"></i></a>
                                                    @endcan
                                                    @can('delete-blog')
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['partners.destroy', $item->id], 'style' => 'display:inline']) !!}
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
                                {{ $partners->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


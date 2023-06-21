@extends('admin.layouts.layout')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-4 mt-2 mb-4">
                    <a href="{{route('admin.user.create')}}" class="btn btn-primary btn-lg " tabindex="-1" role="button"
                       aria-disabled="true">
                        Добавить пользователя
                    </a>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>

                                <tr>
                                    <th>ID</th>
                                    <th>Имя</th>
                                    <th>Email</th>
                                    <th>Админ</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->is_admin}}</td>
                                        <td>
                                            <form action="{{route('admin.user.delete', $user->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-transparent">
                                                    <a class="text-danger" role="button"><h6>Удалить</h6></a>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- /.card-body -->
                    </div>

                    <a class="btn btn-primary m-lg-3" href="{{ URL::to('/admin') }}">Вернуться на главную</a>
                    <!-- /.card -->
                </div>
                <div class="pagination">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

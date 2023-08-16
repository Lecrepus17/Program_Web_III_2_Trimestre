@extends('includes.layout')

@section('content')
    <div class="user-list">
        <h2>Lista de Usuários</h2>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Admin</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->admin ? 'Sim' : 'Não' }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}">Editar</a>
                            <a href="{{ route('users.delete', $user->id) }}">Excluir</a>
                            @if (!$user->admin)
                                <a href="{{ route('users.promote', $user->id) }}">Promover</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

<x-app-layout>
    <div 

        class="app-content">

        <header class="entry-header flex items-center">
            <h1 class="app-title">Vai trò</h1>
            <a href="{{ route('roles.create') }}" 
                    class="inline-block rounded border py-1 px-2 mx-2 
                        text-sm text-indigo-600 border-indigo-600 hover:text-indigo-100 hover:bg-indigo-600 hover:border-indigo-600">Add role</a>
            
        </header>

        <div class="entry-content">

            <div class="my-4">
                Manage your roles here.
            </div>
            

            @include('layouts.partials.messages')


            <div class="my-4 py-4 px-8 bg-white rounded shadow">
                <p class="my-4"> Danh sách vai trò:</p>

                <table class="table w-full my-4 text-left">
                    <thead  class="bg-slate-200 text-slate-800">
                        <tr>
                            <th class="p-4">#</th>
                            <th class="p-4">Tên</th>
                            <th class="p-4">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $key => $role)
                        <tr>
                            <td class="p-4">{{ $role->id }}</td>
                            <td class="p-4">{{ $role->name }}</td>

                            @if ($role->name != "Super-Admin")
                            <td class="p-4">
                                <a class="btn btn-info btn-sm" href="{{ route('roles.show', $role->id) }}">Chi tiết</a>
                                <a class="btn btn-primary btn-sm" href="{{ route('roles.edit', $role->id) }}">Sửa</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Xóa', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            </td>
                            @endif

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex">
                {!! $roles->links() !!}
            </div>

        </div>
    </div>

</x-app-layout>
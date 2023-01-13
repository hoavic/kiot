<x-app-layout>
    <div class="app-content">

        <header class="entry-header flex items-center">
            <h1 class="app-title">Loại tài khoản: {{ ucfirst($role->name) }}</h1>
            <a href="{{ route('roles.create') }}" 
                    class="inline-block rounded border py-1 px-2 mx-2 
                        text-sm text-indigo-600 border-indigo-600 hover:text-indigo-100 hover:bg-indigo-600 hover:border-indigo-600">Thêm loại tài khoản</a>
            
        </header>

        <div class="entry-content">

            <div class="my-4">
                <h3>Được cấp phép các quyền sau:</h3>
            </div>
            
            <div class=" my-4 py-4 px-8">
                @include('layouts.partials.messages')
            </div>

            <div class="my-4 py-4 px-8 bg-white rounded shadow">
                
                <table class="table w-96 my-4 text-left">
                    <thead class="bg-slate-200 text-slate-800">
                        <th class="p-4">Tên</th>
                        <th class="p-4">Guard</th> 
                    </thead>
    
                    @foreach($rolePermissions as $permission)
                        <tr>
                            <td class="p-4">{{ $permission->name }}</td>
                            <td class="p-4">{{ $permission->guard_name }}</td>
                        </tr>
                    @endforeach
                </table>

            </div>

            <div class="mt-4">
                <a href="{{ route('roles.edit', $role->id) }}" class="inline-block rounded border py-1 px-2 mx-2 
                    text-sm text-indigo-600 border-indigo-600 hover:text-indigo-100 hover:bg-indigo-600 hover:border-indigo-600">Sửa</a>
                <a href="{{ route('roles.index') }}" class="btn btn-default"><< Trở về</a>
            </div>

        </div>
    </div>

</x-app-layout>
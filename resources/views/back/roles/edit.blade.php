<x-app-layout>
    <div class="app-content">

        <header class="entry-header flex items-center">
            <h1 class="app-title">Chỉnh sửa loại tài khoản</h1>
            <a href="{{ route('roles.create') }}" 
                    class="inline-block rounded border py-1 px-2 mx-2 
                        text-sm text-indigo-600 border-indigo-600 hover:text-indigo-100 hover:bg-indigo-600 hover:border-indigo-600">Thêm loại tài khoản</a>
            
        </header>

        <div class="entry-content">

            <div class="my-4">
                <h3>Chỉnh sửa loại tài khoản và quản lý quyền được cấp.</h3>
            </div>
            
            <div class=" my-4 py-4 px-8">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Ôi!</strong> Thông tin bạn nhập vào không hợp lệ.<br><br>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="w-96 my-4 py-4 px-8 bg-white rounded shadow">
                
                <form method="POST" action="{{ route('roles.update', $role->id) }}">
                    @method('patch')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên</label>
                        <input value="{{ $role->name }}" 
                            type="text" 
                            class="form-control" 
                            name="name" 
                            placeholder="Name" required>
                    </div>
                    
                    <label for="permissions" class="form-label">Quyền được cấp</label>
    
                    <table class="table my-4 text-left">
                        <thead class="bg-slate-200 text-slate-800">
                            <th class="p-4"><input type="checkbox" name="all_permission"></th>
                            <th class="p-4">Tên</th>
                            <th class="p-4">Guard</th> 
                        </thead>
                        <tbody>
                            @foreach($permissions as $permission)
                                <tr>
                                    <td class="p-4">
                                        <input type="checkbox" 
                                        name="permission[{{ $permission->name }}]"
                                        value="{{ $permission->name }}"
                                        class='permission'
                                        {{ in_array($permission->name, $rolePermissions) 
                                            ? 'checked'
                                            : '' }}>
                                    </td>
                                    <td class="p-4">{{ $permission->name }}</td>
                                    <td class="p-4">{{ $permission->guard_name }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
    
                    <button type="submit" class="inline-block rounded border py-1 px-2 mx-2 
                    text-sm text-indigo-600 border-indigo-600 hover:text-indigo-100 hover:bg-indigo-600 hover:border-indigo-600">Lưu thay đổi</button>
                    <a href="{{ route('roles.index') }}" class="btn btn-default"><< Trở về</a>
                </form>

            </div>

            <script type="text/javascript">
                $(document).ready(function() {
                    $('[name="all_permission"]').on('click', function() {
        
                        if($(this).is(':checked')) {
                            $.each($('.permission'), function() {
                                $(this).prop('checked',true);
                            });
                        } else {
                            $.each($('.permission'), function() {
                                $(this).prop('checked',false);
                            });
                        }
                        
                    });
                });
            </script>

        </div>
    </div>

</x-app-layout>
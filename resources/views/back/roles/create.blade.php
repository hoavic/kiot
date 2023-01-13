<x-app-layout>
    <div 

        class="app-content">

        <header class="entry-header flex items-center">
            <h1 class="app-title">Thêm loại tài khoản</h1>
            <a href="{{ route('roles.create') }}" 
                    class="inline-block rounded border py-1 px-2 mx-2 
                        text-sm text-indigo-600 border-indigo-600 hover:text-indigo-100 hover:bg-indigo-600 hover:border-indigo-600">Add role</a>
            
        </header>

        <div class="entry-content">

            <div class="my-4">
                Thêm loại tài khoản và cấp quyền.
            </div>
            

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


            <div class="my-4 py-4 px-8 bg-white rounded shadow">

                <form method="POST" action="{{ route('roles.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên</label>
                        <input value="{{ old('name') }}" 
                            type="text" 
                            class="form-control" 
                            name="name" 
                            placeholder="Name" required>
                    </div>
                    
                    <label for="permissions" class="form-label">Cấp quyền</label>
    
                    <table class="table table-striped">
                        <thead>
                            <th scope="col" width="1%"><input type="checkbox" name="all_permission"></th>
                            <th scope="col" width="20%">Tên</th>
                            <th scope="col" width="1%">Guard</th> 
                        </thead>
    
                        @foreach($permissions as $permission)
                            <tr>
                                <td>
                                    <input type="checkbox" 
                                    name="permission[{{ $permission->name }}]"
                                    value="{{ $permission->name }}"
                                    class='permission'>
                                </td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>
                            </tr>
                        @endforeach
                    </table>
    
                    <button type="submit" class="btn btn-primary">Lưu tài khoản</button>
                    {{-- <a href="{{ route('users.index') }}" class="btn btn-default"><< Trở về</a> --}}
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

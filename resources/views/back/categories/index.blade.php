<x-app-layout>
    <div 
        x-data="{ open: false, toggle() { this.open = ! this.open } }"
        class="app-content">
        <header class="entry-header flex items-center">
            <h1 class="app-title">Danh mục sản phẩm</h1>
            <button @click="toggle()" class="inline-block rounded border py-1 px-2 mx-2 
                            text-sm text-indigo-600 border-indigo-600 hover:text-indigo-100 hover:bg-indigo-600 hover:border-indigo-600">Thêm Mới</button>
        </header>
        <div class="entry-content">
            @if ($errors->any())
                <div class="m-4 p-4  rounded
                        border bg-rose-300 text-rose-900 border-rose-900 text-center">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div x-show="open" class="add-category fixed w-96 m-4 p-4 bg-white rounded">
                <form method="POST" action="{{ route('categories.store') }}">
                    @csrf
                    <div class="form-line form-line-mask">
                        <label for="name">Tên danh mục</label>
                        <input type="text" name="name" id="name"  />
                    </div>
                    <div class="form-line form-line-mask">
                        <label for="slug">Đường dẫn</label>
                        <input type="text" name="slug" id="slug"  />
                    </div>
                    <div class="form-line form-line-gap">
                        <label for="description">Mô tả danh mục:</label>
                        <textarea type="text" name="description" id="description" class="rounded"></textarea>
                    </div>
                    <div class="form-line form-line-mask">
                        <label for="parent_id">Danh mục cha</label>
                        <select name="parent_id" id="parent_id" >
                            <option value="0">Không</option>
                            <option value="1">Danh mục cha 1</option>
                            <option value="1">Danh mục cha 2</option>
                            <option value="1">Danh mục cha 3</option>
                        </select>
                    </div>
{{--                     <div class="form-line form-line-gap">
                        <label for="featured_id">Ảnh đại diện:</label>
                        <input type="file" name="featured_id" id="featured_id"/>
                    </div> --}}
                    <button type="submit" class="block py-2 px-4 rounded bg-indigo-800 text-indigo-100">Thêm</button>
                </form>
            </div>

            <div class="list-catagories my-8 p-4 h-96 bg-white rounded">
                <h2 class="font-bold">Table title</h2>
                <table class="table w-full my-4 text-left">
                    <thead class="bg-slate-200 text-slate-800">
                        <tr>
                            <th class="p-4"><label class="hidden" for="cb-select-all-1"></label><input  type="checkbox" id="cb-select-all-1"></th>
                            <th class="p-4">Tên danh mục</th>
                            <th class="p-4">Đường dẫn</th>
                            <th class="p-4">Danh mục cha</th>
                            <th class="p-4">Lượt</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-100">
                            <td class="p-4"><label class="hidden" for="cb-select-1"></label><input  type="checkbox" name="delete_tags[]" value="1" id="cb-select-1"></td>
                            <td class="p-4">Lạp xưởng</td>
                            <td class="p-4">lap-xuong</td>
                            <td class="p-4"></td>
                            <td class="p-4">123</td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="p-4"><label class="hidden" for="cb-select-2"></label><input  type="checkbox" name="delete_tags[]" value="2" id="cb-select-2"></td>
                            <td class="p-4">-- Lạp xưởng khô</td>
                            <td class="p-4">lap-xuong-kho</td>
                            <td class="p-4">Lạp xưởng</td>
                            <td class="p-4">32</td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="p-4"><label class="hidden" for="cb-select-3"></label><input  type="checkbox" name="delete_tags[]" value="3" id="cb-select-3"></td>
                            <td class="p-4">Nguyên liệu</td>
                            <td class="p-4">nguyen-lieu</td>
                            <td class="p-4"></td>
                            <td class="p-4">3</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
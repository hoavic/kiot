<x-app-layout>
    <div 

        class="app-content">
        <header class="entry-header flex items-center">
            <h1 class="app-title">Sản phẩm</h1>
            <a href="{{ route('products.create') }}" class="inline-block rounded border py-1 px-2 mx-2 
                            text-sm text-indigo-600 border-indigo-600 hover:text-indigo-100 hover:bg-indigo-600 hover:border-indigo-600">Thêm Mới</a>
        </header>
        <div class="entry-content">
            @if ($errors->any())
                <div class="m-4 p-4 rounded
                        border bg-rose-300 text-rose-900 border-rose-900 text-center">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div 
                x-show="open" 
                @click.outside="open = ! open"
                class="popup-box">

                <div class="add-category w-96 m-4 p-8 bg-white rounded border border-gray-300 drop-shadow-2xl">
                    <h2 class="font-bold font-xl">Thêm sản phẩm</h2>
                    <form method="POST" action="{{ route('categories.store') }}">
                        @csrf
                        <div class="form-line form-line-mask">
                            <label for="name">Tên sản phẩm</label>
                            <input x-model="name" type="text" name="name" id="name" required />
                        </div>
                        <div class="form-line form-line-mask">
                            <label for="slug">Đường dẫn</label>
                            <input x-slug="name" type="text" name="slug" id="slug"  />
                        </div>
                        <div class="form-line form-line-mask">
                            <label for="parent_id">Danh mục</label>
                            <select name="parent_id" id="parent_id" >
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="number" class="hidden" name="level" id="level"/>
                        <div class="form-break">
                            <label for="description">Mô tả sản phẩm:</label>
                            <textarea type="text" name="description" id="description" class="w-full rounded"></textarea>
                        </div>
                        <div class="form-break">
                            <label for="featured_id">Ảnh đại diện:</label>
                            <input type="file" name="featured_id" id="featured_id"/>
                        </div>
                        <button type="submit" class="block mt-4 py-2 px-4 w-full rounded bg-indigo-800 text-indigo-100">Thêm</button>
                    </form>
                </div>
                
            </div>

            <div class="list-catagories my-8 p-4 min-h-96 bg-white rounded">
                <h2 class="font-bold">Table title</h2>
                <table class="table w-full my-4 text-left">
                    <thead class="bg-slate-200 text-slate-800">
                        <tr>
                            <th class="p-4"><label class="hidden" for="cb-select-all-1"></label><input  type="checkbox" id="cb-select-all-1"></th>
                            <th class="p-4">Tên sản phẩm</th>
                            <th class="p-4">Đường dẫn</th>
                            <th class="p-4">Danh mục</th>
                            <th class="p-4">Thương hiệu</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="border-b border-gray-100">
                                <td class="p-4"><label class="hidden" for="cb-select-3"></label><input  type="checkbox" name="delete_tags[]" value="3" id="cb-select-3"></td>
                                <td class="p-4">{{ $product->name }}</td>
                                <td class="p-4">{{ $product->slug }}</td>
                                <td class="p-4">{{ $product->category_id }}</td>
                                <td class="p-4">{{ $product->level }}</td>
                                <td class="p-4">
                                    <button class="p-1 rounded bg-slate-100 text-slate-500 hover:bg-sky-600 hover:text-sky-100">
                                        <svg width="30" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path fill="currentColor" d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM432 256c0 79.5-64.5 144-144 144s-144-64.5-144-144s64.5-144 144-144s144 64.5 144 144zM288 192c0 35.3-28.7 64-64 64c-11.5 0-22.3-3-31.6-8.4c-.2 2.8-.4 5.5-.4 8.4c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-2.8 0-5.6 .1-8.4 .4c5.3 9.3 8.4 20.1 8.4 31.6z"/>
                                        </svg>
                                    </button>
                                    <button class="p-1 rounded bg-slate-100 text-slate-500 hover:bg-rose-600 hover:text-rose-100">
                                        <svg width="30" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path fill="currentColor" d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
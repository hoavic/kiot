<x-app-layout>
    <div class="app-content">
        <header class="entry-header flex items-center">
            <h1 class="app-title">Thêm sản phẩm</h1>
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

            <form class="create-grid" method="POST" action="{{ route('categories.store') }}">
                <div class="">
                    @csrf
                    <div class="form-line form-line-mask">
                        <label for="name">Tên sản phẩm</label>
                        <input x-model="name" type="text" name="name" id="name" required />
                    </div>
                    <div class="form-line form-line-mask">
                        <label for="slug">Đường dẫn</label>
                        <input x-slug="name" type="text" name="slug" id="slug"  />
                    </div>
                    <div class="form-break">
                        <label for="description">Mô tả sản phẩm:</label>
                        <textarea type="text" name="description" id="description" class="w-full rounded"></textarea>
                    </div>
                </div>

                <div class="p-4">
                    <div class="form-break sticky top-0 p-4 mb-4 bg-white shadow">
                        <button type="submit" class="block mt-4 py-2 px-4 w-full rounded bg-indigo-800 text-indigo-100 uppercase font-bold">Đăng</button>
                        
                        <div class="form-line text-slate-500 form-line-mask">
                            <label>Status: </label>
                            <select name="status" id="status">
                                <option value>Xuất bản</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-break p-4 mb-4 bg-white shadow">
                        <label for="parent_id">Danh mục</label>
                        <select name="parent_id" id="parent_id" class="w-full rounded">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                        <p class="mt-2"><a href="{{ route('categories.index') }}">Thêm danh mục</a></p>
                    </div>
                    <div class="form-break p-4 mb-4 bg-white shadow">
                        <label for="featured_id">Ảnh đại diện:</label>
                        <input type="file" name="featured_id" id="featured_id"/>
                    </div>
                    
                </div>
                
            </form>

        </div>
    </div>
    <script src="/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#description', // Replace this CSS selector to match the placeholder element for TinyMCE
            height: 500,
            language: 'vi',
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'imagetool', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'wordcount'
            ],
            toolbar: 'undo redo | blocks | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat image',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
            file_picker_callback: function (callback, value, meta) {
                let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                let type = 'image' === meta.filetype ? 'Images' : 'Files',
                    url  = '/laravel-filemanager?editor=tinymce5&type=' + type;

                tinymce.activeEditor.windowManager.openUrl({
                    url : url,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            }
        });
    </script>
</x-app-layout>
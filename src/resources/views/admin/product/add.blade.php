@extends('admin.main')

@section('content')
    {{-- Alert --}}
    @include('admin.error')
    <x-display-succ message="{{session('success')}}" />

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="name">{{__('Tên sản phẩm')}}</label>
                    <input type="text" class="form-control" id="name" placeholder="Nhập tên sản phẩm" name="name"
                        value="{{ old('name') }}" />
                    <x-display-error name-input='name' />
                </div>
                <div class="form-group col-md-6">
                    <label for="category_id">{{__('Danh mục')}}</label>
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="price">{{__('Giá gốc')}}</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">$</span>
                        <span class="input-group-text">0.00</span>
                        <input type="text" name="price" id="price" class="form-control"
                            aria-label="Dollar amount (with dot and two decimal places)" value="{{ old('price') }}"
                            placeholder="Nhập giá sản phẩm..." />
                    </div>
                    <x-display-error name-input='price' />
                </div>
                <div class="form-group col-md-6">
                    <label for="price_sale">{{__('Giá giảm')}}</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">$</span>
                        <span class="input-group-text">0.00</span>
                        <input type="text" name="price_sale" id="price_sale" class="form-control"
                            aria-label="Dollar amount (with dot and two decimal places)" value="{{ old('price_sale') }}"
                            placeholder="Nhập giảm giá sản phẩm..." />
                    </div>
                    <x-display-error name-input='price_sale' />
                    @if (session('message-err'))
                        <p class="text-danger">{{ session('message-err') }}</p>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="description">{{__('Mô tả')}}</label>
                <textarea class="form-control" name="description" id="description"
                    placeholder="Nhập mô tả">{{ old('description') }}</textarea>
                <x-display-error name-input='description' />
            </div>

            <div class="form-group">
                <label for="content">{{__('Mô tả chi tiết')}}</label>
                <textarea class="form-control" name="content" id="content" placeholder="Nhập mô tả">{{ old('content') }}</textarea>
                <x-display-error name-input='content' />
            </div>

            <div class="form-group">
                <label for="image" class="form-label">{{__('Ảnh sản phẩm')}}</label>
                <input class="form-control" style="height: auto!important;" value="{{old('image')}}" type="file" name="image" id="image-product" />
                <div id="image-show" class="mt-3">
                    <a href="{{old('image')}}" target="_blank">
                        <img src="{{old('thumb')}}" alt="Category image" width="100px">
                    </a>
                </div>
                <input type="hidden" name="thumb" id="file" value="{{old('thumb')}}" />
                <x-display-error name-input='image' />
                <x-display-error name-input='thumb' />
            </div>

            <div class="form-check">
                <input name="active" type="checkbox" class="form-check-input" id="active"
                    {{ old('active') === 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="active">{{__('Kích hoạt')}}</label>
            </div>
        </div>
        @csrf

        <div class="card-footer">
            <button name="submit" type="submit" class="btn btn-primary">{{__('Thêm sản phẩm')}}</button>
        </div>
    </form>
@endsection

@section('js')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('scripts')
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace('content');
    </script>
@endsection

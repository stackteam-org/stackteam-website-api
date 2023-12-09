<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
            <!--begin::General options-->
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>General</h2>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <form action="{{route('dashboard.article.update', $article->id)}}" method="POST">
                        @csrf
                        @method('PUT') <!-- استفاده از روش PUT برای به‌روزرسانی -->
                    
                        <!-- تمام فیلدها مشابه فرم ایجاد هستند، تنها مقادیر پیش‌فرض تغییر می‌کنند -->
                    
                        <!-- Input group for Name -->
                        <div class="mb-10 fv-row">
                            <label class="required ">Name</label>
                            <input type="text" name="name" class="form-control mb-2" placeholder="Product name" value="{{ $article->name }}" />
                        </div>
                    
                        <!-- Input group for Title -->
                        <div class="mb-10 fv-row">
                            <label class="required ">Title</label>
                            <input type="text" name="title" class="form-control mb-2" placeholder="Product title" value="{{ $article->title }}" />
                        </div>
                    
                        <!-- Input group for Category -->
                        <div class="mb-10 fv-row w-50">
                            <label class="required ">Category</label>
                            <select name="category_id" id="category_id" class="form-control mb-2">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    
                        <!-- Input group for Language -->
                        <div class="mb-10 fv-row w-50">
                            <label class="required ">Language</label>
                            <select name="lang" id="lang" class="form-control mb-2">
                                <option value="fa" {{ $article->lang == 'fa' ? 'selected' : '' }}>فارسی</option>
                                <option value="en" {{ $article->lang == 'en' ? 'selected' : '' }}>English</option>
                            </select>
                        </div>
                        
                        <!-- Input group for Read Time -->
                        <div class="mb-10 fv-row">
                            <label class="required ">Read time</label>
                            <input type="number" name="read_time" class="form-control mb-2" value="{{ $article->read_time }}" />
                        </div>
                    
                        <!-- Input group for Subtext -->
                        <div class="mb-10 fv-row">
                            <label class="required ">Subtext</label>
                            <input type="text" name="subtext" class="form-control mb-2" placeholder="Product subtext" value="{{ $article->subtext }}" />
                        </div>
                    
                        <!-- Input group for Description -->
                        <div>
                            <label class="">Description</label>
                            <textarea name="text" id="editor">{{ $article->text }}</textarea>
                            <div class="text-muted fs-7">Set a description to the category for better visibility.</div>
                        </div>
                    
                        <!-- Buttons for Cancel and Submit -->
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('dashboard.article.index') }}" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
                            <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                                <span class="indicator-label">Save Changes</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                    </form>
                    
                </div>
                <!--end::Card header-->
            </div>

        </div>
    
        <!--end::Post-->
    </div>
    @push('custom-scripts')
    <script src="{{ asset('ckeditor/ckeditor5-build-classic/ckeditor.js') }}"></script>
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script> --}}
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js')}}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{asset('assets/js/custom/apps/ecommerce/catalog/save-category.js')}}"></script>
    <script src="{{asset('assets/js/widgets.bundle.js')}}"></script>
    <script src="{{asset('assets/js/custom/widgets.js')}}"></script>
    <script src="{{asset('assets/js/custom/apps/chat/chat.js')}}"></script>
    <script src="{{asset('assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
    <script src="{{asset('assets/js/custom/utilities/modals/create-app.js')}}"></script>
    <script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>
    
    <script>
        ClassicEditor

        .create( document.querySelector( '#editor' ),{

            ckfinder: {

                uploadUrl: '{{route('dashboard.upload.image').'?_token='.csrf_token()}}',

            }

        })

        .catch( error => {

            

        } );
    </script>

    @endpush       
</x-app-layout>

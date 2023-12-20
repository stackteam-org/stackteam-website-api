<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
            <!--begin::Post-->
            <div class="content flex-row-fluid" id="kt_content">
                <form class="myform form d-flex flex-column flex-lg-row" action="{{route('dashboard.article.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Aside column-->
                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                        <!--begin::Thumbnail settings-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>تصویر معرفی</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body text-center pt-0">
                                <!--begin::Image input-->
                                <!--begin::Image input placeholder-->
                                <!--end::Image input placeholder-->
                                <!--begin::Image input-->
                                <div
                                style="background-image: url('{{ $article->imageUrl ? asset($article->imageUrl) : asset('path/to/default-image.svg') }}');"
                                class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                                    <!--begin::Preview existing avatar-->
                                    <div class="image-input-wrapper w-150px h-150px"></div>
                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                        <!--begin::Icon-->
                                        <i class="ki-duotone ki-pencil fs-7">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <!--end::Icon-->
                                        <!--begin::Inputs-->
                                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="avatar_remove" />
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Cancel-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                        <i class="ki-duotone ki-cross fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <!--end::Cancel-->
                                    <!--begin::Remove-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                        <i class="ki-duotone ki-cross fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <!--end::Remove-->
                                </div>
                                <!--end::Image input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">
                                    عکس وارد شده حتما باید از نوع jpg باشد.
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Thumbnail settings-->
                        <!--begin::Status-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>وضعیت</h2>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_category_status"></div>
                                </div>
                                <!--begin::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Select2-->
                                <select name='status' class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" id="kt_ecommerce_add_category_status_select">
                                    <option></option>
                                    <option value="1" {{ $article->published == 1 ? 'selected' : '' }}>منتشر شود</option>
                                    <option value="0" {{ $article->published == 0 ? 'selected' : '' }}>منتشر نشود</option>
                                </select>
                                <!--end::Select2-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set the category status.</div>
                                <!--end::Description-->
                                <!--begin::Datepicker-->
                                <div class="d-none mt-10">
                                    <label for="kt_ecommerce_add_category_status_datepicker" class="form-label">Select publishing date and time</label>
                                    <input class="form-control" id="kt_ecommerce_add_category_status_datepicker" placeholder="Pick date & time" />
                                </div>
                                <!--end::Datepicker-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Status-->
                        <!--begin::Template settings-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>دسته بندی</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Select store template-->
                                <label for="kt_ecommerce_add_category_store_template" class="form-label">یک دسته را انتخاب کنید</label>
                                <!--end::Select store template-->
                                <!--begin::Select2-->
                                
                                <select name="category_id" id="category_id" class="form-control form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" id="kt_ecommerce_add_category_store_template">                       
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>

                                <!--end::Select2-->
                            </div>
                            <!--end::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Select store template-->
                                <label for="kt_ecommerce_add_category_store_template" class="form-label">تگهای مفاله را انتخاب کنید</label>
                                <!--end::Select store template-->
                                <!--begin::Select2-->
                                <select name="tags[]" class="form-control form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" multiple>
                                    <option></option>
                                    @foreach($tags as $item)
                                         <option value="{{ $item->id }}" {{ isset($tags) && in_array($item->id, $tags->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach                                 
                                </select>
                                
                                <!--end::Select2-->
                            </div>
                        </div>
                        <!--end::Template settings-->
                        <!--begin::Template settings-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>زبان مقاله</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Select store template-->
                                <label for="kt_ecommerce_add_category_store_template" class="form-label">زبان مقاله را انتخاب کنید</label>
                                <!--end::Select store template-->
                                <!--begin::Select2-->
                                <select name="lang" id="lang" class="form-control form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" id="kt_ecommerce_add_category_store_template">
                                    <option value="fa">
                                        فارسی
                                    </option>
                                    <option value="en">
                                        english
                                    </option>
                                 </select>
                                <!--end::Select2-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Assign a template from your current theme to define how the category products are displayed.</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Template settings-->
                  
                    </div>
                    <!--end::Aside column-->
                    <!--begin::Main column-->
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <!--begin::General options-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>کلیات مقاله</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required form-label">نام مقاله</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="name" class="form-control mb-2" placeholder="نام مقاله را بنویسید" value="{{ $article->name }}" />
                                    <!--end::Input-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">نام مقاله بیشتر از بیست حرف نباشد.</div>
                                    <!--end::Description-->
                                </div>
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required ">عنوان مقاله</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="title" class="form-control mb-2"  value="{{ $article->title }}" />
                                    <!--end::Input-->
                                    <div class="text-muted fs-7">عنوان مقاله بیشتر از بیست حرف نباشد.</div>
                                </div>

                    
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required ">مددت زمان مطالعه</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" name="read_time" class="form-control mb-2" value="{{ $article->read_time }}" />
                                    <!--end::Input-->
                                    <div class="text-muted fs-7">عدد وارد شده به دقیقه محاسبه میگردد.</div>

                                </div>
        
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required ">زیر متن</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="subtext" class="form-control mb-2" placeholder="متن خود را بنویسید" value="{{ $article->subtext }}" />
                                    <!--end::Input-->
                                    <div class="text-muted fs-7">خلاصه ای از متن اصلی به عنوان معرفی مقاله وارد شود.</div>

                                </div>
        
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div>
                                    <!--begin::Label-->
                                    <label class="form-label">متن مقاله</label>
                                    <!--end::Label-->
                                    <!--begin::Editor-->
                                    <input type="hidden" name="text" class="form-control mb-2" />
                                    <div id="editorjs" class="fs-4 fw-normal text-gray-800 mb-10 form-control mb-2"></div>                                
                                    <!--end::Editor-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">.ساختار و بدنه مقاله خود را اینجا طراحی کنید</div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Card header-->
                        </div>
                        <!--end::General options-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="{{ route('dashboard.article.index') }}"
                            id="kt_ecommerce_add_product_cancel" 
                            class="btn btn-light me-5">
                            لغو 
                            </a>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <a 
                            id="save-data"
                            article-id = "{{ $article->id }}"
                            image-url = "{{route('dashboard.upload.image').'?_token='.csrf_token()}}"
                            class="btn btn-flex btn-sm btn-primary fw-bold border-0 fs-6 h-40px">
                            ثبت مقاله 
                        </a>
                            <!--end::Button-->
                        </div>
                    </div>
                    <!--end::Main column-->
                </form>
            </div>
            <!--end::Post-->
        </div>
    @push('custom-scripts')
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

    @vite(['resources/js/editor.js'])

    @endpush       
</x-app-layout>


{{-- <select name="category_id" id="category_id" class="form-control mb-2">
    @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
        </option>
    @endforeach
</select> --}}


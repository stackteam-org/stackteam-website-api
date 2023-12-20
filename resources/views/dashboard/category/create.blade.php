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
                        <h2>Category</h2>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">

                    <form class="myform form d-flex flex-column flex-lg-row" action="{{route('dashboard.category.store')}}" method="POST">
                        @csrf
                        <!--begin::Aside column-->
                        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
    
                            <!--begin::Template settings-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>زبان دسته</h2>
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
                                        <h2>دسته </h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">نام دسته</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="name" class="form-control mb-2" placeholder="نام مقاله را بنویسید" value="" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">نام مقاله بیشتر از بیست حرف نباشد.</div>
                                        <!--end::Description-->
                                    </div>
                                    {{-- <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required ">عنوان مقاله</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="title" class="form-control mb-2" placeholder="عنوان را بنویسید" value="" />
                                        <!--end::Input-->
                                        <div class="text-muted fs-7">عنوان مقاله بیشتر از بیست حرف نباشد.</div>
                                    </div> --}}
    
            
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div>
                                        <!--begin::Label-->
                                        <label class="form-label">توضیحات دسته</label>
                                        <!--end::Label-->
                                        <!--begin::Editor-->
                                        <textarea name="text" class="form-control mb-2" placeholder="نام مقاله را بنویسید">
                                        </textarea>
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
                                <a href="{{ route('dashboard.category.index') }}"
                                id="kt_ecommerce_add_product_cancel" 
                                class="btn btn-light me-5">
                                Cancel
                                </a>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                                    <span class="indicator-label">Save Changes</span>
                                    <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                            </div>
                        </div>
                        <!--end::Main column-->
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

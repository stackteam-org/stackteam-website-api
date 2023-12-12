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

                

						{{-- <div class="content flex-row-fluid" id="kt_content">
							<form class="form d-flex flex-column flex-lg-row" action="{{route('dashboard.article.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
								<!--begin::Aside column-->
								<div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
									<!--begin::Thumbnail settings-->
									<div class="card card-flush py-4">
										<!--begin::Card header-->
										<div class="card-header">
											<!--begin::Card title-->
											<div class="card-title">
												<h2>Thumbnail</h2>
											</div>
											<!--end::Card title-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body text-center pt-0">
											<!--begin::Image input-->
											<!--begin::Image input placeholder-->
											<style>.image-input-placeholder { background-image: url('assets/media/svg/files/blank-image.svg'); } [data-bs-theme="dark"] .image-input-placeholder { background-image: url('assets/media/svg/files/blank-image-dark.svg'); }</style>
											<!--end::Image input placeholder-->
											<!--begin::Image input-->
											<div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
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
											<div class="text-muted fs-7">Set the category thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
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
												<h2>زبان</h2>
											</div>
											<!--end::Card title-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body pt-0">
											<!--begin::Select2-->
                                            <select name="lang" id="lang" class="form-control mb-2">
                                                <option value="fa">
                                                    فارسی
                                                </option>
                                                <option value="en">
                                                    english
                                                </option>
                                             </select>
											<!--end::Select2-->			
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
												<h2>Category</h2>
											</div>
											<!--end::Card title-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body pt-0">
											<!--begin::Select store template-->
											<label for="kt_ecommerce_add_category_store_template" class="form-label">Select a store template</label>
											<!--end::Select store template-->
											<!--begin::Select2-->
                                            <select name="category_id" id="category_id" class="form-control mb-2">
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}"{{ old('category_id') == $category->id ? ' selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
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
								                       <!--begin::Input group-->
                                                       <div class="mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required ">Name</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="name" class="form-control mb-2" placeholder="Product name" value="" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required ">title</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="title" class="form-control mb-2" placeholder="Product title" value="" />
                                                        <!--end::Input-->
                                                
                                                    </div> 

                            
                                                    <div class="mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required ">read time</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="number" name="read_time" class="form-control mb-2" />
                                                        <!--end::Input-->
                                                    </div>
                            
                                                    <div class="mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required ">Subtext</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="subtext" class="form-control mb-2" placeholder="Product subtext" value="" />
                                                        <!--end::Input-->
                                                    </div>
                            
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div>
                                                        <!--begin::Label-->
                                                        <label class="">Description</label>
                                                        <!--end::Label-->
                                                        <!--begin::Editor-->
                                                             <textarea name="text" id="editor"></textarea>
                                                        <!--end::Editor-->
                                                        <!--begin::Description-->
                                                        <div class="text-muted fs-7">Set a description to the category for better visibility.</div>
                                                        <!--end::Description-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <div class="d-flex justify-content-end">
                                                        <!--begin::Button-->
                                                        <a href="{{ route('dashboard.article.index') }}"
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
						</div> --}}
                {{-- //////////////test////////////// --}}
                {{-- <div class="card-body pt-0">
                    <form action="{{route('dashboard.article.store')}}" method="POST">
                        @csrf
                                           <!--begin::Input group-->
                        <div class="mb-10 fv-row">
                            <!--begin::Label-->
                            <label class="required ">Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="name" class="form-control mb-2" placeholder="Product name" value="" />
                            <!--end::Input-->
                        </div>
                        <div class="mb-10 fv-row">
                            <!--begin::Label-->
                            <label class="required ">title</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="title" class="form-control mb-2" placeholder="Product title" value="" />
                            <!--end::Input-->
                    
                        </div> 
                           <div class="mb-10 fv-row w-50">
                            <!--begin::Label-->
                            <label class="required ">Category</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="category_id" id="category_id" class="form-control mb-2">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"{{ old('category_id') == $category->id ? ' selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

 
                        <div class="mb-10 fv-row w-50">
                            <!--begin::Label-->
                            <label class="required ">langoage</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="lang" id="lang" class="form-control mb-2">
                                    <option value="fa">
                                        فارسی
                                    </option>
                                    <option value="en">
                                        english
                                    </option>
                            </select>
                        </div>
 

                        <div class="mb-10 fv-row">
                            <!--begin::Label-->
                            <label class="required ">read time</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="number" name="read_time" class="form-control mb-2" />
                            <!--end::Input-->
                        </div>

                        <div class="mb-10 fv-row">
                            <!--begin::Label-->
                            <label class="required ">Subtext</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="subtext" class="form-control mb-2" placeholder="Product subtext" value="" />
                            <!--end::Input-->
                        </div>

                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div>
                            <!--begin::Label-->
                            <label class="">Description</label>
                            <!--end::Label-->
                            <!--begin::Editor-->
                                 <textarea name="text" id="editor"></textarea>
                            <!--end::Editor-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Set a description to the category for better visibility.</div>
                            <!--end::Description-->
                        </div>
                        <!--end::Input group-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="{{ route('dashboard.article.index') }}"
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
                    </form>
                </div> --}}
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
    @vite(['resources/js/editorjs/editor.js'])

    @endpush       
</x-app-layout>

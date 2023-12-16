<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->

        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Category-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <input type="text" data-kt-ecommerce-category-filter="search"
                                class="form-control form-control-solid w-250px ps-12" placeholder="Search Category" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Add customer-->
                        <a href="{{ route('dashboard.article.create') }}" class="test btn btn-primary">افزودن مقاله جدید</a>
                        <!--end::Add customer-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">

                    <div class="card-body py-3">
                        <!--begin::Table container-->
                        <div>
                            <!--begin::Table-->
                            <table class="table align-middle gs-0 gy-4">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fw-bold text-muted bg-light">
                                        <th class="ps-4 min-w-325px rounded-start">مقالات</th>
                                        <th class="min-w-125px">بازدید</th>
                                        <th class="min-w-125px">تعداد لایک ها</th>
                                        <th class="min-w-200px">دسته بندی</th>
                                        <th class="min-w-150px">وضعیت</th>
                                        <th class="min-w-200px text-end rounded-end"></th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    @foreach ($articles as $article)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50px me-5">
                                                        <img src="{{ asset($article->image_url) }}" class=""
                                                            alt="" />
                                                    </div>
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a href="{{ route('dashboard.article.show', $article) }}"
                                                            class="text-dark fw-bold text-hover-primary mb-1 fs-6">
                                                            {{ $article->title }}
                                                        </a>
                                                        <span
                                                            class="text-muted fw-semibold text-muted d-block fs-7">{{ $article->author->name }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('dashboard.article.show', $article) }}"
                                                    class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">{{ $article->visit }}</a>
                                                <span class="text-muted fw-semibold text-muted d-block fs-7"> </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('dashboard.article.show', $article) }}"
                                                    class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">{{ $article->like }}</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('dashboard.article.show', $article) }}"
                                                    class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">{{ $article->category->name }}</a>
                                                {{-- <span class="text-muted fw-semibold text-muted d-block fs-7">Insurance</span> --}}
                                            </td>
                                            <td>
                                                @if ($article->published)
                                                    <span class="badge badge-light-primary fs-7 fw-bold">منتشر
                                                        شده</span>
                                                @else
                                                    <span class="badge badge-light-danger fs-7 fw-bold">نیاز به
                                                        بررسی</span>
                                                @endif
                                            </td>
                                            <td class="text-end">
                                                <a href="{{ route('dashboard.article.show', $article) }}"
                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                    <i class="ki-duotone ki-switch fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </a>
                                                <a href="{{ route('dashboard.article.edit', $article) }}"
                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                    <i class="ki-duotone ki-pencil fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </a>
												{{-- <form action="{{ route('dashboard.article.destroy', $article->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="menu-link px-3">  <i class="ki-duotone ki-trash fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                        <span class="path5"></span>
                                                    </i></button>
                                                </form> --}}

												

                                                <a href="#"
                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                    <i class="ki-duotone ki-trash fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                        <span class="path5"></span>
                                                    </i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Category-->
        </div>

        <!--end::Post-->
    </div>

    @push('custom-scripts')

    @endpush

	
   <!-- Modal -->
</x-app-layout>

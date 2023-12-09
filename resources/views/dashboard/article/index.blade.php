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
											<input type="text" data-kt-ecommerce-category-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Category" />
										</div>
										<!--end::Search-->
									</div>
									<!--end::Card title-->
									<!--begin::Card toolbar-->
									<div class="card-toolbar">
										<!--begin::Add customer-->
										<a href="{{ route('dashboard.article.create') }}" class="btn btn-primary">افزودن مقاله جدید</a>
										<!--end::Add customer-->
									</div>
									<!--end::Card toolbar-->
								</div>
								<!--end::Card header-->
								<!--begin::Card body-->
								<div class="card-body pt-0">
									<!--begin::Table-->
									<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
										<thead>
											<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
												<th>عنوان</th>
												<th>نویسنده</th>
												<th>دسته بندی</th>
												<th>مدیریت</th>
											</tr>
										</thead>
										<tbody class="fw-semibold text-gray-600">
                                            
                                            @foreach ($articles as $article)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="ms-5">
                                                                <a href="{{ route('dashboard.article.show', $article) }}"
                                                                   class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1"
                                                                   data-kt-ecommerce-category-filter="category_name">
                                                                  {{ $article->title }}
                                                                </a>
                                                                <div class="text-muted fs-7 fw-bold">
                                                                     {{ $article->subtext }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="d-flex">
                                                            {{ $article->author->name }}
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="d-flex">
                                                            {{ $article->category->name }}
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <a href="{{ route('dashboard.article.edit', $article) }}" 
                                                            class="btn btn-sm btn-light btn-active-light-primary btn-flex btn-center" 
                                                            data-kt-menu-trigger="click" 
                                                            data-kt-menu-placement="bottom-end">
                                                            تنظیمات
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i>
                                                        </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="{{ route('dashboard.article.edit', $article) }}" class="menu-link px-3">ویرایش</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <form action="{{ route('dashboard.article.destroy', $article) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="menu-link px-3">حذف</button>
                                                                </form>
                                                                {{-- <a href="javascript:void(0)" onclick="event.preventDefault(); deleteArticle('{{ route('dashboard.article.destroy', $article->id) }}');" class="menu-link px-3">حذف</a> --}}
                                                                {{-- <a href="{{ route('dashboard.article.destroy', $article) }}" class="menu-link px-3" data-kt-ecommerce-category-filter="delete_row">حذف</a> --}}
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>

                                            @endforeach

										</tbody>
										<!--end::Table body-->
									</table>
									<!--end::Table-->
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Category-->
						</div>

        <!--end::Post-->
    </div>

@push('custom-scripts')

    <script>
    function deleteArticle(url) {
      if (confirm('Are you sure you want to delete this article?')) {
        $.ajax({
          url: url,
          type: 'DELETE', // درخواست HTTP DELETE
          data: {
            '_token': '{{ csrf_token() }}', // توکن CSRF
          },
          success: function(response) {
            window.location.href = '/articles';
          }
        });
      }
    }
    </script>
@endpush
</x-app-layout>

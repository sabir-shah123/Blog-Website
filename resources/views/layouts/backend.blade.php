<!DOCTYPE html>
<html lang="en">

<head>
    <base href="" />
    <title> Blogging | @yield('title')</title>
    <meta charset="ISO-8859-1">
    <meta property="og:locale" content="en_US" />
    <link rel="shortcut icon" href="{{ asset(setting('favicon_image','1')) }}" />
   <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />

    @yield('css')



</head>

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">

    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            @include('backend.components.header')
            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                @include('backend.components.sidenav')
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Toolbar-->
                        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                            <!--begin::Toolbar container-->
                            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                                <!--begin::Page title-->
                                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                                    <!--begin::Title-->
                                    <h1
                                        class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                        @yield('page-title') </h1>
                                    <!--end::Title-->
                                    <!--begin::Breadcrumb-->
                                    @if (isset($breadcrumb))
                                        @include('backend.components.breadcrumb', $breadcrumb)
                                    @endif
                                    <!--end::Breadcrumb-->
                                </div>
                                <!--end::Page title-->
                            </div>
                            <!--end::Toolbar container-->
                        </div>
                        <!--end::Toolbar-->
                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-fluid">
                                <!--begin::Row-->
                                @yield('content')
                                <!--end::Row-->
                            </div>
                            <!--end::Content container-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Content wrapper-->
                    @include('backend.components.footer')
                </div>
                <!--end:::Main-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>

    {{-- logout form  --}}
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script src="{{ asset('assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>

    <script>
        $(document).ready(function() {

            $('.dropify').dropify({
                messages: {
                    'default': 'Upload File',
                    'replace': 'Replace File',
                    'remove': 'Remove File',
                    'error': 'Ooops, something wrong happended.'
                }
            });

            //tinymce
            var options = {
                selector: "#editor",
                height: "480"
            };
            if (KTThemeMode.getMode() === "dark") {
                options["skin"] = "oxide-dark";
                options["content_css"] = "dark";
            }

            tinymce.init(options);

            var defaultThemeMode = "light";
            var themeMode;
            if (document.documentElement) {
                if (document.documentElement.hasAttribute("data-theme-mode")) {
                    themeMode = document.documentElement.getAttribute("data-theme-mode");
                } else {

                    themeMode = localStorage.getItem("data-theme") || defaultThemeMode;
                }
                if (themeMode === "system") {
                    themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
                }
                document.documentElement.setAttribute("data-theme", themeMode);
            }
        });


        function sendAjax(url, data, method = 'GET') {
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: url,
                    data: data,
                    type: method,
                    headers: method != 'GET' ? {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    } : {},

                    success: function(response) {
                        resolve(response);
                    },
                    error: function(error) {
                        reject(error);
                    },
                    complete: function() {
                        $('.loading').hide();
                    }
                });
            })
        }
    </script>

    @if (session('success'))
        <script>
            toastr.success("{{ session('success') }}", {
                timeOut: 3000
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            toastr.error("{{ session('error') }}", {
                timeOut: 3000
            });
        </script>
    @endif

    @yield('js')
</body>


</html>

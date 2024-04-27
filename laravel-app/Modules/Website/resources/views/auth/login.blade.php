@php
    $configData = Helper::appClasses();
    $customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/blankLayout')

@section('title', 'Login Basic')

@section('vendor-style')
    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
@endsection

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/pages-auth.js') }}"></script>
@endsection

@section('content')
    @include('components.msg-success')
    @include('components.msg-error')
    @include('components.msg-validation')

    <div class="position-relative">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">

                <!-- Login -->
                <div class="card p-2">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center mt-5">
                        <svg width="132" height="132" viewBox="0 0 132 132" fill="none"
                            class="w-[5.25rem] h-[6.25rem]" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M84.4138 132C83.8455 131.735 83.297 131.43 82.7724 131.087C78.0388 127.455 73.5126 123.563 69.2148 119.428C63.5433 113.907 57.8764 108.382 52.0719 102.989C49.596 100.706 47.2164 98.2077 44.1033 96.6962C43.2711 96.2909 42.4022 95.9652 41.5082 95.7235C40.5316 95.4586 39.4909 95.1116 38.5234 95.2121C36.3502 95.445 34.1586 95.792 32.2054 96.9017C29.7525 98.299 27.3133 99.7147 24.8696 101.121C24.7229 101.203 24.5532 101.249 24.2002 101.395C26.4926 95.5089 28.6934 89.8144 30.9492 83.9921L52.7871 90.9058C51.1274 87.0425 49.5777 83.3619 47.9592 79.7178C46.5012 76.4528 44.9148 73.2471 43.4522 69.9866C42.118 67.0046 40.8113 63.9999 39.6422 60.954C39.4175 60.3695 39.7935 59.4881 40.0594 58.8123C40.8663 56.7421 41.7207 54.6902 42.6224 52.6566C43.6631 50.2957 44.7727 47.9668 45.8318 45.6105C46.5791 43.9528 47.2715 42.2632 48.0509 40.6147C49.1192 38.3314 50.2608 36.1121 51.3474 33.8471C52.3286 31.7967 53.2364 29.7052 54.2359 27.664C55.5426 25.0063 56.9044 22.3805 58.2431 19.7365C59.4215 17.4167 60.5494 15.0695 61.7919 12.7863C63.7863 9.06911 65.8541 5.38849 67.8898 1.69417C68.1511 1.23752 68.3941 0.726067 68.6417 0.246582L68.8526 0.333346C68.4904 1.53891 68.1282 2.73991 67.7798 3.95917C67.1241 6.24243 66.4043 8.47546 65.8358 10.7587C65.1664 13.3708 64.5428 15.9828 64.0247 18.636C63.6121 20.6727 63.3461 22.7459 63.0619 24.7962C62.6676 27.6594 62.2137 30.5226 61.9753 33.4041C61.7368 36.2856 61.7414 39.1032 61.6268 41.9527C61.5122 44.8022 61.2325 47.6334 61.2921 50.4692C61.3884 55.0358 61.6635 59.5658 61.9432 64.1095C62.0761 66.2923 62.342 68.4705 62.6401 70.6396C63.039 73.5804 63.4562 76.5213 64.0155 79.4438C64.6299 82.7546 65.2993 86.0653 66.0971 89.3395C66.8949 92.6137 67.7431 95.9336 68.848 99.1301C70.4207 103.674 72.1308 108.181 74.0061 112.611C75.5191 116.191 77.2155 119.702 79.0999 123.114C80.6771 126 82.5936 128.703 84.3496 131.489C84.3863 131.575 84.368 131.699 84.4138 132Z"
                                fill="#3B4999" />
                            <path
                                d="M90.5622 129.064L90.3559 129.151C88.5632 126.867 86.7154 124.621 84.9961 122.301C83.3639 120.072 81.8233 117.775 80.3241 115.451C79.0449 113.474 77.8207 111.446 76.6837 109.382C75.5879 107.391 74.57 105.345 73.6301 103.272C72.6902 101.199 71.7595 98.9749 70.9892 96.7693C70.3015 94.8057 69.8201 92.7645 69.2699 90.7506C68.6234 88.376 67.8944 86.0151 67.3992 83.6086C64.3622 69.071 62.7061 53.488 64.7858 38.6785C65.1297 36.0025 65.5378 33.322 66.1613 30.6962C66.8445 27.7234 67.7339 24.7871 68.6142 21.8646C69.3203 19.5128 70.0355 17.1519 70.9571 14.8778C72.1263 12.01 73.4834 9.21529 74.8039 6.41145C75.8171 4.25605 76.89 2.13261 77.9399 0.0183105L78.2471 0.132474C77.9445 0.927049 77.6557 1.73076 77.3301 2.52077C76.7708 3.93639 76.161 5.33375 75.6429 6.76307C74.7259 9.31576 73.8089 11.873 72.9928 14.4622C72.3555 16.4989 71.8283 18.5721 71.3377 20.6453C70.6866 23.3852 70.0218 26.1251 69.5404 28.8651C69.0907 31.4339 68.7846 34.0255 68.6234 36.6281C68.3621 40.9024 68.1649 45.1858 68.1649 49.4692C68.197 53.2503 68.5638 57.036 68.8481 60.8125C69.0039 62.8857 69.2286 64.9543 69.5266 67.0047C69.8567 69.2879 70.3244 71.5164 70.6958 73.7723C70.9984 75.5989 71.1176 77.4255 71.544 79.2293C72.2501 82.1656 73.1029 85.0653 73.9602 87.9605C74.6388 90.2437 75.3678 92.527 76.1656 94.8103C76.8533 96.7373 77.619 98.6416 78.458 100.514C79.4713 102.797 80.5579 105.016 81.6675 107.24C82.5844 109.067 83.6894 110.816 84.4964 112.688C85.1428 114.181 85.45 115.821 85.9406 117.383C87.0181 120.817 87.8984 124.333 89.824 127.452C90.1002 127.975 90.3467 128.513 90.5622 129.064Z"
                                fill="#3B4999" />

                            <path
                                d="M108.1 77.115C100.699 79.7544 95.0005 84.3392 91.3004 91.5589C90.6081 89.9287 89.9937 88.4674 89.3748 86.9924C88.5403 85.0242 87.66 83.0743 86.8852 81.0787C86.294 79.5897 85.7993 78.0644 85.4042 76.5122C83.4007 68.1764 82.2733 59.4297 82.6258 50.8575C82.7496 47.8025 83.0384 44.7475 83.341 41.7244C83.5168 40.6147 83.7602 39.5167 84.07 38.4365C87.2015 54.4376 95.867 66.7901 108.1 77.115Z"
                                fill="#3B4999" />
                            <path
                                d="M89.0721 95.5818C87.5866 98.0888 86.179 100.605 85.7113 103.541C85.4683 105.089 85.2895 106.651 85.0695 108.272C84.7348 107.701 84.3313 107.117 84.0378 106.482C83.0246 104.29 82.0251 102.089 81.076 99.8698C79.971 97.2897 78.8569 94.7096 77.8666 92.0793C71.716 75.4459 70.513 56.1313 73.0066 38.5687C73.3871 35.879 74.162 33.2441 74.7397 30.5773C74.9329 29.4026 75.2305 28.2472 75.6291 27.125C75.3632 29.3261 75.0056 31.5226 74.8497 33.7328C74.6021 37.281 74.3499 40.8428 74.3591 44.4002C74.4035 47.2022 74.6179 49.9989 75.001 52.7752C75.3173 55.3096 75.8125 57.8303 76.349 60.3282C76.9542 63.1412 77.6236 65.945 78.403 68.7124C79.1494 71.6734 80.0679 74.5887 81.1539 77.4435C82.6715 81.1333 84.4872 84.7135 86.2799 88.2845C87.142 90.0133 88.1449 91.6688 89.2784 93.2346C90.0532 94.2255 89.4755 94.9059 89.0721 95.5818Z"
                                fill="#3B4999" />
                            <path
                                d="M49.5731 87.3851L49.3484 87.6362L31.7882 81.0787C33.7551 75.3203 35.6854 69.6624 37.6156 63.9908L37.9182 63.9314C41.8032 71.7493 45.6881 79.5672 49.5731 87.3851Z"
                                fill="#E30813" />
                        </svg>
                    </div>
                    <!-- /Logo -->

                    <div class="card-body mt-2">
                        <h4 class="mb-2 fw-semibold">مجتمع چاپ آرمانسا</h4>
                        <p class="mb-4">برای ورود به پنل کاربری لطفا اطلاعات خود را وارد کنید:</p>

                        <form id="formAuthentication" class="mb-3" action="{{ route('login-submit') }}" method="POST">
                            @csrf
                            <div class="form-floating form-floating-outline mb-3">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                                    autofocus>
                                <label for="email">ایمیل</label>
                            </div>
                            <div class="mb-3">
                                <div class="form-password-toggle">
                                    <div class="input-group input-group-merge">
                                        <div class="form-floating form-floating-outline">
                                            <input type="password" id="password" class="form-control" name="password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="password" />
                                            <label for="password">رمز عبور</label>
                                        </div>
                                        <span class="input-group-text cursor-pointer"><i
                                                class="mdi mdi-eye-off-outline"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 d-flex justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me">
                                    <label class="form-check-label" for="remember-me">
                                        من را به خاطر بسپار
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">ورود</button>
                            </div>
                        </form>

                        <div class="divider my-4">
                            <div class="divider-text">یا</div>
                        </div>

                        <div class="mb-3">
                            <a class="btn btn-outline-primary d-grid w-100" href="{{ route('register') }}">ثبت نام</a>
                        </div>

                        <p class="text-center">
                            <a href="{{ route('home') }}">
                                <span>بازگشت به صفحه اصلی</span>
                            </a>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts/layoutMaster')

@section('title', 'Preview - Invoice')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-invoice.css') }}" />
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/offcanvas-add-payment.js') }}"></script>
    <script src="{{ asset('assets/js/offcanvas-send-invoice.js') }}"></script>
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
@endsection

@section('content')

    <div class="row invoice-preview">
        <!-- Invoice -->
        <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
            <div class="card invoice-preview-card">
                <div class="card-body">
                    <div class="px-4 d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column">
                        <div class="mb-xl-0 pb-3">
                            <div class="d-flex svg-illustration align-items-center gap-2 mb-4">

                                <span class="h4 mb-0 app-brand-text fw-bold">سفارش {{ $invoice->id }}</span>
                            </div>
                            <p class="mb-1">نام مشتری: <span>{{ $invoice->customer->fullName() ?? '--' }}</span></p>
                            <p class="mb-1">تاریخ: <span>{{ verta($invoice->created_at)->format('Y/n/j') ?? '--' }}</p>

                            <span>آدرس:</span>
                            <span>{{ $invoice->customer->adderss ?? '--' }}</span>
                        </div>
                        <div>
                            <h5>شماره پیگیری: <span>{{ $invoice->id }}</span></h5>
                            <div class="mb-1">
                                <span>شماره تلفن:</span>
                                <span>{{ $invoice->customer->mobile ?? '--' }}</span>
                            </div>
                            <div>
                                <span>نوع سفارش:</span>
                                <span>{{ __('app.serviceCategory.' . $invoiceDetail->serviceDetail->service->serviceCategory->name) .
                                    ' ' .
                                    __('app.service.' . $invoiceDetail->serviceDetail->service->name) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <div class="d-flex justify-content-between flex-wrap px-4">

                        <div class="my-3">
                            <h6 class="pb-2">مشخصات جلد و صحافی:</h6>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="pe-3 fw-medium">جنس جلد:</td>
                                        <td>{{ $invoiceDetail->serviceDetail->cover->name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-3 fw-medium">نوع صحافی:</td>
                                        <td>{{ $invoiceDetail->serviceDetail->binding->name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-3 fw-medium">نوع سلفون:</td>
                                        <td>{{ $invoiceDetail->serviceDetail->cellophane->name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-3 fw-medium">جهت صحافی :</td>
                                        <td>{{ __('app.bindingDirection.' . $invoiceDetail->binding_direction) }}
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="my-3">
                            <h6 class="pb-2">مشخصات کلی سفارش:</h6>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="pe-3 fw-medium">سایز:</td>
                                        <td>{{ $invoiceDetail->serviceDetail->size->name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-3 fw-medium">نوع کاغذ:</td>
                                        <td>{{ $invoiceDetail->serviceDetail->paper->name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-3 fw-medium">رنگ چاپ:</td>
                                        <td>{{ $invoiceDetail->serviceDetail->color->name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-3 fw-medium">تعداد صفحات:</td>
                                        <td>{{ $invoiceDetail->number_of_pages ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-3 fw-medium">تیراژ :</td>
                                        <td>{{ $invoiceDetail->circulation ?? '' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead class="table-light border-top">
                            <tr>
                                <th>شماره پیگیری</th>
                                <th>شماره پیگیری پرداخت</th>
                                <th>وضعیت</th>
                                <th>مبلغ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <td class="text-nowrap">{{ $payment->id }}</td>
                                    <td class="text-nowrap">{{ $payment->reterival_ref_no }}</td>
                                    <td><span
                                            class="badge bg-label-{{ $paymentStatusColors[$payment->status] }} me-1">{{ $payment->status }}</span>
                                    </td>
                                    <td>{{ $payment->amount }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="text-nowrap">9999999</td>
                                <td class="text-nowrap">9999999</td>
                                <td><span class="badge bg-label-success me-1">انجام شده</span></td>
                                <td>$32</td>
                            </tr>

                        </tbody>
                    </table>
                    <table class="table m-0">
                        <tbody>

                            <tr>
                                <td colspan="3" class="align-top px-4 py-5">
                                    <p class="mb-2">
                                        <span class="me-1 fw-semibold">
                                            {{-- شرکت آرمانسا --}}
                                        </span>
                                    </p>
                                </td>
                                <td class="text-end px-4 py-5">
                                    <p class="mb-2">قیمت:</p>
                                    <p class="mb-2">تخفیف:</p>
                                    <p class="mb-2">مالیات:</p>
                                    <p class="mb-0">قیمت کل:</p>
                                </td>
                                <td class="px-4 py-5">
                                    <p class="fw-semibold mb-2 text-end">$154.25</p>
                                    <p class="fw-semibold mb-2 text-end">$00.00</p>
                                    <p class="fw-semibold mb-2 text-end">$50.00</p>
                                    <p class="fw-semibold mb-0 text-end">$204.25</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /Invoice -->

        <!-- Invoice Actions -->
        <div class="col-xl-3 col-md-4 col-12 invoice-actions">
            <div class="card">
                <div class="card-body">
                    <button class="btn btn-primary d-grid w-100 mb-3" data-bs-toggle="offcanvas"
                        data-bs-target="#sendInvoiceOffcanvas">
                        <span class="d-flex align-items-center justify-content-center text-nowrap"><i
                                class="mdi mdi-send-outline scaleX-n1-rtl me-1"></i>تایید سفارش</span>
                    </button>
                    <a class="btn btn-outline-secondary d-grid w-100 mb-3" target="_blank"
                        href="{{ url('app/invoice/print') }}">
                        رد کردن سفارش
                    </a>
                    {{-- <button class="btn btn-success d-grid w-100" data-bs-toggle="offcanvas"
                        data-bs-target="#addPaymentOffcanvas">
                        <span class="d-flex align-items-center justify-content-center text-nowrap"><i
                                class="mdi mdi-currency-usd me-1"></i>فاکتور پرداخت مشتری</span>
                    </button> --}}
                </div>
            </div>
        </div>
        <!-- /Invoice Actions -->
    </div>

    <!-- Offcanvas -->
    @include('_partials/_offcanvas/offcanvas-send-invoice')
    @include('_partials/_offcanvas/offcanvas-add-payment')
    <!-- /Offcanvas -->
@endsection

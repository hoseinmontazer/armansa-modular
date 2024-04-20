@extends('layouts/layoutMaster')

@section('title', 'Preview - Invoice')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-invoice.css') }}" />

    <style>
        .invoice-detail-file {
            height: 80px;
            width: 56px;
            display: block;
            position: relative;
        }

        .invoice-detail-file .border-line {
            display: block;
            height: 80px;
            width: 56px;
            border: solid 2px #000;
            border-radius: 4px;
            padding-top: 70%;
            font-weight: bold;
            text-align: center;
        }

        .invoice-detail-file .corner {
            position: absolute;
            height: 20px;
            width: 20px;
            top: 0;
            right: 0;
            border-left: solid 2px #000;
            border-bottom: solid 2px #000;
            background: white;
            overflow: hidden;
            border-bottom-left-radius: 4px;
        }

        .invoice-detail-file .corner .o-line {
            position: absolute;
            left: 1px;
            height: 137%;
            width: 50%;
            border-right: solid 2px #000;
            transform: rotate(-45deg);
            background: white;
        }

        .invoice-detail-file:hover .border-line,
        .invoice-detail-file:hover .o-line,
        .invoice-detail-file:hover .corner {
            border-color: green;
        }

        .invoice-detail-file:hover .border-line {
            background: #ccff00;
        }
    </style>
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/offcanvas-add-payment.js') }}"></script>
    <script src="{{ asset('assets/js/offcanvas-send-invoice.js') }}"></script>
    <script>
        $('button.edit-status').click(function() {
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{!! route('app-invoice-edit-status', ['id' => $invoice->id]) !!}",
                data: {
                    status: $(this).data("value")
                },
                success: function(response) {
                    Swal.fire({
                        title: "انجام شد!",
                        text: "تغییرات شما با موفقیت اعمال شد!",
                        icon: "success",
                        showConfirmButton: false,
                        showCancelButton: false,
                        timer: 1500,
                    });

                    setTimeout(function() {
                        location.reload()
                    }, 1500);
                },
                error: function(response) {
                    hideAjaxLoader()

                    Swal.fire({
                        title: "خطا!",
                        text: "تغییرات شما با خطا روبرو شد!",
                        icon: "success"
                    });

                    setTimeout(function() {
                        location.reload()
                    }, 1500);
                }
            });
        });
    </script>
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
            <div class="card mb-4">
                <div class="card-header invoice-customer border d-flex justify-content-between">
                    <h5 class="d-inline-block mb-0">اطلاعات کلی</h5>
                    <span
                        class="badge bg-label-{{ $invoicesStatusColors[$invoice->status] }}">{{ __('app.invoiceStatus.' . $invoice->status) }}</span>
                </div>
                <div class="card-body p-4">
                    <div class="card-text">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <label for="invoice_id" class="col-sm-2 col-form-label">شماره سفارش</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext" id="invoice_id"
                                            value="{{ $invoice->id ?? '--' }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="invoice_created_at" class="col-sm-2 col-form-label">تاریخ سفارش</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext"
                                            id="invoice_created_at"
                                            value="{{ verta($invoice->created_at)->format('Y-m-d') ?? '--' }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="customer_name" class="col-sm-2 col-form-label">نام مشتری</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext" id="customer_name"
                                            value="{{ $invoice->customer->fullName() ?? '--' }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="customer_mobile" class="col-sm-2 col-form-label">شماره موبایل</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext" id="customer_mobile"
                                            value="{{ $invoice->customer->mobile ?? '--' }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="customer_address" class="col-sm-2 col-form-label">آدرس</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext" id="customer_address"
                                            value="{{ $invoice->customer->adderss ?? '--' }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-header invoice-detail border">
                    <h5 class="mb-0">جزئیات سفارش</h5>
                </div>
                <div class="card-body p-4">
                    <div class="card-text">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <label for="invoice_detail_cover" class="col-sm-2 col-form-label">جنس جلد</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext"
                                            id="invoice_detail_cover"
                                            value="{{ $invoiceDetail ? $invoiceDetail->serviceDetail->cover->name : '' }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="invoice_detail_binding" class="col-sm-2 col-form-label">نوع صحافی</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext"
                                            id="invoice_detail_binding"
                                            value="{{ $invoiceDetail ? $invoiceDetail->serviceDetail->binding->name : '' }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="invoice_detail_binding_direction" class="col-sm-2 col-form-label">جهت
                                        صحافی</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext"
                                            id="invoice_detail_binding_direction"
                                            value="{{ $invoiceDetail && $invoiceDetail->binding_direction ? __('app.bindingDirection.' . $invoiceDetail->binding_direction) : '' }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="invoice_detail_size" class="col-sm-2 col-form-label">سایز</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext"
                                            id="invoice_detail_size"
                                            value="{{ $invoiceDetail ? $invoiceDetail->serviceDetail->size->name : '' }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="invoice_detail_circulation" class="col-sm-2 col-form-label">تیتراژ</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext"
                                            id="invoice_detail_circulation"
                                            value="{{ $invoiceDetail ? $invoiceDetail->circulation : '' }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="invoice_detail_circulation" class="col-sm-2 col-form-label">فایل</label>
                                    <div class="col-sm-10">
                                        <div class="row mt-2">
                                            <div class="col-2">
                                                <a href="{{ asset(get_file_upload_path('invoice-detail-files', $invoiceDetail->id) . $invoiceDetail->file_name) }}"
                                                    class="invoice-detail-file tip"
                                                    title='{{ $invoiceDetail->file_name }}' target="_blank">
                                                    <span class="border-line">
                                                        <span class='recep-icon'>
                                                            {{ strtoupper($invoiceDetail->extension) }} </span>
                                                    </span>
                                                    <span class="corner">
                                                        <span class="o-line"></span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-header invoice-payments border">
                    <h5 class="mb-0">جزئیات پرداخت</h5>
                </div>
                <div class="table-responsive payments">
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
                            @if (count($payments) > 0)
                                @foreach ($payments as $payment)
                                    <tr>
                                        <td class="text-nowrap">{{ $payment->id }}</td>
                                        <td class="text-nowrap">{{ $payment->reterival_ref_no }}</td>
                                        <td><span
                                                class="badge bg-label-{{ $paymentStatusColors[$payment->status] }} me-1">{{ __('app.paymentStatus.' . $payment->status) }}</span>
                                        </td>
                                        <td>{{ $payment->amount }} <span>تومان</span></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td></td>
                                </tr>
                            @endif
                    </table>
                </div>
            </div>
        </div>
        <!-- /Invoice -->

        <!-- Invoice Actions -->
        <div class="col-xl-3 col-md-4 col-12 invoice-actions">
            <div class="card">
                <div class="card-body">
                    <button class="edit-status btn btn-primary d-grid w-100 mb-3" data-value="processing">
                        <span class="d-flex align-items-center justify-content-center text-nowrap"><i
                                class="mdi mdi-send-outline scaleX-n1-rtl me-1"></i>تایید سفارش</span>
                    </button>
                    <button class="edit-status btn btn-outline-secondary d-grid w-100 mb-3" data-value="rejected">
                        رد کردن سفارش
                    </button>
                    <button class="edit-status btn btn-outline-secondary d-grid w-100 mb-3" data-value="delivered">
                        تحویل شده
                    </button>
                </div>
            </div>
        </div>
        <!-- /Invoice Actions -->
    </div>
@endsection

@extends('layouts/layoutMaster')

@section('title', 'Add - faqs')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js')}}"></script>
@endsection

@section('content')
<form class="row">
  <!-- faqs Add-->
  <div class="col-lg-9 col-12 mb-lg-0 mb-4">
    <div class="">
      <!-- Multi Column with Form Separator -->
<div class="card mb-4">
  <h5 class="card-header mb-2">اطلاعات سوال</h5>
  <div class="card-body">
    <div class="row pt-3">
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">سوال</label>
            <div class="col-sm-6">
              <span type="text" class="form-control" id="basic-default-name">
                پاسخ
              </span>
            </div>
          </div>

    </div>
  </div>
</div>
    </div>
  </div>
  <!-- /faqs Add-->

  <!-- faqs Actions -->
  <div class="col-lg-3 col-12">
    <div class="card mb-4">
      <div class="card-body">
        <a href="/app/faq/edit" class="btn btn-primary d-grid w-100 mb-3">ویرایش</a>
        <a href="/app/faq/list" class="btn btn-outline-secondary d-grid w-100">لغو</a>
      </div>
    </div>
  </div>
  <!-- /faqs Actions -->
</form>

@endsection

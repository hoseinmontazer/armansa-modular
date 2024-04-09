<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use Modules\Website\App\Models\Invoice;
use Modules\Website\App\Models\InvoiceDetail;
use Modules\Website\App\Models\Payment;

class InvoiceController extends Controller
{
  public function index()
  {
    dd('hello world');
  }

  public function create()
  {
    return view('content.apps.app-invoice-add');
  }

  public function store(Request $request)
  {
    //
  }

  public function show(Request $request)
  {
    $id = Route::current()->parameter('id');

    $invoice = Invoice::findOrFail($id);
    $invoiceDetail = InvoiceDetail::where('invoice_id', $id)->first();
    $payments = Payment::where('invoice_id', $id)->get();
    $paymentStatusColors = [
      'success' => 'success',
      'error' => 'warning',
      'cancel' => 'danger',
    ];

    return view('content.apps.app-invoice-preview', [
      'invoice' => $invoice,
      'invoiceDetail' => $invoiceDetail,
      'payments' => $payments,
      'paymentStatusColors' => $paymentStatusColors,
    ]);
  }

  public function edit(string $id)
  {
    return view('content.apps.app-invoice-edit');
  }

  public function editStatus(Request $request)
  {
    $request->validate([
      'status' => ['required', Rule::in(Invoice::$status)],
    ]);

    $id = Route::current()->parameter('id');
    $invoice = Invoice::findOrFail($id);
    $invoice->status = $request->status;
    if ($invoice->save()) {
      return response()->json([
        'status' => 'success',
      ]);
    }

    return response()->json([
      'status' => 'error',
    ]);
  }

  public function update(Request $request, string $id)
  {
    //
  }

  public function destroy(string $id)
  {
    //
  }
}

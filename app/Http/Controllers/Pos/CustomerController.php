<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\PaymentDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
    // CONTROLLER
    // public function __construct()
    // {
    //     return $this->middleware(['auth']);
    // }
    //
    public function allCustomers()
    {
        $customers = Customer::where('region_id', Auth::user()->region_id)->get();
        return view('admin.customer.allCustomers', compact('customers'));
    }
    public function addCustomer()
    {
        return view('admin.customer.addCustomer');
    }
    public function editCustomer($id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.customer.editCustomer', compact('customer'));
    }
    public function creditCustomers()
    {
        $payments = Payment::where('region_id', Auth::user()->region_id)->where('status', 1)->whereIn('paid_status', ['full_due', 'partial_paid'])->get();
        return view('admin.customer.creditCustomers', compact('payments'));
    }
    public function customersPurchases()
    {
        $payments = DB::table('payments')->selectRaw('customer_id, COUNT(customer_id) as no_of_invoices, SUM(total_amount) as total_amount')->where('region_id', Auth::user()->region_id)->where('status', 1)->groupBy('customer_id')->orderBy('total_amount', 'desc')->get();
        // dd($payments);
        // $payments = Payment::where('paid_status', 'full_paid')->orderBy('created_at', 'desc')->orderBy('total_amount', 'desc')->get();
        return view('admin.customer.customersPurchases', compact('payments'));
    }
    public function printCustomersPurchases()
    {
        $payments = DB::table('payments')->selectRaw('customer_id, COUNT(customer_id) as no_of_invoices, SUM(total_amount) as total_amount')->where('region_id', Auth::user()->region_id)->where('status', 1)->groupBy('customer_id')->orderBy('total_amount', 'desc')->get();
        // dd($payments);
        // $payments = Payment::where('paid_status', 'full_paid')->orderBy('created_at', 'desc')->orderBy('total_amount', 'desc')->get();
        return view('admin.customer.printCustomersPurchases', compact('payments'));
    }
    public function customerPurchases($id)
    {
        // $payments = DB::table('payments')->selectRaw('customer_id, COUNT(customer_id) as no_of_invoices, SUM(total_amount) as total_amount')->groupBy('customer_id')->orderBy('total_amount', 'desc')->get();
        // dd($payments);
        $customer = Customer::findOrFail($id);
        $payments = Payment::where('customer_id', $id)->get();
        return view('admin.customer.customerPurchases', compact('payments', 'customer'));
    }
    public function printCreditCustomers()
    {
        $payments = Payment::where('region_id', Auth::user()->region_id)->where('status', 1)->whereIn('paid_status', ['full_due', 'partial_paid'])->get();
        return view('admin.customer.printCreditCustomers', compact('payments'));
    }

    public function editCustomerInvoice($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('admin.customer.editCustomerInvoice', compact('invoice'));
    }
    public function viewCustomerInvoice($invoice_id)
    {
        $invoice = Invoice::findOrFail($invoice_id);
        return view('admin.customer.viewCustomerInvoice', compact('invoice'));
    }

    public function updateCustomerInvoice(Request $request, $invoice_id)
    {
        if ($request->due_amount < $request->paid_amount) {
            $notification = array(
                'message' => 'Paid Amount Exceeds Due Amount',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        } else {

            $payment = Payment::where('invoice_id', $invoice_id)->first();
            // dd($payment[0]->paid_amount);
            $payment_details = new PaymentDetail();
            $payment_details->invoice_id = $invoice_id;
            $payment_details->date = date('Y-m-d', strtotime($request->date));
            $payment_details->updated_by = Auth::user()->id;
            $payment->updated_at = Carbon::now();
            $payment->paid_status = $request->paid_status;


            if ($request->paid_status == 'full_paid') {

                $payment->paid_amount += $request->due_amount;
                $payment->due_amount = '0';
                $payment_details->current_paid_amount = $request->due_amount;
            } else if ($request->paid_status == 'partial_paid') {
                // dd($payment[0]->paid_amount);
                $payment->paid_amount = $payment->paid_amount + $request->paid_amount;
                $payment->due_amount = $request->due_amount - $request->paid_amount;
                $payment_details->current_paid_amount = $request->paid_amount;
            }

            $payment->save();
            $payment_details->save();

            $notification = array(
                'message' => 'Customer Invoice Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('credit.customers')->with($notification);
        }
    }

    public function storeCustomer(Request $request)
    {
        $image = $request->file('image');
        $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(200, 200)->save('upload/customer/' . $image_name);
        $save_url = 'upload/customer/' . $image_name;
        Customer::insert([
            'name' => $request->name,
            'image' => $save_url,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'region_id' => Auth::user()->region_id,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Customer Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.customers')->with($notification);
    }
    public function updateCustomer(Request $request)
    {
        $customer = Customer::find($request->id);
        $customer->name = $request->name;
        $customer->mobile_no = $request->mobile_no;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->updated_by = Auth::user()->id;
        $customer->updated_at = Carbon::now();

        if ($request->file('image')) {

            $image = $request->file('image');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200, 200)->save('upload/customer/' . $image_name);
            $save_url = 'upload/customer/' . $image_name;

            $customer->image = $save_url;
        }

        $customer->save();

        $notification = array(
            'message' => 'Customer Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.customers')->with($notification);
    }

    public function deleteCustomer($id)
    {
        $customer = Customer::findOrFail($id);
        $img = $customer->image;
        unlink($img);
        Customer::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Customer deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // $customers = Customer::latest()->get();
}

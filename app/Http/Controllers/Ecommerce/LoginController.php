<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Mail\CustomerRegisterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Province;
use App\Customer;
use App\Order;
use DB;
use Mail;

class LoginController extends Controller
{
    public function register()
    {
        $provinces = Province::orderBy('created_at', 'DESC')->get();
        return view('ecommerce.register', compact('provinces'));
    }
    public function storeRegister(Request $request)
    {
        $this->validate($request, [
           'customer_name' => 'required|string|max:100',
           'customer_phone' => 'required',
           'email' => 'required|email',
           'password' => 'required|string',
           'customer_address' => 'required|string',
           'province_id' => 'required|exists:provinces,id',
           'city_id' => 'required|exists:cities,id',
           'district_id' => 'required|exists:districts,id'
       ]);

        if (!auth()->guard('customer')->check()) {
            // $password = Str::random(8);
            $customer = Customer::create([
                'name' => $request->customer_name,
                'email' => $request->email,
                'password' => $request->password,
                'phone_number' => $request->customer_phone,
                'address' => $request->customer_address,
                'district_id' => $request->district_id,
                'activate_token' => Str::random(30),
                'status' => true
            ]);
        }
        return redirect(route('customer.login'))->with('success', 'Selamat data berhasil ditambah!');
    }

    public function loginForm()
    {
        if (auth()->guard('customer')->check()) return redirect(route('customer.dashboard'));
        return view('ecommerce.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:customers,email',
            'password' => 'required|string'
        ]);

        $auth = $request->only('email', 'password');
        $auth['status'] = 1;
        if (auth()->guard('customer')->attempt($auth)) {
            return redirect()->intended(route('customer.dashboard'));
        }
        return redirect()->back()->with(['error' => 'Email / Password Salah']);
    }

    public function dashboard()
    {
        $orders = Order::selectRaw('COALESCE(sum(CASE WHEN status = 0 THEN subtotal END), 0) as pending, 
            COALESCE(count(CASE WHEN status = 3 THEN subtotal END), 0) as shipping,
            COALESCE(count(CASE WHEN status = 4 THEN subtotal END), 0) as completeOrder')
        ->where('customer_id', auth()->guard('customer')->user()->id)->get();
        
        return view('ecommerce.dashboard', compact('orders'));
    }

    public function logout()
    {
        auth()->guard('customer')->logout();
        return redirect(route('customer.login'));
    }
}

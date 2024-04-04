<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{
    //coupon
    public function index()
    {
        $coupons = Coupon::all();
        return view('admin.coupon.index', compact('coupons'));
    }

    //coupon
    // public function coupon_add()
    // {
    //     $coupon = Coupon::all();
    //     return view('admin.coupon.add', compact('coupon'));
    // }

    //coupon_edit
    public function edit($id)
    {
        $coupons = Coupon::findOrFail($id);
        return view('admin.coupon.edit', compact('coupons'));
    }

    //coupon_delete
    public function destroy($id)
    {
            $coupon = Coupon::findOrFail($id);
            $coupon->delete();
            // Redirect back with a success message
            return back()->with('danger', 'coupon Deleted Successfully');
    }

    //coupon add
    public function store(Request $request)
    {
        $request->validate([
            'code'       => 'required|string|max:255|unique:coupons',
            'discount'        => 'required|string|max:255',
            'discount_type'   => 'required|string|max:255',
            'valid_from'  => 'required',
            'valid_until'    => 'required',
        ]);

        $coupon = Coupon::create([
            'code'       => $request->code,
            'discount'        => $request->discount,
            'discount_type'   => $request->discount_type,
            'valid_from'  => $request->valid_from,
            'valid_until'    => $request->valid_until,
            'created_at'    => Carbon::now(),
        ]);

        return back()->with('success' , 'Coupon Added Successfully');
    }

    //coupon update
    public function update(Request $request ,$id)
    {
        $request->validate([
            'code'       => 'required|string|max:255|unique:coupons',
            'discount'        => 'required|string|max:255',
            'discount_type'   => 'required|string|max:255',
            'valid_from'  => 'required',
            'valid_until'    => 'required',
        ]);

        $coupon = Coupon::findOrFail($id)->update([
            'code'       => $request->code,
            'discount'        => $request->discount,
            'discount_type'   => $request->discount_type,
            'valid_from'  => $request->valid_from,
            'valid_until'    => $request->valid_until,
            'updated_at'    => Carbon::now(),
        ]);


        return back()->with('success' , 'Coupon Updated Successfully');
    }
}

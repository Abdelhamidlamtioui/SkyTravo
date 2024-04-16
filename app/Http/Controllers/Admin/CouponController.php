<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
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


    public function edit($id)
    {
        $coupons = Coupon::findOrFail($id);
        return view('admin.coupon.edit', compact('coupons'));
    }

    //coupon add
    public function store(CouponRequest $request)
    {
        $request->validated();

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
    public function update(CouponRequest $request ,$id)
    {
        $request->validated();

        $coupon = Coupon::findOrFail($id)->update([
            'code'       => $request->code,
            'discount'        => $request->discount,
            'discount_type'   => $request->discount_type,
            'valid_from'  => $request->valid_from,
            'valid_until'    => $request->valid_until,
            'updated_at'    => Carbon::now(),
        ]);


        return redirect()->route("admin.coupon.index")->with('success' , 'Coupon Updated Successfully');
    }

    //coupon_delete
    public function destroy($id)
    {
            $coupon = Coupon::findOrFail($id);
            $coupon->delete();
            return back()->with('danger', 'coupon Deleted Successfully');
    }
}

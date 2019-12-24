<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\ShippingAddress;
use App\BillingAddress;
use App\User;

use Auth;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    
        $shipping = ShippingAddress::findOrFail(Auth::user()->id);
        $billing = BillingAddress::findOrFail(Auth::user()->id);
        $user = User::findOrFail(Auth::user()->id);
        
        return view('client.index', compact('shipping', 'billing', 'user'));
    
    }

    public function updateBillingAddress(Request $request, $id)
    {
        
        $request->validate([
            'first_name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
            'phone' => 'required|string|max:191',
            'email' => 'required|string|email|max:191',
            'company' => 'nullable|string|max:191',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:191',
            'state' => 'required|string|max:191',
            'zip' => 'required|string|max:191',
            'country' => 'required|string|max:191'
        ]);

        BillingAddress::whereId($id)
        ->update([
            'user_id' => Auth::user()->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'company' => $request->company,
            'street_address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'country' => $request->country
        ]);

        Session::flash('success', 'Your billing address has been updated successfully.');
        return redirect()->back();

    }

    public function updateShippingAddress(Request $request, $id)
    {
        
        $request->validate([
            'first_name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
            'phone' => 'required|string|max:191',
            'email' => 'required|string|email|max:191',
            'company' => 'nullable|string|max:191',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:191',
            'state' => 'required|string|max:191',
            'zip' => 'required|string|max:191',
            'country' => 'required|string|max:191'
        ]);

        ShippingAddress::whereId($id)
        ->update([
            'user_id' => Auth::user()->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'company' => $request->company,
            'street_address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'country' => $request->country
        ]);

        Session::flash('success', 'Your shipping address has been updated successfully.');
        return redirect()->back();        
    
    }

    public function updateProfile(Request $request, $id)
    {
        
        $request->validate([
            'first_name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191'
        ]);        

        User::whereId($id)
        ->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ]);

        Session::flash('success', 'Your profile has been updated successfully.');
        return redirect()->back();

    }

    public function changePassword(Request $request, $id)
    {

        $request->validate([
            'passwordold' =>'required',
            'password' => 'required|min:6|max:50|confirmed'
        ]);

        try {

            $user = User::findOrFail($id);
            $user_password = $user->password;
            
            if(Hash::check($request->passwordold, $user_password)){

                $password = Hash::make($request->password);
                $user->password = $password;
                $user->save();

                Session::flash('success', "Your account password has been changed successfully.");
                return redirect()->back();
            
            }else{
            
                Session::flash('alert', 'Incorrect old password, system didnt recognize that password.');
               // Session::flash('type', 'warning');
                return redirect()->back();
            
            }

        } catch (\PDOException $e) {
            Session::flash('alert', 'Some problem occurs, please try again!');
         //   Session::flash('type', 'warning');
            return redirect()->back();
        }

    }

}

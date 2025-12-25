<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\DailyResult;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function index(){
        return view('admin.login');
    }
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function form(){
        return view('admin.form');
    }
    public function table(){
        return view('admin.table');
    }


    public function authenticate(Request $request)
        {
            $credentials = $request->validate([
                "email" => 'required|email',
                "password" => 'required'
            ]);

            if (Auth::guard('admin')->attempt($credentials)) {
                $request->session()->regenerate();
                $admin = Auth::guard('admin')->user();
                Session::put('admin_user', $admin);
                return redirect()->route('admin.dashboard')->with('success', 'Login successful');
            }

            return redirect()->route('admin.login')->with('error', 'Invalid credentials');
        }




    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }
    

    public function allResults(Request $request){

        if ($request->isMethod('post')) {
            // Validate form data
            $request->validate([
                'game_id' => 'required|numeric',
                'yesterday_result' => 'required|string',
                'today_result' => 'required|string',
                'date' => 'required|date',
            ]);
    
            
            DailyResult::create([
                'game_id' => $request->game_id,
                'yesterday' => $request->yesterday_result,
                'today' => $request->today_result,
                'date' => $request->date,
            ]);
    
            return redirect()->back()->with('success', 'Result saved successfully!');
        }


        $filter = $request->input('filter', '10_days'); // Default to last 10 days

            $query = DB::table('daily_results');
            
            if ($filter == '10_days') {
                $query->where('date', '>=', Carbon::now()->subDays(10));
            } elseif ($filter == '1_month') {
                $query->where('date', '>=', Carbon::now()->subMonth());
            }

            // Get the filtered data
             $alldata = $query->orderBy('date', 'desc')->get();
        // print_r($alldata);die;
        
      
        return view('admin.result', compact('alldata','filter'));

    }



    public function enquiry(Request $request){
        $filter = $request->input('filter', '10_days'); // Default to last 10 days
            $query = DB::table('contact_page');
            if ($filter == '10_days') {
                $query->where('created_at', '>=', Carbon::now()->subDays(10));
            } elseif ($filter == '1_month') {
                $query->where('created_at', '>=', Carbon::now()->subMonth());
            }
            // Get the filtered data
             $alldata = $query->orderBy('created_at', 'desc')->get();
        return view('admin.enquiry', compact('alldata','filter'));

    }

    public function destroy($id)
        {
            DB::table('contact_page')->where('id', $id)->delete();
            return response()->json(['success' => true, 'message' => 'Contact deleted successfully']);
        }
        public function updateTodayResult(Request $request)
        {
            // print_r($request);die;
            $request->validate([
                'id' => 'required|integer',
                'today' => 'required|numeric',
            ]);
        
            $record = DailyResult::find($request->id);
            $record->today = $request->today;
            $record->save();
        
            return redirect()->back()->with('success', 'Result updated successfully!');
        }
        
    
}

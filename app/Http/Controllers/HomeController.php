<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Contact;
use App\Models\Game;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request){
        $filter = $request->input('filter', '10_days'); // Default to last 10 days
            $query = DB::table('daily_results');
            if ($filter == '10_days') {
                $query->where('date', '>=', Carbon::now()->subDays(10));
            } elseif ($filter == '1_month') {
                $query->where('date', '>=', Carbon::now()->subMonth());
            }
            // Get the filtered data
             $alldata = $query->orderBy('date', 'desc')->get();

            //ALL ACTIVE CONTACT
            $resultFilter = $alldata;
        $CONTACTS = Contact::all();
        $GAMES = Game::all();

        return view('welcome', compact('alldata','CONTACTS','GAMES','resultFilter','filter'));
    }

    public function about(){
        return view('about');
    }

    public function privacy(){
        return view('privacy');
    }


    public function terms(){
        return view('terms');
    }
    
    public function contact(){
        return view('contact');
    }
    

    // public function filterResult(Request $request){

        
    //     $query = DB::table('daily_results');
    //     // Get date range from request
    //     $startDate = $request->input('created_at'); // Start date
    //     $endDate = $request->input('created_below'); // End date

    //     // Ensure both dates are provided
    //     if ($startDate && $endDate) {
    //         $query->whereBetween('date', [$startDate, $endDate]); // Filter between start and end date
    //     }
    //     // Get filtered data
    //     $alldata = $query->orderBy('date', 'desc')->get();
    //     return response()->json($alldata); // Return JSON response for AJAX
    // }
    

    public function filterResult(Request $request)
{
    $query = DB::table('daily_results');

    // Get month and year from the request
    $month = $request->input('month'); // e.g. "04"
    $year = $request->input('year');   // e.g. "2025"

    // If both month and year are present, filter records
    if ($month && $year) {
        $query->whereYear('date', $year)
              ->whereMonth('date', $month);
    }

    // Get filtered data
    $alldata = $query->orderBy('date', 'desc')->get();

    // Return JSON response
    return response()->json($alldata);
}


    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'mobile' => 'required|string|max:15',
            'message' => 'required|string|max:1000',
        ]);

        DB::table('contact_page')->insert([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'mobile' => $validated['mobile'],
            'message' => $validated['message'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        return response()->json(['success' => true]);
    }

}

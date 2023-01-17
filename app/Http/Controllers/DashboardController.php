<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
    $Todayguests = Transaction::where([['check_in', '<=', Carbon::now()], ['check_out', '>=', Carbon::now()]])->get();
    $activeTransactions = Transaction::where('check_out', '>=', Carbon::now())->get();
    $transactionsExpired = Transaction::where('check_out', '<', Carbon::now())->get();
    $totalRes = Transaction::with('user', 'room', 'customer')->get();
    
        return view('dashboard',[
                'Todayguests'=>$Todayguests,
                'activeTransactions'=>$activeTransactions,
                'transactionsExpired'=>$transactionsExpired,
                'totalRes'=>$totalRes,
                   ]);
    
}
}

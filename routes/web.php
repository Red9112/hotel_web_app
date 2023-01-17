<?php




use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 

Route::resource('/room', 'RoomController')->middleware(['auth']);
Route::resource('/type', 'TypeController')->middleware(['auth'])->only(['index','create','store','edit','update','destroy']);
Route::resource('/roomstatus', 'RoomStatusController')->middleware(['auth'])->only(['index','create','store','edit','update','destroy']);

Route::resource('/customer', 'CustomerController')->middleware(['auth']);


Route::get('/', function () {
    return view('welcome');
});
Route::get('/pdfGeneration', function(){
    // $pdf = new PDF(new Dompdf(), null,null,null);
    // $dompdf = new Dompdf();
    // $dompdf->load_html("<h1>Hello, World</h1>");
   
   // $pdf = PDF::loadView('Payment.invoice',$data)); 
    //return $pdf->download('invoice.pdf');

   $pdf = App::make('dompdf.wrapper');
    $pdf->loadHTML("dashboard.index");
    return $pdf->stream();
});

//Route::get('pdf', 'PaymentController@pdf')->middleware(['auth'])->name('pdf');
Route::get('/payment/{payment}/pdf','PaymentController@pdf')->middleware(['auth'])->name('pdf');
// User
Route::middleware(['auth','role:Admin'])->group(function(){
    Route::resource('/user', 'UserController')->middleware(['auth']);
});
//end

Route::get('/dashboard', 'DashboardController@index')->middleware(['auth'])->name('dashboard');

// Transactions routes                        
//Route::get('/transaction','TransactionController@index')->middleware(['auth'])->name('Transaction.index');
Route::get('/transaction/chooseCustomer','TransactionController@chooseCustomer')->middleware(['auth'])->name('transaction.chooseCustomer');
Route::get('/transaction/createcustomer','TransactionController@createcustomer')->middleware(['auth'])->name('transaction.createCustomer');
Route::post('/transaction/storeCustomer','TransactionController@storeCustomer')->middleware(['auth'])->name('transaction.storeCustomer');
Route::get('/transaction/{customer}/availability','TransactionController@availability')->middleware(['auth'])->name('transaction.availability');
Route::get('/transaction/{customer}/chooseRoom','TransactionController@chooseRoom')->middleware(['auth'])->name('transaction.chooseRoom');
Route::get('/transaction/{customer}/{room}/{from}/{to}/confirmation','TransactionController@confirmation')->middleware(['auth'])->name('transaction.confirmation');
Route::resource('/transaction', 'TransactionController')->middleware(['auth'])->only(['index','store']);
//end 

// Payment
Route::post('/transaction/{customer}/{room}/payDownPayment','TransactionController@payDownPayment')->middleware(['auth'])->name('transaction.payDownPayment');

Route::resource('/payment', 'PaymentController')->middleware(['auth'])->only(['index']);
Route::get('/transaction/{transaction}/payment/create','PaymentController@create')->middleware(['auth'])->name('transaction.payment.create');
Route::post('/transaction/{transaction}/payment/store','PaymentController@store')->middleware(['auth'])->name('transaction.payment.store');
Route::get('/payment/{payment}/invoice','PaymentController@invoice')->middleware(['auth'])->name('payment.invoice');







require __DIR__.'/auth.php';










 





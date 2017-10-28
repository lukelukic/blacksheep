<?php

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
Use App\DTO\UserDTO;
Use Illuminate\Http\Request;
Use App\User;
Use App\Admin;
Use \App\Services\DTOValidator;
/*
 Get routes, representing pages
 */
Route::get('/', function () {
    echo "Pocetna";
})->name('home');

Route::get('/delivery', function(){
    echo 'Dostava';
})->name('delivery');

Route::get('/buy-guide', function(){
    echo 'Uputstvo za kupovinu';
})->name('delivery');

Route::get('/contact', function(){
    echo 'Kontakt';
})->name('delivery');

Route::get('/terms', function(){
    echo 'Pravila koriscenja';
})->name('delivery');

Route::get('/categories', function(){
    echo 'Lista svih kategorija';
})->name('delivery');

Route::get('/categories/{category}/{subcategory?}', function($category, $subcategory = null){
    echo 'Kategorija: ' . $category . " " . $subcategory;
})->name('delivery');



/*
 * Login ruta, kratka pa nema potrebe za kontrolerom
 */
Route::post('/auth', function(Request $request) {
    if($request->session()->has('username'))
        return redirect(route("/"));

    if($request->has('username') && $request->has('password')) {
        $adminRepo = Admin::getRepository();
        if ($adminRepo->login($request->get('username'), $request->get('password'))) {
            $request->session()->put('username', $request->session()->get('username'));
            return redirect(route('admin'));
        }
    }
});
/*
    Testing data
*/
//Admin group
Route::group(['middleware' => 'admin'], function(){
   Route::resource("admin/products", 'Admin\ProductController');
});

Route::get("/cards", function(Request $request){
    return [1,3,4,5];
});

Route::post("/product", function(Request $request){
    return [
        'feedback' => "Uspesan unos!"
    ];
});

Route::get("asset", function() {
   return view('admin.overview');
});



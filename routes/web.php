    <?php

    use Illuminate\Support\Facades\Auth;
    use App\Http\Controllers\Backend\User\DashboardController as UserDashboardController;
    use Illuminate\Support\Facades\Route;

    Auth::routes();


    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['middleware' => 'auth', 'prefix' => 'user', 'as' => 'user.'], function () {
                Route::get('/dashboard', [UserDashboardController::class, 'dashboard'])->name('dashboard');
    });

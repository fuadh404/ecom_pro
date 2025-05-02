        <?php

        use Illuminate\Support\Facades\Auth;
        use App\Http\Controllers\Frontend\HomeController;
        use App\Http\Controllers\Backend\User\DashboardController as UserDashboardController;
        use Illuminate\Support\Facades\Route;

        Auth::routes();

        //frontend Routes
        Route::group(['as' => 'f.'], function () {
            Route::get('/', [HomeController::class, 'home'])-> name('home');
        });

        //User auth Routes
        Route::group(['middleware' => 'auth', 'prefix' => 'user', 'as' => 'user.'], function () {
                    Route::get('/dashboard', [UserDashboardController::class, 'dashboard'])->name('dashboard');
        });

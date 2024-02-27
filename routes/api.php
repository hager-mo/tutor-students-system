<?php
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\API\StudentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/students', [StudentController::class, 'index'])->middleware('auth:sanctum');

Route::get('/students/{id}', [StudentController::class, 'show'])->middleware('auth:sanctum');

Route::post('/students', [StudentController::class, 'store'])->middleware('auth:sanctum');

Route::post('/login', function (Request $request) {
    $request->validate([
        'email'=>'required|email',
        'password'=>'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if(!$user || !Hash::check($request->password, $user->password)){
        throw ValidationException::withMessages([
            'email' => ['The provided credentials aren\'t correct']
        ]);
    }

    return $user->createToken($request->email)->plainTextToken;
});
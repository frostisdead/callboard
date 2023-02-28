<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function list_of_profiles () {
        $users = User::all();
        return view('profile.profiles', ['users'=>$users]);
    }

    public function change($id): View
    {
        $user = User::find($id);
        return view('profile.change-data', compact('user'));
    }

    public function custom_change(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->update();
        Session::flash('success', 'Username has been changed');
        Session::reflash();
        return redirect()->back()->with('status', 'profile-updated');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {

    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function ban ($id) {
            // ban for days
    $ban_for_next_7_days = Carbon::now()->addDays(7);
    $ban_for_next_14_days = Carbon::now()->addDays(14);
    $ban_permanently = 0;

    // ban user
    $user = User::find($id);
    $user->banned_till = $ban_for_next_7_days;
    $user->save();
    return redirect('/dashboard');
    }
    

    public function unban($id) {
        $user = User::find($id);
        $user->banned_till = null;
        $user->save();
        return redirect('/dashboard');
    }

    public function bannedStatus()
    {
        $user_id = 1;
        $user = User::find($user_id);
    
        $message = "The user is not banned";
        if ($user->banned_till != null) {
            if ($user->banned_till == 0) {
                $message = "Banned Permanently";
            }
    
            if (now()->lessThan($user->banned_till)) {
                $banned_days = now()->diffInDays($user->banned_till) + 1;
                $message = "Suspended for " . $banned_days . ' ' . Str::plural('day', $banned_days);
            }
        }
    
        dd($message);
    }

    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
}
}

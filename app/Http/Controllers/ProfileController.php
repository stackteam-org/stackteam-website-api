<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Nette\Utils\Image;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request): View
    {
        $avatar = storage::disk('upload')->url($request->user()->avatar);

        return view('profile.index', [
            'user' => $request->user(),
            'image' => $avatar
        ]);
    }


    public function edit(Request $request): View
    {

        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if($request->hasFile('avatar')){

            $request->validate([
                'avatar' => 'image',
            ]);
//            $avatar = Storage::putFileAs('avatars',$request->file('avatar'), time().'-'.$request->file('avatar')->getClientOriginalName());

            $avatarName = time() . '.' . $request->avatar->extension();
            $request->avatar->storeAs('public/images', $avatarName);

            Auth()->user()->update(['avatar'=>$avatarName]);
        }

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
            $request->user()->avatar = $avatarName;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ChatController;
use App\Models\User;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function showRegistrationForm()
    {
        return view('pages.register');
    }

    public function register(Request $request)
    {
        // Validate step 1 registration fields
        $validator = Validator::make($request->all(), User::validationRules(1));
    
        if ($validator->fails()) {
            return redirect()->route('register')->withErrors($validator)->withInput();
        }
    
        // Upload profile picture if provided
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->storeAs('profile_pictures/temp', uniqid('profile_picture_', true) . '.' . $request->file('profile_picture')->getClientOriginalExtension(), 'public');
        } else {

            $profilePicturePath = null;
        }
        
        // else {
        //     // Use the default avatar if no profile picture is provided
        //     $profilePicturePath = 'img/defaults/default_avatar.jpg';
        // }
    
        // Store step 1 registration data in session
        $request->session()->put('registration_step_1', $request->except('_token', 'profile_picture'));
    
        // Store temporary profile picture path in session
        $request->session()->put('temporary_profile_picture', $profilePicturePath);
    
        // Redirect to step 2 registration
        return redirect()->route('get_register_2');
    }
      

    public function showRegistrationFormStep2()
    {

        // Check if step 1 registration data is available in session
        if (session()->has('registration_step_1')) {


            return view('pages.register_2');
        } else {

            // Redirect to step 1 if step 1 data is not available
            return redirect()->route('register');
        }
    }

    public function registerStep2(Request $request)
    {
        // Validate step 2 registration fields, including email confirmation
        $request->validate(User::validationRules(2));
    
        // Retrieve step 1 registration data from session
        $step1Data = $request->session()->get('registration_step_1');
    
        // Retrieve temporary profile picture path
        $temporaryProfilePicture = $request->session()->get('temporary_profile_picture');
    
        // Generate the new permanent path
        $permanentProfilePicture = 'profile_pictures/' . basename($temporaryProfilePicture);

        // Move the file to the permanent location
        Storage::move("public/{$temporaryProfilePicture}", "public/{$permanentProfilePicture}");

        // Delete the temporary file
        Storage::delete("public/{$temporaryProfilePicture}");

        // Delete the temporary file
        // Storage::delete($temporaryProfilePicture);

        // Create a new user with both step 1 and step 2 data
        $user = User::create(array_merge($step1Data, [
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_picture' => $permanentProfilePicture,
        ]));
    
        // Clear step 1 registration data from session
        $request->session()->forget(['registration_step_1', 'temporary_profile_picture']);
    
        // Redirect to dashboard or any other page as needed
        return redirect()->route('index')->withErrors(['success' => 'User successfully created!']);
    }    

    public function showLoginForm()
    {
        $this->clearTempFiles();

        return view('pages.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        // Check if "Remember Me" is checked
        $remember = $request->has('remember');
    
        if (Auth::attempt($credentials, $remember)) {
            // Authentication successful
            return redirect()->route('dashboard')->with(['success' => 'Login successful!']);
        } else {
            // Authentication failed
            return redirect()->route('index')->withErrors(['error' => 'Invalid email or password.']);
        }
    }

    public function dashboard()
    {
        return view('pages.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index')->with(['success' => 'Logout successful!']);
    }

    private function clearTempFiles()
    {
        $tempFolderPath = 'profile_pictures/temp';

        // Check if the folder exists before attempting to delete files
        if (Storage::disk('public')->exists($tempFolderPath)) {
            // Delete all files in the temp folder
            $files = Storage::disk('public')->files($tempFolderPath);
            Storage::disk('public')->delete($files);
        }
    }

    public function updateEmail(Request $request)
    {
        $user = auth()->user();
    
        try {
            // Validate the form data
            $validator = $request->validate([
                'new_email' => ['required', 'email', 'unique:users,email,' . $user->id],
                'confirm_new_email' => ['required', 'same:new_email'],
                'password' => ['required', function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        $fail('The provided password is incorrect.');
                    }
                }],
            ]);
        } catch (ValidationException $e) {
            // If validation fails, return the validation errors as JSON
            return response()->json(['errors' => $e->validator->errors()], 422);
        }
    
        // Update the email address
        $user->email = $request->new_email;
        $user->save();
    
        // You can customize the success message
        $message = 'Email updated successfully!';
    
        // Return a JSON response with success message
        return response()->json(['message' => $message, 'current_email' => $user->email]);
    }

    public function updatePassword(Request $request)
{
    $user = auth()->user();

    try {
        // Validate the form data
        $request->validate([
            'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    $fail('The provided current password is incorrect.');
                }
            }],
            'new_password' => ['required', 'string', 'min:8', 'different:current_password'],
            'confirm_new_password' => ['required', 'same:new_password'],
        ]);
    } catch (ValidationException $e) {
        // If validation fails, return the validation errors as JSON
        return response()->json(['errors' => $e->validator->errors()], 422);
    }

    // Update the password
    $user->password = Hash::make($request->new_password);
    $user->save();

    // You can customize the success message
    $message = 'Password updated successfully!';

    // Return a JSON response with success message
    return response()->json(['message' => $message]);
}

public function updateProfile(Request $request)
{
    $user = auth()->user();

    try {
        // Validate the form data
        // $validator = Validator::make($request->all(), User::validationRules(1));
        $validator = $request->validate([
            'first_name' => ['required', 'string', 'max:255', 'regex:/^([^0-9]*)$/'],
            'middle_name' => ['required', 'string', 'max:255', 'regex:/^([^0-9]*)$/'],
            'last_name' => ['required', 'string', 'max:255', 'regex:/^([^0-9]*)$/'],
            'address' => ['required', 'string', 'max:255'],
            'affiliation' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'date'],
            'gender' => ['required', 'in:Male,Female,Prefer not to say'],
            'profile_picture' => ['nullable', 'image', 'max:5120'],
        ]);
    } catch (ValidationException $e) {
        // If validation fails, return the validation errors as JSON
        return response()->json(['errors' => $e->validator->errors()], 422);
    }

        // Delete the old profile picture
        if ($user->profile_picture) {
            Storage::delete($user->profile_picture);
        }

        // Update user profile fields
        $user->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'affiliation' => $request->affiliation,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
        ]);

        // Update profile picture if provided
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('public/profile_pictures');
            $user->update(['profile_picture' => $profilePicturePath]);
        }

        // You can customize the success message
        $message = 'Profile updated successfully!';

        // Return a JSON response with success message
        return response()->json(['message' => $message, 
        'first_name' => $user->first_name,
        'middle_name' => $user->middle_name,
        'last_name' => $user->last_name,
        'address' => $user->address,
        'affiliation' => $user->affiliation,
        'birthday' => $user->birthday,
        'gender' => $user->gender,
        'profile_picture' => $user->profile_picture,
    ]);

}

    public function showUsers()
    {
        $users = User::all()->except(Auth::id());

        $messages = ChatMessage::with('sender', 'recipient')
        ->orderBy('created_at', 'asc')
        ->get();

        return view('pages.network', compact('users', 'messages'));
    }

    public function showProfile(User $user)
    {
        // Load the user profile view with the user data
        return view('pages.profile_view', compact('user'));
    }

    public function destroy(User $user)
    {
        // Delete courses created by the user
        $user->createdCourses()->delete();
    
        // Delete chat messages sent by the user
        $user->sentChatMessages()->delete();
    
        // Delete chat messages received by the user
        $user->receivedChatMessages()->delete();
    
        // Delete the user
        $user->delete();
    
        return redirect()->route('login')->withErrors(['success' => 'User deleted successfully']);
    }

}

<?php
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    protected function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $randomPassword = Str::random(8);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $user->password = Hash::make($randomPassword);
            $user->save();

            Mail::to($user->email)->send(new ResetPasswordMail($user, $randomPassword));

            return redirect('/')
                ->with('success', 'Password reset email sent successfully.');
        } else {
            return redirect('/')
                ->with('error', 'Invalid email. Password reset email not sent.');
        }
    }

}

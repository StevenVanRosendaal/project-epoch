<div class="min-h-screen flex items-center justify-center bg-base-200">
    <div class="card w-full max-w-md shadow-lg bg-base-100">
        <div class="card-body">
            <h2 class="card-title text-center">Verify Your Email Address</h2>
            <p class="mb-4 text-center">
                Thanks for signing up! Before getting started, please verify your email address by clicking on the link we just emailed to you.
                If you didn’t receive the email, we will gladly send you another.
            </p>

            @if ($verificationLinkSent)
                <div class="alert alert-success mb-4" role="alert">
                    A new verification link has been sent to your email address.
                </div>
            @endif

            <form wire:submit.prevent="resendVerification" class="mb-2">
                <button type="submit" class="btn btn-primary w-full">
                    Resend Verification Email
                </button>
            </form>

            <form wire:submit.prevent="logout">
                <button type="submit" class="btn btn-ghost w-full">
                    Log Out
                </button>
            </form>
        </div>
    </div>
</div>

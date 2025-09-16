<x-layouts.guest>
    <div class="min-h-screen flex items-center justify-center">
        <form action="{{ route('register.store') }}" method="POST">
            @csrf
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
                <legend class="fieldset-legend">Register</legend>
                <input type="text" class="input" placeholder="Name" name="name">
                <input type="text" class="input" placeholder="Email" name="email">
                <input type="password" class="input" placeholder="Password" name="password">
                <input type="password" class="input" placeholder="Repeat Password" name="password_confirmation">
                <label class="label">
                    <input type="checkbox" class="checkbox" name="remember">
                    Remember me
                </label>
                <input type="submit" value="Login" class="btn btn-neutral mt-4">
            </fieldset>
        </form>
    </div>
</x-layouts.guest>

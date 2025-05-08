<div>

    <div class="text-center w-75 m-auto">
        <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
        <p class="text-muted mb-4">Enter your email address and password to login</p>
    </div>

    <form wire:submit='login()'>

        {{-- Email --}}
        <div class="mb-3">
            <label for="emailAddress" class="form-label">Email
                @error('form.email')
                    <code class="text-danger">{{ $message }}</code>
                @enderror
            </label>
            <input class="form-control" type="email" id="emailAddress" placeholder="Enter your Email"
                wire:model='form.email'>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password
                @error('form.password')
                    <code class="text-danger">{{ $message }}</code>
                @enderror
            </label>
            <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" placeholder="Enter your password"
                    wire:model='form.password'>
                <div class="input-group-text" data-password="false" wire:ignore>
                    <span class="password-eye"></span>
                </div>
            </div>
        </div>

        <div class="mb-3 mb-3">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="checkbox-signin" wire:model='form.remember' >
                <label class="form-check-label" for="checkbox-signin">Remember me</label>
            </div>
        </div>

        <div class="mb-3 mb-0 text-center">
            <button class="btn btn-primary" type="submit"> Log In </button>
        </div>

    </form>

    <x-slot:bottom>
        <p class="text-muted">Don't have an account?
            <a href="{{ route('register') }}" class="text-muted ms-1">
                <b>Register</b>
            </a>
        </p>
    </x-slot:bottom>

</div>

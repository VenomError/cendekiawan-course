<div>

    <div class="text-center w-75 m-auto">
        <h4 class="text-dark-50 text-center pb-0 fw-bold">Register</h4>
        <p class="text-muted mb-4"></p>
    </div>

    <form wire:submit='register()'>

        {{-- Name --}}
        <div class="mb-3">
            <label for="fullName" class="form-label">Full Name
                @error('form.name')
                    <code class="text-danger">{{ $message }}</code>
                @enderror
            </label>
            <input class="form-control" type="text" id="fullName"  placeholder="Enter your Full Name"
                wire:model='form.name'>
        </div>
        {{-- Email --}}
         <div class="mb-3">
            <label for="emailAddress" class="form-label">Email
                @error('form.email')
                    <code class="text-danger">{{ $message }}</code>
                @enderror
            </label>
            <input class="form-control" type="email" id="emailAddress"  placeholder="Enter your Email"
                wire:model='form.email'>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password
                @error('form.password')
                    <code class="text-danger">{{ $message }}</code>
                @enderror
            </label>
            <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" placeholder="Enter your password" wire:model='form.password' >
                <div class="input-group-text" data-password="false" wire:ignore>
                    <span class="password-eye"></span>
                </div>
            </div>
        </div>

        <div class="mb-3 mb-0 text-center">
            <button class="btn btn-primary" type="submit"> Register </button>
        </div>

    </form>

    <x-slot:bottom>
        <p class="text-muted">Already have an account?
            <a href="{{ route('login') }}" class="text-muted ms-1">
                <b>Log In</b>
            </a>
        </p>
    </x-slot:bottom>

</div>

<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password" required>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" name="remember" id="remember">
        <label class="form-check-label" for="remember">Remember Me</label>
    </div>
    <button type="submit" class="btn btn-primary w-100">Login</button>
</form>

<form id="registerForm" method="POST" action="{{ route('register') }}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name" required>
        <div id="name-error" class="invalid-feedback"></div>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" required>
        <div id="email-error" class="invalid-feedback"></div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password" required>
        <div id="password-error" class="invalid-feedback"></div>
    </div>
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
        <div id="password_confirmation-error" class="invalid-feedback"></div>
    </div>
    <button type="submit" class="btn btn-primary w-100">Register</button>
</form>

<script>
    $(document).ready(function() {
        $('#registerForm').off('submit').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
            var formData = $(this).serialize(); // Serialize form data

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                success: function(response) {
                    window.location.reload();
                },
                error: function(response) {
                if (response.status == 422) { // Validation Error
                    var errors = response.responseJSON.errors;
                    $.each(errors, function(key, items) {
                        var inputField = $('#' + key);
                        var errorField = $('#' + key + '-error');
                        errorField.text(items[0]).show();
                        inputField.addClass('is-invalid');
                    });
                } else {
                    alert('An error occurred. Please try again.');
                }
            }
            });
        });
    });
</script>
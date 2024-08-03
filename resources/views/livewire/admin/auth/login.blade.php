<div style="width: 30rem;" wire:ignore>

    <!-- phone input -->
    <div class="input-group flex-nowrap input-group-lg">
        <input type="tel" maxlength="10" class="form-control admin-phone-login-input" placeholder="Phone Number"
            aria-label="Phone Number" aria-describedby="addon-wrapping" />
        <span class="input-group-text" id="addon-wrapping">966+</span>
    </div>
    <div class="form-helper text-danger admin-phone-login-validation"></div>


    <!-- Password input -->
    <div class="input-group flex-nowrap input-group-lg mt-3">
        <input type="password" dir="ltr" maxlength="35" class="form-control admin-password-login-input"
            placeholder="Password" aria-label="Password" aria-describedby="addon-wrapping" />
        <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
    </div>
    <div class="form-helper text-danger admin-password-login-validation"></div>


    <div class="d-flex justify-content-between align-items-center mt-3 mb-4">
        <!-- Checkbox -->
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
            <label class="form-check-label" for="form1Example3"> تذكر بيانات الدخول </label>
        </div>
        {{-- <a href="#!">هل نسيت كلمة المرور؟</a> --}}
    </div>

    <!-- Submit button -->
    <button type="submit" data-mdb-button-init data-mdb-ripple-init
        class="btn btn-primary btn-lg btn-block admin-submit-login-button">تسجيل
        الدخول</button>

</div>


@push('admin-login-script')
    <script>
        $(document).ready(function() {

            // Values
            var $admin_phone_login_value = "";
            var $admin_password_login_value = "";

            // Inputs
            var $admin_phone_login_validation = $(".admin-phone-login-validation");
            var $admin_password_login_validation = $(".admin-password-login-validation");

            // Validations
            var $admin_phone_login_input = $(".admin-phone-login-input");
            var $admin_password_login_input = $(".admin-password-login-input");

            // Buttons
            var $admin_submit_login_button = $(".admin-submit-login-button");

            $admin_phone_login_input.on('input', function() {
                $admin_phone_login_validation.text("");
                $admin_phone_login_value = $(this).val();
            });

            $admin_password_login_input.on('input', function() {
                $admin_password_login_validation.text("");
                $admin_password_login_value = $(this).val();
            });


            $admin_submit_login_button.on('click', function() {
                let $result = admin_login_validation();

                if ($result) {
                    @this.set('phone', $admin_phone_login_value);
                    @this.set('password', $admin_password_login_value);
                    Livewire.dispatch('submitting-admin-login-data');
                }

            });


            function admin_login_validation() {
                $admin_phone_login_validation.text("");
                $admin_password_login_validation.text("");

                console.log($admin_phone_login_value);
                console.log($admin_password_login_value);
                console.log(!$admin_phone_login_value && !$admin_password_login_value);

                if (!$admin_phone_login_value && !$admin_password_login_value) {
                    $admin_phone_login_validation.text("تأكد من رقم الهاتف !");
                    $admin_password_login_validation.text("تأكد من كلمة المرور!");
                    return false;
                }

                if (!$admin_phone_login_value) {
                    $admin_phone_login_validation.text("تأكد من رقم الهاتف !");
                    return false;
                }
                if (!$admin_password_login_value) {
                    $admin_password_login_validation.text("تأكد من كلمة المرور!");
                    return false;
                }

                return true;
            }


            //Validation From DB
            Livewire.on('admin-db-login-validation', function(value) {
                let message = value[0];

                if (message.password) {
                    $admin_password_login_validation.text(message.password);
                }

                if (message.phone) {
                    $admin_phone_login_validation.text(message.phone);
                }
            });

        });
    </script>
@endpush

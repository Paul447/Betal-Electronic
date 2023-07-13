<script>
    document.title = "Betal International | Change Password"
</script>
@include('welcome')
<div class="container p-0 mb-5 main-reg mbottom">
    <form action="{{ url('/changepass') }}" class="rowww" method="post">
        @csrf
        <div class="card col-sm-10  offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 mx-auto d-flex justify-content-center mt-5 "
            id="Cardd">
            <div class="fs-2 fw-bold text-center mt-3">
                Enter New password
            </div>
            <div class="card-body px-4">
                <div class="form--item mb-2 d-flex flex-column position-relative">
                    <label for="old_passwor" class="mb-1">Old Password</label>
                    <input type="hidden" name="user_id" value="{{ Session('customer')['id'] }}">
                    <input type="password" name="old_password"
                        class="py-1 px-2 border form-control border-dark-subtle rounded-1" id="old_password">

                    <button type="button" class="btn--toggle-password bg-transparent border-0 text-center">
                        <i class="fa-solid fa-eye"></i>
                    </button>

                    @error('old_password')
                        <span class=" text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form--item mb-2 d-flex flex-column position-relative">
                    <label for="new_password" class="mb-1">New Password</label>
                    <input type="password" name="new_password"
                        class="py-1 px-2 border form-control border-dark-subtle rounded-1" id="new_password">

                    <button type="button" class="btn--toggle-password bg-transparent border-0 text-center">
                        <i class="fa-solid fa-eye"></i>
                    </button>

                    @error('new_password')
                        <span class=" text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form--item mb-2 d-flex flex-column position-relative">
                    <label for="confirm_password" class="mb-1">Confirm password</label>
                    <input type="password" name="confirm_password"
                        class="rounded-1 form-control border py-1 px-2 border-dark-subtle" id="confirm_password">

                    <button type="button" class="btn--toggle-password bg-transparent border-0 text-center">
                        <i class="fa-solid fa-eye"></i>
                    </button>

                    @error('confirm_password')
                        <span class=" text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <input type="submit" class="btn btnn btn-lg btn-block fw-bold fs-6 mx-auto w-100 mb-3 mt-4 "
                    value="Create New Password">
            </div>
        </div>
    </form>
</div>
@include('footermain')
<script>
    const togglePassword = document.querySelectorAll('.btn--toggle-password');

    togglePassword.forEach(btn => {
        btn.addEventListener('click', () => {
            const input = btn.previousElementSibling;
            if (input.type === 'password') {
                input.type = 'text';
                btn.innerHTML = `<i class="fa-solid fa-eye-slash"></i>`;
            } else {
                input.type = 'password';
                btn.innerHTML = `<i class="fa-solid fa-eye"></i>`;
            }
        })
    })
</script>

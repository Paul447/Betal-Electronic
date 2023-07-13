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

<footer>

    <section class="social_media">
        <div class="section--title">
            <h3>Social media</h3>
            <div class="divider"></div>
        </div>
        <p class="text--stay-connected mb-4">Stay connected with us</p>
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-instagram-square"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
        <p class="copyright">
            Copyright &copy; 2023. All rights reserved.
        </p>
    </section>

    <section class="legal">
        <div class="section--title">
            <h3>Legal</h3>
            <div class="divider"></div>
        </div>
        <ul>
            <li><a href="{{ '/termncondition' }}">Terms of use</a></li>
            <li><a href="{{ '/aboutbetal' }}">About Betal</a></li>
        </ul>
    </section>

    <section class="contact-us">
        <div class="section--title">
            <h3>Contact us</h3>
            <div class="divider"></div>
        </div>
        <ul>
            <li>
                <i class="fas fa-phone"></i>
                <a href="tel:9800000000">+977 011245678</a>
            </li>
            <li>
                <i class="fas fa-envelope"></i>
                <a href="mailto:info@betalinternational.com">info@betalinternational.com</a>
            </li>
        </ul>
    </section>

    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.3871419640996!2d85.32051591506202!3d27.70533068279279!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb197b3f1754c7%3A0x58f5291f731a295a!2sBetal%20International%20(Complete%20ICT%20Solution)!5e0!3m2!1sen!2snp!4v1688782528102!5m2!1sen!2snp"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>

    </div>

</footer>
<script>
   
    function payConfirm(id) {
        Swal.fire({
            title: 'Place Order',
            text: "Order Will Be Placed To The Mention Address in Shipping Detail!",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#a3dd82',
            cancelButtonColor: '#d33',
            cancelButtonText: "No, cancel!",
            confirmButtonText: 'Confirm Order'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('confirm-form-' + id).submit();
            }
        })
    }

    function cancelOrder(id) {
        Swal.fire({
            title: 'Cancel Order',
            text: "Are You Sure Want to Cancel Order!!",
            icon: 'danger',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Cancel Order'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('cancel-order-' + id).submit();
            }
        })
    }
    const showToastButton = document.querySelectorAll(".show-toast");
    var toast = document.querySelector('.toast');
    showToastButton.forEach((btnToast, i) => {
        btnToast.addEventListener("click", (e) => {
            Toast.fire({
                icon: 'info',
                title: 'Please Login First to Countinue'
            })
        })
    });
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

    function fetchDistrict(province) {
        var controller = "/getDistrict/";
        var host = location.origin + controller;
        var url = location.origin + controller + province;
        fetch(url, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                },
            })
            .then(response => response.json())
            .then(response => {
                let html = `<option selected disabled value="">Select</option>`;
                for (const x of response.districts) {
                    html += `<option value="${x.district_id}">${x.district}</option>`;
                }
                document.getElementById('district').innerHTML = html;
            })
    }

    function fetchMunicipalities(district) {

        var controller = "/getMunicipality/";
        var host = location.origin + controller;
        var url = location.origin + controller + district;

        fetch(url, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                },
            })
            .then(response => response.json())
            .then(response => {
                let html = `<option selected disabled value="">Select</option>`;
                for (const x of response.municipalitites) {
                    html += `<option value="${x.municipalities_id}">${x.municipalities}</option>`;
                }
                document.getElementById('municipality').innerHTML = html;
            })
    }
</script>

@if (session('uifail'))
    <script>
        Toast.fire({
            icon: 'error',
            title: '{{ session('uifail') }}'
        })
    </script>
    @php
        session()->forget('uifail');
    @endphp
@endif


@if (session('uiinfo'))
    <script>
        Toast.fire({
            icon: 'info',
            title: '{{ session('uiinfo') }}'
        })
    </script>
    @php
        session()->forget('uiinfo');
    @endphp
@endif

@if (session('uisuccess'))
    <script>
        Toast.fire({
            icon: 'success',
            title: '{{ session('uisuccess') }}'
        })
    </script>
    @php
        session()->forget('uisuccess');
    @endphp
@endif


{{-- Only For payment status --}}
@if (session('SuccessfullyPaid'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '{{ session('SuccessfullyPaid') }}',
        })
    </script>
    @php
        session()->forget('SuccessfullyPaid');
    @endphp
@endif

@if (session('UnsuccessfullyPaid'))
    <script>
        Swal.fire({
            icon: 'error',
            title: '{{ session('UnsuccessfullyPaid') }}',
        })
    </script>
    @php
        session()->forget('UnsuccessfullyPaid');
    @endphp
@endif
{{-- Till here --}}

</body>

</html>

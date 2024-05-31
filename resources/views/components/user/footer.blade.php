<footer class="footer w-full h-auto mt-auto py-3 bg-dark bottom-0">
    <div class="container">
        <div class="mt-2 mb-4 text-center">
            <h1 class="text-white ">PISANG BOLEN</h1>
        </div>
        <div class="row">
            <div class="col-md-6 text-center">
                <div class="">
                    <div class="text-white mx-auto">
                        <iframe class="rounded-4 text-center w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2799.4224167673055!2d111.75281151336098!3d-7.128176713928973!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e777bac15c6cea3%3A0x25a564813257219b!2sBolen%20Jonegoroan!5e0!3m2!1sid!2sid!4v1717144711413!5m2!1sid!2sid" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mx-auto text-center">
                <!-- <h1 class="text-center text-white fw-bold">Pisang Bolen</h1> -->
                <div class="ms-4 text-start text-white">
                    <div class="d-flex align-items-center my-2">
                        <i class="fa-solid fa-phone fa-xl me-2"></i>
                        <p class="isi_contact mb-1 ms-3 fs-5">+62 123-4567-7890</p>
                    </div>
                    <div class="d-flex align-items-center my-2">
                        <i class="fa-brands fa-whatsapp fa-2xl me-2"></i>
                        <p class="isi_contact mb-1 ms-3 fs-5">+62 123-4567-7890</p>
                    </div>
                    <div class="d-flex align-items-center my-2">
                        <i class="fa-regular fa-envelope fa-xl me-2"></i>
                        <p class="isi_contact mb-1 ms-4 fs-5">
                            pisangBolen@gmail.com
                        </p>
                    </div>
                    <div class="d-flex align-items-center my-2">
                        <i class="fa-solid fa-location-dot fa-xl me-3 mb-5"></i>
                        <p class="isi_contact mb-1 ms-4 fs-5">
                            KEPEL, RT/RW 009/004, Kel, Desa, Brenggolo, Kec. Kalitidu,
                            Kabupaten Bojonegoro, Jawa Timur 62152
                        </p>
                    </div>
                </div>

                @if(auth()->check())
                <form action="{{ route('dasbhoard_admin.store') }}" method="POST">
                    @csrf
                    <div class="text-center mb-1">
                        <div class="text-start">
                            <label for="saran" class="ms-5 label_saran text-warning fs-5">Berikan Masukan Tentang Website ini </label>
                        </div>
                        <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="name_user" value="{{ auth()->user()->name }}">
                        <input type="text" class="input_saran w-75 py-1 px-1 mx-0 rounded" name="saran" id="saran" placeholder="Masukan Saran Anda" required>
                        <button type="submit" class="button_saran py-1 px-2 bg-warning rounded">Kirim</button>
                    </div>
                </form>
                @else
                <form action="" method="POST">
                    @csrf
                    <div class="text-center mb-1">
                        <div class="text-start">
                            <label for="saran" class="ms-5 label_saran text-warning fs-5">Berikan Masukan Tentang Website ini </label>
                        </div>
                        <input type="text" class="input_saran w-75 py-1 px-1 mx-0 rounded bg-white" name="saran" id="saran" placeholder="Masukan Saran Anda" required disabled>
                        <a href="{{ route('login') }}" class="btn button_saran border-1 border-black btn-md btn-warning mb-1 py-1 px-2 bg-warning rounded">Kirim</a>
                    </div>
                </form>
                @endif

            </div>
        </div>
    </div>
    <div class="text-center mt-2">
        <div class="text-center mt-2 d-inline-flex align-items-center icon-container text-white">
            <div class="rounded-circle bg-transparent border border-white mx-2 px-1 py-1">
                <i class="fa-brands mx-1 fa-instagram fa-lg"></i>
            </div>
            <div class="rounded-circle bg-transparent border border-white mx-2 px-1 py-1">
                <i class="fa-brands mx-1 fa-tiktok fa-lg"></i>
            </div>
            <div class="rounded-circle bg-transparent border border-white mx-2 px-1 py-1">
                <i class="fa-brands mx-1 fa-x-twitter fa-lg"></i>
            </div>
        </div>
    </div>
</footer>
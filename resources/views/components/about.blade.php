<section class="section" id="about-us">
    <div class="container">
        <div class="row">

            @if (request()->routeIs('index'))
            <div class="col-12 text-center">
                <h2 class="section-title">Tentang Kami</h2>
            </div>
            <div class="col-lg-10 mx-auto text-center">
                <p class="font-secondary paragraph-lg text-dark">
                    Semua dimulai dari mimpi …
                </p>
                <p class="font-secondary paragraph-lg text-dark">
                    Dengan semakin meningkatnya kebutuhan konsumen untuk spring bed berkualitas dengan harga terjangkau,
                    kami ingin memberikan pengalaman tidur yang tidak terlupakan untuk para konsumen. Kita semua
                    menghabiskan sepertiga waktu kita untuk tidur, oleh karena itu sangat penting untuk bisa menikmati
                    tidur berkualitas setiap malamnya. Dengan tidur berkualitas, kita akan bisa memulai dan menikmati
                    hari kita dengan segar dan optimal.

                </p>
                <a href="{{route('aboutUs')}}" class="btn btn-primary">Selengkapnya</a>
            </div>

            @else
            <div class="col-lg-10">
                <h3>Semua dimulai dari mimpi …</h3>

                <p>
                    Dengan semakin meningkatnya kebutuhan konsumen untuk spring bed berkualitas dengan harga terjangkau,
                    kami ingin memberikan pengalaman tidur yang tidak terlupakan untuk para konsumen. Kita semua
                    menghabiskan sepertiga waktu kita untuk tidur, oleh karena itu sangat penting untuk bisa menikmati
                    tidur
                    berkualitas setiap malamnya. Dengan tidur berkualitas, kita akan bisa memulai dan menikmati hari
                    kita
                    dengan segar dan optimal.
                </p>

                <p>
                    Didasari dengan pengalaman di dunia spring bed selama lebih dari 30 tahun, kami mulai merajut mimpi
                    kami
                    untuk memberikan pengalaman tidur terbaik untuk Anda, para konsumen kami. Karena itu, kami memulai
                    dengan mendatangkan mesin-mesin terbaik di dunia dengan kombinasi teknologi Jerman dan Italia karena
                    Good Sleep adalah Good Day, karena segala kelebihannya memang untuk kenyamanan Anda.
                </p>

                <p>
                    Kami memproduksi Maya Spring Bed sejak tahun 2015 di Jawa Timur. Sejak awal tahun 2020, kami
                    memindahkan
                    lokasi pabrik dari Jawa Timur ke Jawa Tengah supaya lebih mendekatkan diri dengan para konsumen
                    kami.
                    Dengan semboyan Good Sleep, Good Day, kami mempunyai visi untuk menciptakan pengalaman tidur yang
                    lebih
                    baik setiap harinya. Dimulai dari mimpi, ditopang dengan tekad dan semangat, kami ingin menjadi
                    bagian
                    sejarah bangsa Indonesia yang memberikan kontribusi terhadap kesehatan masyarakat melalui tidur
                    berkualitas.
                </p>

                <p>
                    Untuk mencapai hal diatas, misi kami adalah menjangkau semakin banyak masyarakat Indonesia untuk
                    bisa
                    merasakan spring bed berkualitas dengan harga terjangkau. Maya Spring Bed adalah satu-satunya spring
                    bed
                    di Indonesia dengan garansi pegas 25 tahun. Maya Spring Bed juga satu-satunya merk di Indonesia dan
                    Asia
                    yang menggunakan mesin Mammut teknologi Jerman dan mesin Fides Italia.
                </p>
            </div>
            @endif
        </div>
    </div>
</section>

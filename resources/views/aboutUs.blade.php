<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            About Us
        </h2>
    </x-slot>

    <div class=" flex flex-wrap mx-auto justify-between px-16 mt-10">
        <x-about-us-card>
            <x-slot name="foto">{{ asset('img/Dandy.jpeg') }}</x-slot>
            <x-slot name="nim">235150600111012</x-slot>
            <x-slot name="nama">Dandy Al-Farisi Natanegara</x-slot>
            <x-slot name="deskripsi">Seorang mahasiswa jurusan pendidikan teknologi informasi angkatan 23 fakultas
                ilmu komputer universitas brawijaya. Dirinya suka banget main roblox. Dulu pas SMA jago banget main
                Clash Royale sampe pernah ngejokiin ranknya temen. Beliau sekarang jadi fansnya JKT 48 dari tahun
                2020, salah satu oshinya yaitu Zee JKT48😘. Dia sekarang suka banget pelajaran jaringan komputer pas
                kuliah dan cita citanya pingin jadi mobile developer. Anaknya terkenal pendiam sih tapi sebenarnya
                baik kok😇</x-slot>
        </x-about-us-card>

        <x-about-us-card>
            <x-slot name="foto">{{ asset('img/Risma.jpeg') }}</x-slot>
            <x-slot name="nim">1000</x-slot>
            <x-slot name="nama">Risma Aullia Zairull Ikhrom</x-slot>
            <x-slot name="deskripsi">Helow nama aku Risma Aullia Zairull Ikhrom, tapi gasuka dipanggil Risma sukanya
                Ima. Aku tuh suuuuka banget baca Webtoon, udah kayak ritual harian, dan punya goal buat taun ini baca
                5000 episode. OIYA spotipi wrapped kemaren gweh masuk top 0.005% listeners The Black Skirts dong angzay
                😎🫵, ai lov TBS. Sekarang lagi sibuk volunteeran dan ngerajut biar ga galo terus.</x-slot>
        </x-about-us-card>

        <x-about-us-card>
            <x-slot name="foto">{{ asset('img/Bilal.jpeg') }}</x-slot>
            <x-slot name="nim">235150607111001</x-slot>
            <x-slot name="nama">Bilal</x-slot>
            <x-slot name="deskripsi">Seorang mahasiswa jurusan pendidikan teknologi informasi angkatan 23 fakultas ilmu
                komputer universitas brawijaya. Jauh jauh dari tanjung enim sumatra merantau ke malang untuk kuliah.
                Sama sih kayak anak PTI lainnya yang ngiranya gampang masuk PTI, ternyata susah. Pelajarannya berat
                berat ternyata. Tapi gak pa pa anak ini tetep semangat untuk lulus. Anaknya ini pendiam sih tapi
                sebenarnya baik.</x-slot>
        </x-about-us-card>

    </div>

</x-app-layout>

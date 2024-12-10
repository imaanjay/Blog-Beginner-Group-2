 <div class="bg-white border rounded-xl max-w-md">
        <div class="flex items-center px-4 py-3">
            <img class="h-8 w-8 rounded-full" src="{{ asset('img/logo-ub.jpeg') }}" />
            <div class="ml-3 ">
                <span class="text-sm font-semibold antialiased block leading-tight">Universitas Brawijaya</span>
                <span class="text-gray-600 text-xs block">Fakultas Ilmu Komputer</span>
            </div>
        </div>
        <img src="{{ $foto }}" class="w-[30rem]" />
        <div class="flex items-center justify-between mx-4 mt-3 mb-2">
            <div class="flex gap-5">
                <a href="#">
                    <img src="img/linkedin.svg" alt="facebook" class="h-8" />
                </a>
                <a href="#">
                    <img src="img/github.svg" alt="twitter" class="h-8" />
                </a>
                <a href="#">
                    <img src="img/x.svg" alt="instagram" class="h-8" />
                </a>
            </div>
            <div class="flex">
                <svg fill="#262626" height="24" viewBox="0 0 48 48" width="24">
                    <path
                        d="M43.5 48c-.4 0-.8-.2-1.1-.4L24 29 5.6 47.6c-.4.4-1.1.6-1.6.3-.6-.2-1-.8-1-1.4v-45C3 .7 3.7 0 4.5 0h39c.8 0 1.5.7 1.5 1.5v45c0 .6-.4 1.2-.9 1.4-.2.1-.4.1-.6.1zM24 26c.8 0 1.6.3 2.2.9l15.8 16V3H6v39.9l15.8-16c.6-.6 1.4-.9 2.2-.9z">
                    </path>
                </svg>
            </div>
        </div>
        <div class="font-semibold text-sm mx-4 mt-2 mb-4">
            <p>
                {{ $nim }} likes
            </p>
            <p>{{ $nama }}</p>
            <p class="font-normal">{{ $deskripsi }}</p>
        </div>
    </div>

@extends('layouts.app')

@section('title', $concert->title)

@section('content')
<div class="w-full bg-gray-900 text-white">
    <!-- Hero image -->
    <div class="max-w-7xl mx-auto">
        <img src="{{ $concert->image_url }}" alt="{{ $concert->title }}" class="w-full h-72 object-cover">
    </div>

    <!-- Tabs -->
    <div class="max-w-4xl mx-auto px-6" x-data="{ tab: 'description', auth: @json(Auth::check()) }">
        <div class="flex items-center justify-center mt-6 space-x-10 text-sm uppercase text-purple-400">
            <button type="button" @click="tab = 'description'" :class="tab === 'description' ? 'border-b-2 border-purple-500 pb-2' : 'opacity-70'">Description</button>
            <button type="button" @click="tab = 'ticket'" :class="tab === 'ticket' ? 'border-b-2 border-purple-500 pb-2' : 'opacity-70'">Ticket</button>
        </div>

        <!-- Info row: organizer | location | date/time -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-10 items-center text-gray-300">
            <div class="flex items-center space-x-4">
                <img src="{{ $concert->image_url }}" alt="organizer" class="h-12 w-12 rounded-full object-cover">
                <div class="text-white font-medium">{{ $concert->organizer }}</div>
            </div>

            <div class="flex items-center justify-center space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 12.414a4 4 0 10-5.657 5.657l4.243 4.243A8 8 0 1017.657 16.657z" />
                </svg>
                <div class="text-white">{{ $concert->location }}</div>
            </div>

            <div class="flex flex-col items-end">
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3M3 11h18M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <div>{{ \Illuminate\Support\Carbon::parse($concert->date)->format('d F Y') }}</div>
                </div>
                <div class="mt-2 text-gray-300 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-400 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11V6a1 1 0 10-2 0v4a1 1 0 00.293.707l2 2a1 1 0 001.414-1.414L11 9z" clip-rule="evenodd" />
                    </svg>
                    <div>19.00 - 22.00 WIB</div>
                </div>
            </div>
        </div>

        <hr class="my-8 border-gray-700">

        <!-- Tab contents -->
        <div>
            <!-- Description tab -->
            <div x-show="tab === 'description'" x-cloak class="text-gray-300 leading-relaxed">
                {{-- Use the concert description if provided, otherwise show a detailed default description --}}
                @if(!empty($concert->description))
                    {!! nl2br(e($concert->description)) !!}
                @else
                    <h3 class="text-white text-2xl font-semibold mb-4">Deskripsi</h3>
                    <p class="mb-4">Punokawan & Mukarakat Hadirkan Semangat Hiphop ke Bali, Malang, dan Semarang. Budaya hiphop Indonesia kembali menggema lewat gelaran "YUK MARI HIPHOP", sebuah tour musik yang menghadirkan dua kolektif hiphop berpengaruh, Punokawan dan Mukarakat. Acara ini akan digelar di tiga kota besar, menghadirkan energi dan pesan positif yang menjadi ciri khas dari pergerakan hiphop tanah air.</p>

                    <p class="mb-4">"YUK MARI HIPHOP" bukan sekadar pertunjukan musik, tapi juga sebuah perayaan solidaritas dan ekspresi. Punokawan dan Mukarakat akan membawakan karya-karya terbaik mereka yang sarat dengan pesan sosial, semangat kebersamaan, dan refleksi kehidupan urban yang dekat dengan keseharian masyarakat. Melalui tour ini, keduanya ingin mengajak publik untuk lebih mengenal nilai dan semangat di balik budaya hiphop Indonesia — sebuah gerakan yang tidak hanya berbicara soal musik, tetapi juga soal identitas, perjuangan, dan kreativitas tanpa batas.</p>

                    <p class="mb-4">Acara ini terbuka untuk umum dan menjadi wadah bagi komunitas hiphop, pecinta musik, hingga generasi muda untuk saling terhubung dan merayakan keberagaman dalam satu frekuensi. Selain penampilan musik, pengunjung dapat menantikan penampilan kolaboratif, workshop singkat, serta panggung seni yang mempromosikan talenta lokal.</p>

                    <p class="mb-4">Spectacular staging, production dan pyrotechnics akan menambah dimensi visual pada pengalaman menonton. Penyelenggara berkomitmen menyajikan acara dengan standar keselamatan dan kenyamanan penonton yang tinggi, termasuk pengaturan jalur masuk, keamanan, serta fasilitas pendukung di lokasi.</p>

                    <h4 class="text-white text-xl font-semibold mt-6 mb-3">Syarat &amp; Ketentuan</h4>
                    <ol class="list-decimal list-inside text-gray-300 space-y-2 text-sm">
                        <li>Entry Pass yang valid adalah yang dibeli melalui kanal resmi (mis. platform penjualan resmi).</li>
                        <li>Satu Entry Pass berlaku untuk satu orang dan hanya dapat digunakan sekali pada tanggal acara yang tertera.</li>
                        <li>Panitia dan Promotor tidak bertanggung jawab atas pembelian melalui calo atau kanal tidak resmi.</li>
                        <li>Tiket yang hilang atau dicuri tidak dapat diganti atau diterbitkan ulang tanpa bukti pembelian yang valid.</li>
                        <li>Panitia, Promotor, dan Pengisi Acara tidak bertanggung jawab atas biaya transportasi atau akomodasi yang telah dikeluarkan penonton jika acara dibatalkan atau dipindah.</li>
                        <li>Pada keadaan force majeure (bencana alam, wabah, keadaan darurat), panitia berhak mengubah waktu, tempat, atau membatalkan acara sesuai ketentuan yang berlaku.</li>
                        <li>Promotor berhak merevisi jadwal, tata letak tempat, dan kapasitas penonton tanpa pemberitahuan sebelumnya jika diperlukan demi keselamatan dan kelancaran acara.</li>
                        <li>Jika acara dibatalkan, pengembalian dana diatur oleh promotor sesuai kebijakan yang diinformasikan resmi. Biaya administrasi bank atau biaya lainnya mungkin dikenakan.</li>
                    </ol>
                        <h4 class="text-white text-xl font-semibold mt-6 mb-3">Barang yang Tidak Diperbolehkan</h4>
                        <ul class="list-disc list-inside text-gray-300 space-y-2 text-sm">
                            <li>Tidak membawa atribut/bendera/identitas dari kelompok sepak bola, politik, ras dan agama.</li>
                            <li>Makanan dan minuman dari luar ke dalam acara.</li>
                            <li>Kamera profesional seperti Drone, SLR, DSLR tanpa izin resmi.</li>
                            <li>Tongsis atau Selfie Stick.</li>
                            <li>Minuman beralkohol, obat-obatan terlarang, psikotropika, atau barang yang mengandung zat berbahaya lainnya.</li>
                            <li>Senjata tajam/api, bahan peledak, dan benda-benda yang dilarang menurut peraturan perundang-undangan yang berlaku.</li>
                            <li>Cairan dan benda yang mudah terbakar.</li>
                            <li>Tas atau ransel berukuran besar (bisa ditahan/diteriksa oleh petugas keamanan).</li>
                            <li>Laser dan pointer.</li>
                            <li>Barang yang berbahaya untuk orang lain maupun diri sendiri walaupun tidak disebutkan pada peraturan di atas.</li>
                        </ul>

                        <p class="text-gray-300 text-sm mt-4">Pihak promotor/penyelenggara acara berhak mengambil, menyita dan tidak mengembalikan kepada penonton jika ditemukan barang terlarang saat pengecekan barang. Dilarang membuat kerusuhan dalam situasi apapun di dalam area event.</p>

                        <p class="text-white font-bold mt-6">SAYA TELAH MEMBACA DAN MEMAHAMI SYARAT DAN KETENTUAN PEMBELIAN DAN PENGGUNAAN ENTRY PASS DI ATAS. DAN JIKA ADA PERUBAHAN ATURAN PROMOTOR, AKAN SEGERA DIINFORMASIKAN DI AKUN MEDIA SOSIAL PROMOTOR DAN SAYA MEMBERIKAN PERSETUJUAN SAYA UNTUK DIKONTRAKKAN SECARA HUKUM DENGAN SYARAT DAN KETENTUAN.</p>
                @endif
            </div>

            <!-- Ticket tab -->
            <div x-show="tab === 'ticket'" x-cloak class="text-gray-300">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gray-800 p-6 rounded-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-sm text-gray-400">General Admission</div>
                                <div class="text-xl font-bold text-white">Rp. {{ number_format($concert->price, 0, ',', '.') }}</div>
                            </div>
                            <div class="text-sm text-gray-400">Qty</div>
                        </div>

                        <div class="mt-4">
                            <label class="sr-only">Quantity</label>
                            <select class="w-24 bg-gray-700 text-white rounded-md p-2">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>

                        <div class="mt-6">
                            <button @click.prevent="if(!auth) { window.location='{{ route('login') }}' } else { alert('Purchase flow not implemented yet.'); }" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md">Buy Ticket</button>
                        </div>
                    </div>

                    <div class="bg-gray-800 p-6 rounded-lg">
                        <h4 class="text-white font-semibold mb-2">Order Summary</h4>
                        <div class="text-sm text-gray-400">Ticket: General Admission</div>
                        <div class="text-sm text-gray-400">Price: Rp. {{ number_format($concert->price, 0, ',', '.') }}</div>
                        <div class="mt-4 text-white font-bold">Total: Rp. {{ number_format($concert->price, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

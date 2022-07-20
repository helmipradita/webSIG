@extends('layouts.main')

@section('content')
    <h1>Halaman Beranda</h1>    

    <div id="map" style="width: 100%; height: 400px;"></div>

    <div class="row mt-4" style="margin-bottom: 60px">
        <div class="col-md-8">
            <h5>Tentang WebSIG:</h5>
            <hr>
            <p>WebSIG ini adalah sebuah website untuk penyedia informasi tentang titik lokasi Toko Penjual Sayur Segar di Kota Mojokerto. Website ini dapat digunakan untuk membantu masyarakat Kota Mojokerto agar dapat mendapatkan informasi seputar Sayur Segar seperti mendapatkan lokasi toko Penjual Sayur Segar, lalu mendapatkan informasi harga Sayur Segar, informasi kontak penjual sayur segar, dan juga pemetaan Toko Penjual Sayur Segar dari tiap Kecamatan di Kota Mojokerto.</p>
            <p>Tujuan dibuat untuk sarana informasi dan promosi bagi Penjual Sayur Segar yang ada di Kota Mojokerto, dengan menggunakan sistem Sistem Informasi Geografis (SIG) dapat melakukan pemetaan dari tiap Kecamatan di Kota Mojokerto sehingga dapat lebih cepat dalam pencarian data Toko, serta dapat menampilkan informasi berupa gambar tampak depan lalu informasi kontak dan harga terbaru dari Toko Penjual Sayur Segar.</p>
            <p></p>
        </div>
        <div class="col-4">
            <h5>Filter Toko berdasarkan Kecamatan:</h5>
            <hr>
            @foreach ($kecamatan as $data)
                <li><a href="/kecamatan/{{ $data->id_kecamatan }}" class="text-decoration-none">{{ $data->kecamatan }}</a></li>
            @endforeach
        </div>
    </div>
  
    <script>
        var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11'
            });

        var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/satellite-v9'
            });


        var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            });

        var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/dark-v10'
            });

        @foreach ($kecamatan as $data)
            var data{{ $data->id_kecamatan }} = L.layerGroup(); 
        @endforeach
        
        var map = L.map('map', {
            center: [-7.470978040905679, 112.44103322529277],
            zoom: 14,
            layers: [peta1, 
            @foreach ($kecamatan as $data)
                data{{ $data->id_kecamatan }},
            @endforeach
        ]
        });

        var baseMaps = {
            "Graysalce": peta1,
            "Satelite": peta2,
            "Street": peta3,
            "Dark": peta4,
        };

        var overLayer = {
            @foreach ($kecamatan as $data)
                "{{ $data->kecamatan }}" : data{{ $data->id_kecamatan }},
            @endforeach
        };

        L.control.layers(baseMaps, overLayer).addTo(map);

        @foreach($kecamatan as $data)
            L.geoJSON({!! $data->geojson !!}, {
                style: {
                    color: 'black',
                    fillColor: '{{ $data->warna }}',
                    fillOpacity: 0.5,
                },
            }).addTo( data{{ $data->id_kecamatan }});
        @endforeach

        @foreach($tempat as $data)
            var informasi = '<table class="table table-bordered"><tr><td colspan="2"><img src="{{ asset('storage/'. $data->foto) }}" width="250px"></td></tr><tbody><tr><td>Nama Tempat</td><td style="text-bold"><span style="font-weight:bold">{{ $data->nama_tempat }}</span></td></tr><tr><td>Kecamatan</td><td><span style="font-weight:bold">{{ $data->kecamatan }}</span></td></tr><tr><td colspan="2" class="text-center text-black"><a href="/detailtempat/{{ $data->id_tempat }}" class="btn btn-outline-secondary btn-sm">Detail</td></tr></tbody></table>';
        
            L.marker([{!! $data->posisi !!}])
            .addTo(map)
            .bindPopup(informasi);
        @endforeach
    </script>
@endsection

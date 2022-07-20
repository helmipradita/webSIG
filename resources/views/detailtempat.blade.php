@extends('layouts.main')

@section('content')
<div >
    <a href="{{ URL::previous() }}" class="text-decoration-none">
        <span data-feather="arrow-left"></span>
            Kembali
    </a>
</div>
    <h1>Halaman Detail Tempat: {{ $tempat->nama_tempat }}</h1>    

    <div class="row">
        <div class="col-md-6">
            <div id="map" style="width: 100%; height: 400px;"></div>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('storage/'. $tempat->foto) }}" width="400px">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mt-3">
            <h5>Nama Tempat:</h5>{{ $tempat->nama_tempat }}
            <hr>
        </div>
        <div class="col-md-4 mt-3">
            <h5>Kecamatan: </h5>{{ $tempat->nama_tempat }}
            <hr>
        </div>
        <div class="col-md-4 mt-3">
            <h5>Alamat:</h5>{{ $tempat->alamat }}
            <hr>
        </div>
        <div class="col-md-12 mt-3">
            <h5>Deskirpsi: </h5>{{ $tempat->deskripsi }}
            <hr>
        </div>
        <div class="col-md-12 mb-4">
            buka di maps untuk melihat rute: <a href="https://www.google.com/maps/place/{{ $tempat->posisi }}">cek</a>
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
    
        var map = L.map('map', {
            center: [{{ $tempat->posisi }}],
            zoom: 16,
            layers: [peta1],
        });
    
        var baseMaps = {
            "Graysalce": peta1,
            "Satelite": peta2,
            "Street": peta3,
            "Dark": peta4,
        };
    
        L.control.layers(baseMaps).addTo(map);
    
        L.marker([{!! $tempat->posisi !!}])
        .addTo(map)
    
    </script>
@endsection

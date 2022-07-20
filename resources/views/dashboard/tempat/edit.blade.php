@extends('dashboard.layouts.main')

@section('content')
    <div class="mb-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Tempat</h1>
        </div>
        <div class="">
            <form action="/dashboard/tempat/update/{{ $tempat->id_tempat }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="nama_tempat">Nama Tempat</label>
                        <input type="text" name="nama_tempat" id="nama_tempat" class="form-control @error('nama_tempat') is-invalid @enderror" value="{{ old('nama_tempat', $tempat->nama_tempat) }}" required autofocus>
                        @error('nama_tempat')
                            <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="id_kecamatan" class="form-label">Kecamatan</label>
                        <select name="id_kecamatan" id="id_kecamatan" class="form-control" class="form-control @error('nama_tempat') is-invalid @enderror" required>
                            <option value="{{ old('id_kecamatan', $tempat->id_kecamatan) }}" >{{ $tempat->kecamatan }}</option>
                            @foreach ($kecamatan as $data)
                                <option value="{{ $data->id_kecamatan }}">{{ $data->kecamatan }}</option>
                            @endforeach
                        </select>
                        @error('id_kecamatan')
                            <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
                        @enderror
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="3">{{ old('alamat', $tempat->alamat) }}</textarea>
                        @error('alamat')
                            <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="posisi">Posisi</label>
                        <input type="text" name="posisi" id="posisi" class="form-control" value="{{ old('posisi', $tempat->posisi) }}" readonly>
                        @error('posisi')
                            <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="foto">Foto</label>
                        <input type="hidden" name="oldImage" value="{{ $tempat->foto }}">
                        <input type="file" name="foto" id="foto" class="form-control" accept="image/jpeg,image/png">
                        @error('foto')
                            <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
                        @enderror
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3">{{ old('deskripsi', $tempat->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
                        @enderror
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="map" class="form-label">Map</label>
                    <div id="map" style="width: 100%; height: 300px;"></div>
                </div>
                <button type="submit" class="btn btn-primary">{{ $submit }}</button>
                
                <a class="text-danger mx-3" href="{{ route('tempat.index') }}">Cancel</a>
            </form>
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
            zoom: 14,
            layers: [peta1],
        });
    
        var baseMaps = {
            "Graysalce": peta1,
            "Satelite": peta2,
            "Street": peta3,
            "Dark": peta4,
        };
    
        L.control.layers(baseMaps).addTo(map);
    
        //Get titik koordinat
        var curLocation = [{{ $tempat->posisi }}];
        map.attributionControl.setPrefix(false);
    
        var marker = new L.marker(curLocation,{
            draggable : 'true',
        });
        map.addLayer(marker);
    
        //Get koordinat saat marker di drag n drop
        marker.on('dragend', function(event) {
            var position = marker.getLatLng();
            marker.setLatLng(position, {
                draggable : 'true',
            }).bindPopup(position).update();
            $("#posisi").val(position.lat + "," + position.lng).keyup();
        });
    
        //Get koordinat saat map diklik
        var posisi = document.querySelector("[name=posisi");
        map.on("click", function(event){
            var lat = event.latlng.lat;
            var lng = event.latlng.lng;
    
            if (!marker) {
                marker = L.marker(event.latlng).addTo(map);
            }else{
                marker.setLatLng(event.latlng);
            }
            posisi.value = lat + "," + lng;
        });
    
    </script>
@endsection
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  
  <link rel="stylesheet" href="{{ asset('style/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('style/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
  <script src="{{ secure_asset('style/dist/js/leaflet.ajax.min.js') }}"></script>
  <style>
    #mapsku{
        height: 100vh;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Semua Klinik</a></li>
              <li class="breadcrumb-item active">Peta Semua Klinik</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="mapsku mw-100 p-3 mh-100" id="mapsku" ></div>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Peta Klinik Purwokerto</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            {{-- <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button> --}}
          </div>
        </div>
        <div class="card-body">
            
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            All data from database
        </div>
        <!-- /.card-footer-->
      </div>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Semua titik klinik</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            {{-- <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button> --}}
          </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                   <tr>
                      <th>No</th>
                      <th>Nama Klinik</th>
                      <th>Kategori</th>
                      <th>Alamat</th>
                      <th>Latitude</th>
                      <th>Longitude</th>
                      <th>Detail</th>
                   </tr>
                </thead>
                <tbody>
                   @forelse ($data as $datum)
                   <tr>
                      <th>{{$loop->iteration}}</th>
                      <td>{{$datum->title}}</td>
                      <td>{{$datum->category_name}}</td>
                      <td>{{$datum->address}}</td>
                      <td>{{$datum->lat}}</td>
                      <td>{{$datum->long}}</td>
                      <td><button type="button" class="btn btn-primary">Detail</button></td>
                      <?php 
                   $lat = $datum->lat;
                   $lon = $datum->long;
                   $awikwok = [];
                   ?>
                   </tr>
                   @empty
                   <td colspan="6" class="text-center">Tidak ada data...</td>
                   @endforelse
                   
                </tbody>
             </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            All data from database
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('style/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('style/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('style/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('style/dist/js/demo.js') }}"></script> --}}
{{-- <script src="{{ asset('style/dist/js/mapsku.js') }}"></script> --}}
<script>
var map = L.map('mapsku').setView([-7.4301894,109.1994039], 13);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibmFuc3lpaWFoIiwiYSI6ImNsYXYwcDJ3dDAxM3Izbm83MjhkYmk3MjQifQ.UYLtCoyJU2LcBX56RYSX6g', {attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery ç <a href="https://www.mapbox.com/">Mapbox</a>', maxZoom: 18, id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, accessToken: 'your.mapbox.access.token'}).addTo(map);
var awikaa = [];
<?php foreach($data as $a){ ?>
    var marker = L.marker([<?=$a["lat"]?> ,<?=$a["long"]?>]).addTo(map).bindPopup('<?php echo $a["title"]; ?>')
    .openPopup();

<?php } ?>


function popupku(f,l) {
    var out = [];

    if(f.properties){
        for (key in f.properties){
            out.push(key+": "+f.properties[key]);
        }
        l.bindPopup(out.join("<br/>"))
    }

}
    // $.ajax({
    //         type: "GET",
    //         url: "./style/dist/js/banyumas.geojson",
    //         dataType: "json", 
    //         success: function(response) {
    //             L.geoJson(response, {
    //                 onEachFeature: popupku
    //             }).addTo(map);
    //         }
    //     }).error(function() {});

</script>
</body>
</html>

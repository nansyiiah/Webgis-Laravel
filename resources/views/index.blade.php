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
  <!-- The Modal -->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog modal-lg modal-dialog-centered">
	  <div class="modal-content">
	  
	    <!-- Modal Header -->
	    <div class="modal-header">
	      <h4 class="modal-title">Detail Klinik</h4>
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	    </div>
	    
	    <!-- Modal body -->
	    <div class="modal-body">
	      <h2 id="title"></h2>
        <h5><span class="badge badge-success" id="kategori">Success</span></h5>
        <p id="alamat"></p>
        <p>Latitude <span class="badge badge-secondary" id="latitude"></span></p>
        <p>Longitude <span class="badge badge-secondary" id="longitude"></span></p>
	    </div>
	    
	    <!-- Modal footer -->
	    {{-- <div class="modal-footer">
	      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	    </div> --}}
	  </div>
	</div>
</div>
  <!-- Content Wrapper. Contains page content -->
  <div class="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col text-center">
            <h1>Pemetaan Klinik Purwokerto</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>



    <!-- Main content -->
    <section class="content">

      <div class="mapsku mw-100 p-3 mh-100" id="mapsku" ></div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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
function openModal(title) {
  $("#marker_title").text(title);
  $("#myModal").modal("show");
  $(".navbar-collapse.in").collapse("hide");
}

<?php foreach($data as $a){ ?>
    
    var marker = L.marker([<?=$a["lat"]?> ,<?=$a["long"]?>]).addTo(map).on("click", function(event) {
      
      $("#title").text('<?=$a["title"]?>');
      $("#kategori").text('<?=$a["category_name"]?>');
      $("#alamat").text('<?=$a["address"]?>');
      $("#latitude").text('<?=$a["lat"]?>');
      $("#longitude").text('<?=$a["long"]?>');
      $("#myModal").modal("show");
      // var clickedMarker = openModal("id");
    });
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

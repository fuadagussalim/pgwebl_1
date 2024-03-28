@extends('layouts.template')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">
    <style>
        #map {
            width: 100vw;
            height: 92%;
            /* height: calc(100vh-56px); */
            margin: 0;
        }
    </style>
@endsection

@section('content')
    <div class="modal fade" id="PointModal" tabindex="-1" role="dialog" aria-labelledby="PointModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Create Point</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('store-point')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" rows=3
                                placeholder="Fill point name">
                        </div>
                        <div class="mb-3">
                            <label for="description">Description</label>

                            <textarea class="form-control" id="description" name="description" rows="3">


                            </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="geom">Geometry</label>
                            <textarea class="form-control" id="geom"
                                placeholder="$geom" name="geom" rows=3 readonly>

                            </textarea>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="PolylineModal" tabindex="-1" role="dialog" aria-labelledby="PolylineModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Create Polyline</h5>
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('store-polyline')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" rows=3
                                placeholder="Fill point name">
                        </div>
                        <div class="mb-3">
                            <label for="description">Description</label>

                            <textarea class="form-control" id="description" name="description" rows="3">


                            </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="poly-geom">Geometry</label>
                            <textarea class="form-control" id="geom_polylines"
                                placeholder="$geom" name="geom" rows=3 readonly>

                            </textarea>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="PolygoneModal" tabindex="-1" role="dialog" aria-labelledby="PolygoneModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Create Polygone</h5>
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('store-polygone')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" rows=3
                                placeholder="Fill point name">
                        </div>
                        <div class="mb-3">
                            <label for="description">Description</label>

                            <textarea class="form-control" id="description" name="description" rows="3">


                            </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="poly-geom">Geometry</label>
                            <textarea class="form-control" id="geom_polygones"
                                placeholder="$geom" name="geom" rows=3 readonly>

                            </textarea>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="map"></div>
@endsection


@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
    <script src="https://unpkg.com/terraformer@1.0.7/terraformer.js"></script>
    <script src="https://unpkg.com/terraformer-wkt-parser@1.1.2/terraformer-wkt-parser.js"></script>
    <script>
        // map
        var map = L.map('map').setView([51.505, -0.09], 13);
        // layer
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);

        var drawControl = new L.Control.Draw({
            draw: {
                position: 'topleft',
                polyline: true,
                polygon: true,
                rectangle: true,
                circle: false,
                marker: true,
                circlemarker: false
            },
            edit: false
        });

        map.addControl(drawControl);

        map.on('draw:created', function(e) {
            var type = e.layerType,
                layer = e.layer;

            console.log(type);

            var drawnJSONObject = layer.toGeoJSON();
            var objectGeometry = Terraformer.WKT.convert(drawnJSONObject.geometry);

            console.log(drawnJSONObject);
            console.log(objectGeometry);

            if (type === 'polyline') {
                // console.log("Create " + type);
                $("#geom_polylines").val(objectGeometry);
                $("#PolylineModal").modal("show");

            } else if (type === 'polygon' || type === 'rectangle') {
                $("#geom_polygones").val(objectGeometry);
                $("#PolygoneModal").modal("show");
            } else if (type === 'marker') {
                $("#geom").val(objectGeometry);
                $("#PointModal").modal("show");

                // console.log("Create " + type);
            } else {
                console.log('__undefined__');
            }

            drawnItems.addLayer(layer);
        });

        var marker = L.marker([51.5, -0.09]).addTo(map);

        var popup = L.popup()
            .setLatLng([51.513, -0.09])
            .setContent("I am a standalone popup.")
            .openOn(map);

        // marker
        // L.marker([51.505, -0.09], 13)
        // .bindPopup('Monas')
        // .openPopup();
    </script>
@endsection

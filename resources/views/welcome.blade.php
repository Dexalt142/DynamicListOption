<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dynamic List Option</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">
    </head>
    <body>

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-4">Dynamic List Option</h4>
                            <div class="form-group">
                                <label for="">Provinsi</label>
                                <select name="province" id="province_list" class="form-control">
                                    @foreach($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->province_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Kota</label>
                                <select name="city" id="city_list" class="form-control">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js"></script>

        <script>
            var provinceList = $("#province_list");
            var cityList = $("#city_list");
            $(document).ready(() => {
                getCities(provinceList.val());

                provinceList.on('change', (e) => {
                    getCities(provinceList.val());
                });
            });

            function getCities(province_id) {
                var ajaxUrl = `{{ route("api.city", '') }}/${province_id}`;
                $.ajax({
                    url: ajaxUrl,
                    method: 'GET',
                    success: (res) => {
                        var cities = res.cities;
                        if(cities.length > 0) {
                            cityList.empty();
                            cities.map((city) => {
                                cityList.append(`<option value="${city.id}">${city.city_name}</option>`);
                            });
                        }
                    }
                });
            }
        </script>
    </body>
</html>

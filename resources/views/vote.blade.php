<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        {{-- <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"> --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col">
                    <form action="{{url('vote')}}" method="post">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label for="distro">Pilih Distro Favoritmu:</label>
                            <div class="radio">
                                <label><input type="radio" name="favdistro" value="Ubuntu">Ubuntu</label>
                                <br />
                                <label><input type="radio" name="favdistro" value="Arch Linux">Arch Linux</label>
                                <br />
                                <label><input type="radio" name="favdistro" value="Manjaro">Manjaro</label>
                                <br />
                                <label><input type="radio" name="favdistro" value="elementary OS">elementary OS</label>
                                <br />
                                <label><input type="radio" name="favdistro" value="Pop! OS">Pop! OS</label>
                                <br />
                                <label><input type="radio" name="favdistro" value="Linux Mint">Linux Mint</label>
                                <br />
                                <label><input type="radio" name="favdistro" value="Debian">Debian</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Vote</button>
                    </form>
                </div>
                <div class="col-8">
                    <canvas id="canvas" height="280" width="600"></canvas>
                </div>
            </div>
        </div>

        {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> --}}
        {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script> --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>
        <script>
                var url = "{{url('chart')}}";
                var Distro = new Array();
                var Vote = new Array();
                $(document).ready(function(){
                    $.get(url, function(response){
                        response.forEach(function(data){
                            Distro.push(data.favdistro);
                            Vote.push(data.jumlahVote);
                        });
                        var ctx = document.getElementById("canvas").getContext('2d');
                            var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels:Distro,
                                datasets: [{
                                    label: 'Jumlah Vote',
                                    data: Vote,
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero:true
                                        }
                                    }]
                                }
                            }
                        });
                    });
                });
            </script>
    </body>
</html>

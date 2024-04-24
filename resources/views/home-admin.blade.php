@extends('layouts.app')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<div class="row bg-white">
    <div class="col-2 col-sidebar">
        <div class="m-4">
            <h4 class="text-white">Acessar tabela</h4>
            <hr class="text-white">
            <a class="text-white" href="" style="text-decoration:none"><h5>Produtos</h5></a>
            <a class="text-white" href="{{route('servicos.index')}}" style="text-decoration:none"><h5>Serviços</h5></a>
            <a class="text-white" href="" style="text-decoration:none"><h5>Usuários</h5></a>
            <a class="text-white" href="" style="text-decoration:none"><h5>Pedidos</h5></a>
        </div>
    </div>
    <div class="col-10">
        <h1 class="text-center m-4">PÁGINA DO ADMINISTRADOR</h1>
        <hr class="mx-3">
        <h2 class="m-3">Registros</h2>
        <div class="card m-3">
            <div class="card-body">
                <h5 class="card-title">7</h5>
                <p class="card-text">Usuários cadastrados</p>
            </div>
        </div>
        <div class="card m-3">
            <div class="card-body">
                <h5 class="card-title">11</h5>
                <p class="card-text">Produtos no catálogo</p>
            </div>
        </div>
        <div class="card m-3">
            <div class="card-body">
                <h5 class="card-title">4</h5>
                <p class="card-text">Serviços catalogados</p>
            </div>
        </div>
        <h2 class="m-3 mt-4"></h2>
        <div class="chart-container">
            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

            <script>
            var xValues = ["Pedidos", "Produtos", "Serviços", "Usuários"];
            var yValues = [55, 49, 44, 24, 15];
            var barColors = ["red", "green","blue","orange","brown"];

            new Chart("myChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                backgroundColor: barColors,
                data: yValues
                }]
            },
            options: {
                legend: {display: false},
                title: {
                display: true,
                text: "Relatório de novos cadastros"
                }
            }
            });
            </script>
        </div>
    </div>
</div>

@endsection
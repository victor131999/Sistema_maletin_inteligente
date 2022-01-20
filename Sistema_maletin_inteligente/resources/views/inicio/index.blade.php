
@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1>Bienvenido</h1>
@stop

@section('content')

    <!-- menu el cuerpo -->
  <!-- Content Wrapper. Contains page content -->

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Panel de Control</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

            <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                @if ($NumAncianos != null)
                    <h3>{{$NumAncianos}}<sup style="font-size: 20px"></sup></h3>
                @else
                    <h3>0<sup style="font-size: 20px"></sup></h3>
                @endif
                <p>Pacientes registrados</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{url('anciano/')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                @if ($NumActividades != null)
                    <h3>{{$NumActividades}}<sup style="font-size: 20px"></sup></h3>
                @else
                    <h3>0<sup style="font-size: 20px"></sup></h3>
                @endif
                <p>Terapias realizadas</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{url('actividad/')}}" class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">

                @if ($NumUsuarios != null)
                    <h3>{{$NumUsuarios}}<sup style="font-size: 20px"></sup></h3>
                @else
                    <h3>0<sup style="font-size: 20px"></sup></h3>
                @endif
                <p>Personal registrado</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{url('users/')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- /.row -->
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <div class="container">
          <div class="row">
            <div class="col-6">
            <div id="chart-container"></div>

            </div>
            <div class="col-6">
              <div id="chart-ventas"></div>
            </div>

          </div>
        </div>


        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@stop




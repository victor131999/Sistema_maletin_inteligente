
@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1 aling="center">Bienvenido</h1>
@stop

@section('content')
<div>
    @can('/')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Estadísticas de datos</h1>
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
          @endcan
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
</div>

<div>
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0" aling="center">Información</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <img src="https://res.cloudinary.com/dutwlsrv9/image/upload/v1642694769/fotos%20para%20el%20sistema%20de%20vinculaci%C3%B3n/njsqhn1jgbwi0c4j5qt4.png" style="width: 230px; height: 200px; border: 2px solid red">
                    <img src="https://res.cloudinary.com/dutwlsrv9/image/upload/v1642694797/fotos%20para%20el%20sistema%20de%20vinculaci%C3%B3n/ek7j7jvgvc3tuv8t2kqw.gif" style="width: 230px; height: 200px; border: 2px solid red">
                    <img src="https://res.cloudinary.com/dutwlsrv9/image/upload/v1642694781/fotos%20para%20el%20sistema%20de%20vinculaci%C3%B3n/enlzs6tg8abjdshrskwv.jpg" style="width: 230px; height: 200px; border: 2px solid red">
                    <img src="https://res.cloudinary.com/dutwlsrv9/image/upload/v1642694786/fotos%20para%20el%20sistema%20de%20vinculaci%C3%B3n/vaxsxgkl6nxxgji8xiye.jpg" style="width: 230px; height: 200px; border: 2px solid red">
                    <img src="https://res.cloudinary.com/dutwlsrv9/image/upload/v1642694768/fotos%20para%20el%20sistema%20de%20vinculaci%C3%B3n/dymn2wip3oqtvubuxkcl.jpg" style="width: 230px; height: 200px; border: 2px solid red">

                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a>Información</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600  text-sm">
                                    La universidad de las Fuerzas Armadas ESPE y con la ayuda de los colaboradores del GAD-MIES de la parroquia Mulaló, se procede a la entrega del maletín terapéutico con todos sus componentes, el mismo que le da importancia dentro de un <a href="https://docs.google.com/document/d/1woPbtZ-8-34XGZGelArtw0YCwOM5K9Bb/edit?usp=sharing&ouid=100012539918061215454&rtpof=true&sd=true" class="underline">artículo</a>, al igual que se ha desarrollado el presente sistema con el fin de poder llevar un control de los terapeutas y sus pacientes de la tercera edad.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a>Videos</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 -400 text-sm">
                                    Dentro de las evidencias se puede apreciar lo realizado en el presente proyecto, tanto en el <a class="underline" href="https://drive.google.com/file/d/1CL71FdgLasM-j4pGD73FLg6o2wvC-7R3/view?usp=sharing">video técnico</a> como en el <a class="underline" href="https://res.cloudinary.com/dutwlsrv9/video/upload/v1642707353/fotos%20para%20el%20sistema%20de%20vinculaci%C3%B3n/gngpmwffmh3nkfh2dun9.mp4">video comercial</a>, a fin de que se pueda tomar como referencia para proyectos futuros y así contribuir a la sociedad.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a >Conclusión</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600  text-sm">
                                    La importancia de poder ayudar a las personas de la tercera edad en la parroquia Mulaló, nos ha impulsado a aportar con un maletín inteligente con tecnología asistida para ayudar a la rehabilitación de nuestros adultos mayores, a su vez, aportar con el sistema de gestión de actividades de terapia, la misma que ayuda a llevar un control de las mismas.
                               </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a>Problema y solución</a></div>

                            </div>

                                <div class="ml-12">
                                    <div class="mt-2 text-gray-600 text-sm">
                                        Las personas de la tercera edad se ha convertido en un grupo que a llegado a tomar un relevante porcentaje en problemas de salud como la atrofia, dolores musculares y afines, causada por la artritis, artrosis, y tendinitis, los mismos que por el elevado costo de sus terapias y la distancia no les permite asistir a los centros de salud. Para resolver el problema, se ha contribuido con un maletín inteligente con tecnología asistda, adicionalmente, un sistema sofisticado para la gestión y control de las actividades de cada terapia.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                    </div>
                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        By: Víctor Cuyo
                    </div>
                </div>
            </div>
        </div>
    </body>

</div>

<!-- menu el cuerpo -->
  <!-- Content Wrapper. Contains page content -->


@stop




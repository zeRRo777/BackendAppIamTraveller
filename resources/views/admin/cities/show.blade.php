<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Город</title>

    <x-admin-css-code></x-admin-css-code>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Navbar -->
    <x-admin-nav></x-admin-nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <x-admin-aside></x-admin-aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="mr-2">{{$city->name}}</h1>
                        <a href="{{route('admin.cities.edit', $city->id)}}"
                           class="text-success">
                            <i class="fas fa-sharp fa-solid fa-pen"></i>
                        </a>
                        <form action="{{route('admin.cities.destroy', $city->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="border-0 bg-transparent">
                                <i class="fas fa-trash text-danger" role="button"></i>
                            </button>
                        </form>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.cities.index')}}">Города</a></li>
                            <li class="breadcrumb-item active">{{$city->name}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2 mb-3">
                        <a href="{{route('admin.cities.city_attractions', $city->id)}}"
                           class="btn btn-block btn-primary d-flex align-items-center justify-content-center"
                        >
                            Достопримечательности
                        </a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href="{{route('admin.cities.city_statistic', $city->id)}}"
                           class="btn btn-block btn-primary d-flex align-items-center justify-content-center"
                        >
                            Посмотреть статистику города {{$city->name}}
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h4>Информация о городе</h4>
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{$city->id}}</td>
                                    </tr>
                                    <tr>
                                        <td>Название города</td>
                                        <td>{{$city->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Страна</td>
                                        <td>{{$city->country}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h4 class="">Мобильная версия изображения</h4>
                        <div class="w-50">
                            <img src="{{asset('storage/' . $city->image)}}"
                                 alt="image"
                                 style="height: 180px; border-radius: 25px;"
                            >
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <x-admin-footer></x-admin-footer>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<x-admin-js-code></x-admin-js-code>
</body>
</html>

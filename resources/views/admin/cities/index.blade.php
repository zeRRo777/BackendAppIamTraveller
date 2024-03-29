<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Города</title>

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
                    <div class="col-sm-6">
                        <h1 class="m-0">Города</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Города</li>
                        </ol>
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
                    <div class="col-2 mb-3">
                        <a href="{{route('admin.cities.create')}}" class="btn btn-block btn-primary">Добавить</a>
                    </div>
                    <div class="col-2 mb-3">
                        <a href="{{route('admin.cities.statistic')}}" class="btn btn-block btn-primary">Посмотреть статистику</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Название</th>
                                        <th>Страна</th>
                                        <th colspan="3" class="text-center">Действия</th>
                                    </tr>
                                    </thead>
                                        <tbody>
                                        @foreach($cities as $city)
                                        <tr>
                                            <td>{{$city->id}}</td>
                                            <td>{{$city->name}}</td>
                                            <td>{{$city->country}}</td>
                                            <td class="text-center"><a href="{{route('admin.cities.show', $city->id)}}">
                                                    <i class="far fa-sharp fa-solid fa-eye"></i></a>
                                            </td>
                                            <td class="text-center"><a href="{{route('admin.cities.edit', $city->id)}}"
                                                                       class="text-success"><i class="fas fa-sharp fa-solid fa-pen"></i></a>
                                            </td>
                                            <td class="text-center">
                                                <form action="{{route('admin.cities.destroy', $city->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-transparent">
                                                        <i class="fas fa-trash text-danger" role="button"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- ./col -->
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

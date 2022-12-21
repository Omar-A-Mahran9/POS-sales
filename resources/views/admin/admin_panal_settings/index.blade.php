@extends('layouts.admin')
@section('title', 'الاعدادات')
@section('contentheader', 'الاعدادات')
@section('contentheaderlink')
    <li class="breadcrumb-item"><a href="{{ route('adminpanelsetting.index') }}">الضبط العام</a></li>
@endsection
@section('contentheaderactive', 'عرض')
@section('navsubject', 'الضبط العام')


@section('content')

    <div class="col-8">
        <div class="card card-primary">
            <div class="card-header ">
                <h3 class="card-title card_title_center">بيانات الضبط العام</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover ">
                    <thead>
                        @if (@isset($data) && !@empty($data))
                            <tr>
                                <th>اسم الشركة</th>
                                <td>{{ $data['system_name'] }}</td>
                            </tr>
                            <tr>
                                <th>كود الشركة</th>
                                <td>{{ $data['com_code'] }}</td>
                            </tr>
                            <tr>
                                <th>هاتف الشركة</th>
                                <td>{{ $data['phone'] }}</td>
                            </tr>
                            <tr>
                                <th>عنوان الشركة</th>
                                <td>{{ $data['address'] }}</td>
                            </tr>
                            <tr>
                                <th>رسالة التنبيه أعلى الشاشة للشركة</th>
                                <td>{{ $data['general_alert'] }}</td>
                            </tr>
                            <tr>
                                <td><strong>حالة الشركة</strong></td>
                                <td>
                                    @if ($data['active'] == 1)
                                        <h5 class="bg-success p-1 rounded w-50 text-center">مفـــــعــــــل
                                        </h5>
                                    @else
                                        <h5 class="bg-danger p-1 rounded w-50 text-center">مــــــعـــطــــل
                                        </h5>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="pb-5"><strong>لوجو الشركة</strong></td>
                                <td>
                                    <img class='custom_img' src='{{ asset('assets/admin/uploads') . '/' . $data['photo'] }}'
                                        alt="لوجو الشركة">
                                </td>
                            </tr>
                            <tr>
                                <th>تاريخ اخر تحديث</th>
                                <td>
                                    @if ($data['updated_by'] > 0 and $data['updated_by'] != 'null')
                                        @php
                                            $dt = new DateTime($data['updated_at']);
                                            $date = $dt->format('Y-m-d');
                                            $time = $dt->format('h:i');
                                            $newDateTime = date('A', strtotime($time));
                                       
                                            $newDateTimeType = $newDateTime == 'AM' ? 'صباحاً' : 'مساءاً';
                                        @endphp
                                        {{ $date }}
                                        {{ $time }}
                                        {{ $newDateTimeType }}
                                        بواسطة
                                        {{ $data['updated_by_admin'] }}
                                    @else
                                        <p class="text-danger"> <strong>لا يوجد تحديث</strong>
                                        <p>
                                    @endif

                                </td>
                            </tr>
                        @else
                            <div class="alert alert-danger">
                                عفوا لا توجد بيانات لعرضها !
                            </div>
                        @endif

                    </thead>
                </table>
                <div class="d-flex justify-content-end">
                <a href="{{route('admin.adminpanelsetting.edit')}}" class='btn btn-success  text-white mt-2 pr-5 pl-5 text-center'>تعديل</a>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->


@endsection

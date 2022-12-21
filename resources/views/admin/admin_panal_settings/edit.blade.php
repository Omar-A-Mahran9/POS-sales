@extends('layouts.admin')
@section('title', 'تعديل بيانات الضبط العام')
@section('contentheader', 'الاعدادات')
@section('contentheaderlink')
    <li class="breadcrumb-item"><a href="{{ route('adminpanelsetting.index') }}">تعديل بيانات الضبط العام</a></li>
@endsection
@section('contentheaderactive', 'عرض')
@section('navsubject', 'تعديل بيانات الضبط العام')


@section('content')

    @if (@isset($data) && !@empty($data))

        @if ($data['updated_by'] > 0 and $data['updated_by'] != 'null')

            <div class="col-6">
                <div class=" card card-primary">
                    <div class="card-header">
                        <h3 class="card-title card_title_center ">تعديل بيانات الضبط العام</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    @if (@isset($data) && !@empty($data))
                        <form role="form" action='{{ route('admin.adminpanelsetting.update') }}' method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" class="form-control" id="exampleInputEmail1"
                                placeholder="اسم الشركة" value="{{ $data['id'] }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">اسم الشركة</label>
                                    <input type="text" name="SystemName" class="form-control" id="exampleInputEmail1"
                                        placeholder="اسم الشركة" oninvalid="setCustomValidity('من فضلك أدخل هذا الحقل')"
                                        onchange="try{setCustomValidity('')}catch(e){}" required
                                        value="{{ $data['system_name'] }}">
                                </div>
                             

                                <div class="form-group">
                                    <label for="exampleInputPassword1">كود الشركة</label>
                                    <input type="text" name="CompanyCode" class="form-control" id="exampleInputPassword1"
                                        placeholder="كود الشركة" value="{{ $data['com_code'] }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">هاتف الشركة</label>
                                    <input type="text" name="CompanyPhone" class="form-control" id="exampleInputEmail1"
                                        placeholder="هاتف الشركة" value="{{ $data['phone'] }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">عنوان الشركة</label>
                                    <input type="text" name="CompanyAddress" class="form-control" id="exampleInputEmail1"
                                        placeholder="عنوان الشركة" value="{{ $data['address'] }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">رسالة التنبيه أعلى الشاشة للشركة</label>
                                    <input type="text" class="form-control" name="Companymass" id="exampleInputEmail1"
                                        placeholder="رسالة التنبيه أعلى الشاشة للشركة" value="{{ $data['general_alert'] }}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">حالة الشركة</label>
                                    <select class="form-control" name="CompanyStatue">
                                        <option value="1" {{ $data['active'] == 1 ? 'selected' : '' }}>مفعل</option>
                                        <option value="2" {{ $data['active'] == 1 ? '' : 'selected' }}>معطل</option>
                                    </select>
                                </div>


                                <div class="form-group" >
                                    <label for="exampleInputEmail1">شعار الشركة</label>
                                    <div class="image">
                                        <img class='custom_img'
                                            src='{{ asset('assets/admin/uploads') . '/' . $data['photo'] }}'
                                            alt="لوجو الشركة">
                                        <button class="btn btn-warning btn-sm ml-3" id="update_image">تغيير الصورة</button>
                                        <button class="btn btn-danger btn-sm ml-3" style="display:none;"
                                            id='cancel_update_image'>الغاء</button>
                                    </div>
                                </div>
                                <div id="old_image">

                                </div>




                            </div>
                            <!-- /.card-body -->

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">حفظ التعديلات </button>
                            </div>

                        </form>
                    @else
                        <div class="alert alert-danger">
                            عفوا لا توجد بيانات لعرضها !
                        </div>
                    @endif
                </div>
            </div>
        @else
            <div class="alert alert-danger">
                عفوا لا توجد بيانات لعرضها !
            </div>
        @endif




    @endif




@endsection

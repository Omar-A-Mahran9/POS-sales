@extends('layouts.admin')
@section('title', 'الرئيسية')
@section('contentheader', 'الرئيسية')
@section('contentheaderlink')
    <li class="breadcrumb-item"><a href="{{ route('Dashboardview') }}">الرئيسية</a></li>
@endsection
@section('contentheaderactive', 'عرض')
@section('navsubject', 'الرئيسية')


@section('content')
        الشاشة الرئيسية
@endsection

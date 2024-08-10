@extends('errors::minimal', ['title' => "401 Unauthorized"])

@section('title', __('Unauthorized'))
@section('code', '401')
@section('message', __('Unauthorized'))

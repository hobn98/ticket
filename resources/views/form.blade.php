@extends('layout')
@section('content')
    <div>
        <form action="{{route('reserve.store')}}" method="post">
            @csrf
            <label>نام:</label>
            <br>
            <input type="text" name="name" required>
            <br>
            <label>شماره:</label>
            <br>
            <input type="text" name="number"  required>
            <br>
            <label>نام شرکت:</label>
            <br>
            <input type="text" name="company" required>
            <br>
            <label>شروع:</label>
            <br>
            <input type="text" id="starttime"
                   min="09:00" max="20:00" required>
            <input type="hidden" id="starttime1" name="start_time">
            <br>
            <label>پایان:</label>
            <br>
            <input type="text" id="endtime"
                   min="10:00" max="21:00" required>
            <input type="hidden" id="endtime1" name="end_time">
            <br>
            <br>
            <br>
            <input class="send" type="submit" value="ارسال درخواست" >


        </form>
    </div>
@endsection

@push('js')
    <script>
        $('#starttime').MdPersianDateTimePicker({
            targetTextSelector: '#starttime',
            targetDateSelector: '#starttime1',
            enableTimePicker:true,

        });

        $('#endtime').MdPersianDateTimePicker({
            targetTextSelector: '#endtime',
            targetDateSelector: '#endtime1',
            enableTimePicker:true,
        });
    </script>
@endpush

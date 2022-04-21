
@extends('layout')
@section('content')
    <div>
        <form action="{{route('reserve.update', $reserve->id)}}" method="post">
            @csrf
            @method('PUT')
            <label>نام:</label>
            <br>
            <input type="text" name="name" value="{{$reserve->name}}" required>
            <br>
            <label>شماره:</label>
            <br>
            <input type="text" name="number"  value="{{$reserve->number}}" required>
            <br>
            <label>نام شرکت:</label>
            <br>
            <input type="text" name="company" value="{{$reserve->company}}" required>
            <br>
            <label>شروع:</label>
            <br>
            <input type="text" id="starttime"
                  value="{{verta($reserve->start_time)->formatDatetime()}}" min="09:00" max="20:00" required>
            <input type="hidden" id="starttime1" name="start_time"  value="{{$reserve->start_time}}">
            <br>
            <label>پایان:</label>
            <br>
            <input type="text"  id="endtime"
            value="{{verta($reserve->end_time)->formatDatetime()}}" min="10:00" max="21:00" required>
            <input type="hidden" id="endtime1" name="end_time" value="{{$reserve->end_time}}">
            <br>

            <div class="custom-control custom-switch">
                <input type="hidden" name="status" value="0">
                <input name="status" type="checkbox" class="custom-control-input" id="customSwitch1"
                  value="1"     @if($reserve->status==1) checked @endif
                >
                <label class="custom-control-label" for="customSwitch1">معتبر/نامعتبر</label>
            </div><br> <hr>


            <input class="send" type="submit" value="ذخیره" >


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

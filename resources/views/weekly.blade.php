@extends('layout')
@section('content')
    @php
        $begin = verta()->startWeek();
        $end = verta()->endWeek();

        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($begin, $interval, $end);



    @endphp

    @foreach ($period as $dt)
        {{verta($dt)->format("l Y-m-d ")}}
        <table class="table">
            @php
            $times = new DatePeriod($dt->toCarbon()->addHours(8),
            DateInterval::createFromDateString('15 minute'),
            $dt->toCarbon()->addHours(22))

            @endphp

        @foreach (collect($times)->chunk(10) as $timing)
                <tr>
                    @foreach ($timing as $time)
                        <td @if(\App\Models\Reserve::query()
                                    ->where('start_time','<=',$time)
                                    ->where('end_time','>=',$time)
                                    ->first()) class="bg-danger" @endif >
                            {{$time->format("H:i")}}
                        </td>
                    @endforeach
                </tr>
        @endforeach
        </table>
    @endforeach

@endsection


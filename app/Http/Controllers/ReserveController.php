<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ReserveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['index','edit','destroy','update']);
    }


    public function index()
    {
        $rows = Reserve::all();
        return view('index', compact('rows'));
    }


    public function create()
    {

        return view('form');

    }
    private function checktime(Request $request, $id = null){
        $start = Reserve::query()
            ->when(isset($id), function (Builder $q) use ($id) {
                $q->whereKeyNot($id);
            })
            ->where('start_time', '<=', $request['start_time'])
            ->where('end_time', '>=', $request['start_time'])->count();
        $end = Reserve::query()
            ->when(isset($id), function (Builder $q) use ($id) {
                $q->whereKeyNot($id);
            })
            ->where('start_time', '<=', $request['end_time'])
            ->where('end_time', '>=', $request['end_time'])
            ->count();
        $middle = Reserve::query()
            ->when(isset($id), function (Builder $q) use ($id) {
                $q->whereKeyNot($id);
            })
            ->where('start_time', '>=', $request['start_time'])
            ->where('end_time', '<=', $request['end_time'])->count();

        return $start + $end + $middle < 1;
    }
    public function store(Request $request)
    {


        if ($this->checktime($request)) {
            Reserve::create($request->all());
            return redirect()->back();
        }

        else {
            echo "you cant pick this particular time";

        }
    }


    public function show(Reserve $reserve)
    {

    }

    public function edit(Reserve $reserve)
    {

        return view('edit', compact('reserve'));
    }


    public function update(Request $request, Reserve $reserve)
    {
        if ($this->checktime($request , $reserve->id)) {
            $reserve->update([
                'name' => $request['name'],
                'number' => $request['number'],
                'company' => $request['company'],
                'status' => $request['status'],
                'start_time' => $request['start_time'],
                'end_time' => $request['end_time'],
            ]);
            return redirect()->back();
        } else {
            echo "you cant pick this particular time";
        }
    }


        public
        function destroy(Reserve $reserve)
        {
            $reserve->delete();
            return redirect()->back();
        }

    public function weekly()
    {
        return view('weekly');
        }
}


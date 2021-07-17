<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Person;

// class PersonController extends Controller
// {
//     public function index(Request $request)
//     {
//         // $items = DB::select('select * from people');
//         // return view('index', ['items' => $items]);

//         $items = DB::table('people')->get();
//         return view('index', ['items' => $items]);
//     }

//     public function add(Request $request)
//     {
//         return view('add');
//     }
//     public function create(Request $request)
//     {
//         // $param = [
//         //     'name' => $request->name,
//         //     'age' => $request->age,
//         // ];
//         // DB::insert('insert into people (name, age) values (:name, :age)', $param);
//         // return redirect('/');

//         $param = [
//             'name' => $request->name,
//             'age' => $request->age,
//         ];
//         DB::table('people')->insert($param);
//         return redirect('/');
//     }

//     public function edit(Request $request)
//     {
//         // $param = ['id' => $request->id];
//         // $item = DB::select('select * from people where id = :id', $param);
//         // return view('edit', ['form' => $item[0]]);

//         $item = DB::table('people')->where('id', $request->id)->first();
//         return view('edit', ['form' => $item]);
//     }
//     public function update(Request $request)
//     {
//         // $param = [
//         //     'id' => $request->id,
//         //     'name' => $request->name,
//         //     'age' => $request->age,
//         // ];
//         // DB::update('update people set name =:name, age =:age where id =:id', $param);
//         // return redirect('/');

//         $param = [
//             'name' => $request->name,
//             'age' => $request->age,
//         ];
//         DB::table('people')->where('id', $request->id)->update($param);
//         return redirect('/');
//     }

//     public function delete(Request $request)
//     {
//         // $param = ['id' => $request->id];
//         // $item = DB::select('select * from people where id = :id', $param);
//         // return view('delete', ['form' => $item[0]]);

//         $item = DB::table('people')->where('id', $request->id)->first();
//         return view('delete', ['form' =>$item]);
//     }
//     public function remove(Request $request)
//     {
//         // $param = ['id' => $request->id];
//         // DB::delete('delete from people where id =:id', $param);
//         // return redirect('/');

//         DB::table('people')->where('id', $request->id)->delete();
//         return redirect('/');
//     }
// }

class PersonController extends Controller
{
    public function index(Request $request)
    {
        $items = Person::all();
        return view('index', ['items' => $items]);
    }

    public function find(Request $request)
    {
        return view('find', ['input' => '']);
    }
    public function search(Request $request)
    {
        // $item = Person::find($request->input);
        // $param = [
        //     'input' => $request->input,
        //     'item' => $item,
        // ];
        // return view('find', $param);
        $item = Person::where('name', $request->input)->first();
        $param = [
            'input' => $request->input,
            'item' => $item
        ];
        return view('find', $param);
    }

    // public function bind(Person $person)
    // {
    //     $data = [
    //         'item' => $person,
    //     ];
    //     return view('person.binds', $data);
    // }

    public function add(Request $request)
    {
        return view('add');
    }
    public function create(Request $request)
    {
        $this->validate($request, Person::$rules);
        $form = $request->all();
        Person::create($form);
        return redirect('/');
    }

    public function edit(Request $request)
    {
        $person = Person::find($request->id);
        return view('edit', ['form' => $person]);
    }
    public function update(Request $request)
    {
        $this->validate($request, Person::$rules);
        $form = $request->all();
        // $form = $request->except(['_token']);
        // unset($form['_token']);
        Person::where('id', $request->id)->update($form);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        $person = Person::find($request->id);
        return view('delete', ['form' => $person]);
    }
    public function remove(Request $request)
    {
        Person::find($request->id)->delete();
        return redirect('/');
    }
}
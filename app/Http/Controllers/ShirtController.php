<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShirtRequest;
use App\Mail\ShirtReport;
use App\Shirt;
use App\Category;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;

class ShirtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return View('shirts.index', [
            'shirts' => Shirt::all()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        return view('shirts.create', [
            'category' => $category
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShirtRequest $request,Category $category)
    {
        $path ='https://www.segelectrica.com.co/wp-content/themes/consultix/images/no-image-found-360x250.png';
        if($request->hasFile('shirt_image')){
            $path = $request->file('shirt_image')->store('shirts', 'public');
        }

        $status = $request->get('status');
        $status = isset($status);


        $shirt = new Shirt;
        $shirt->shirt_name = $request->get('shirt_name');
        $shirt->shirt_value = $request->get('shirt_value');
        $shirt->shirt_color = $request->get('shirt_color');
        $shirt->status = $status;
        $shirt->shirt_image = $path;
        $shirt->category_id = $category->id;



        $shirt->save();
        return redirect('/category/'.$category->slug);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shirt  $shirt
     * @return \Illuminate\Http\Response
     */
    public function show(Shirt $shirt)
    {
        return view('shirts.show', [
            'shirt' => $shirt
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shirt  $shirt
     * @return \Illuminate\Http\Response
     */
    public function edit(Shirt $shirt)
    {
        return view('shirts.edit', [
            'shirt' => $shirt
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shirt  $shirt
     * @return \Illuminate\Http\Response
     */
    public function update(ShirtRequest $request,Shirt $shirt,Category $category)
    {
        $path ='https://www.segelectrica.com.co/wp-content/themes/consultix/images/no-image-found-360x250.png';
        if($request->hasFile('shirt_image')){
            $path = $request->file('shirt_image')->store('shirts', 'public');
        }

        $status = $request->get('status');
        $status = isset($status);

        $shirt->shirt_name = $request->get('shirt_name');
        $shirt->shirt_value = $request->get('shirt_value');
        $shirt->shirt_color = $request->get('shirt_color');
        $shirt->status = $status;
        $shirt->shirt_image = $path;
       // $shirt->category_id = $category->id;



        $shirt->save();
        return redirect('/category/'.$category->slug);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shirt  $shirt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shirt $shirt)
    {
        $shirt->delete();
        return back();
    }
    public function sendEmail(Shirt  $shirt)
    {
        $users = User::where('is_subscribed',true)->get();
        foreach ($users as $user){
            Mail::to($user->email)
                ->send(
                    new ShirtReport($shirt)
                );
        }

        return redirect('/category');
    }
}

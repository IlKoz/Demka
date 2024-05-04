<?php

namespace App\Http\Controllers;

use App\Models\Statement;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		Carbon::setLocale('ru');
		auth()->user();
		$statements = auth()->user()->statements;
        return view('home', compact('statements'));
    }

    public function show($id)
    {
		Carbon::setLocale('ru');
		// auth()->user();
		$statement = Statement::findOrFail($id);
		if (!$statement) {
			// Обработка случая, когда запись не найдена
			abort(404); // или любая другая обработка ошибки
		};
    	return view('application', compact('statement'));
    }

	public function create()
	{
		return view('applications');
	}

	public function store(Request $request)
	{
		if ($request->hasFile('image')) {
			$image = $request->file('image')->store('images', 'public');
		} else {
			$image = null;
		}
	
		Statement::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
            'user_id' => auth()->id(),
        ]);

		return redirect()->route('home');
	}
}

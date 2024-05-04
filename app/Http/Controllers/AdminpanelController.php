<?php

namespace App\Http\Controllers;

use App\Models\Statement;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminpanelController extends Controller
{
    public function index()
    {
		Carbon::setLocale('ru');
        $statements = Statement::where('status', 'new')->get();
        return view('adminpanel', compact('statements'));
    }

	public function confirmed(Request $request, Statement $statement)
	{
		$statement->update(['status' => 'confirmed']);
		return redirect()->route('admin.index');
	}

	public function dismissed(Request $request, Statement $statement)
	{
		$statement->update(['status' => 'dismissed']);
		return redirect()->route('admin.index');
	}
}

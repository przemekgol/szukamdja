<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        $inquiries = Inquiry::query()
            ->withCount('djs')
            ->latest()
            ->paginate(20);

        return view('admin.dashboard', [
            'inquiries' => $inquiries,
        ]);
    }
}

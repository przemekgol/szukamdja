<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DjDashboardController extends Controller
{
    public function index(Request $request): View
    {
        $inquiries = Inquiry::query()
            ->whereHas('djs', fn ($query) => $query->where('dj_id', $request->user()->id))
            ->latest()
            ->paginate(15);

        return view('dj.dashboard', [
            'inquiries' => $inquiries,
            'user' => $request->user(),
        ]);
    }

    public function updateRadius(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'postal_code' => ['required', 'regex:/^[0-9]{2}-[0-9]{3}$/'],
            'radius_km' => ['required', 'integer', 'min:1', 'max:300'],
        ]);

        $request->user()->update($validated);

        return back()->with('success', 'Zapisano preferowany promień i kod pocztowy.');
    }
}

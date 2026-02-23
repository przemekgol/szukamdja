<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicInquiryController extends Controller
{
    public function create(): View
    {
        return view('public.inquiry-form');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'client_email' => ['required', 'email'],
            'event_type' => ['required', 'in:urodziny,wesele,event,inne'],
            'event_type_other' => ['nullable', 'string', 'max:255'],
            'event_date' => ['required', 'date', 'after_or_equal:today'],
            'postal_code' => ['required', 'regex:/^[0-9]{2}-[0-9]{3}$/'],
        ]);

        $inquiry = Inquiry::create($validated);

        $djs = User::query()
            ->where('role', 'dj')
            ->whereNotNull('radius_km')
            ->where('radius_km', '>', 0)
            ->whereNotNull('postal_code')
            ->get()
            ->filter(function (User $dj) use ($inquiry): bool {
                return $this->samePostalPrefix($dj->postal_code, $inquiry->postal_code);
            });

        if ($djs->isNotEmpty()) {
            $inquiry->djs()->sync($djs->pluck('id')->all());
        }

        return redirect()
            ->route('inquiry.create')
            ->with('success', 'Zapytanie zostało wysłane do dostępnych DJ-ów.');
    }

    private function samePostalPrefix(string $djPostalCode, string $eventPostalCode): bool
    {
        return str($djPostalCode)->substr(0, 2)->toString() === str($eventPostalCode)->substr(0, 2)->toString();
    }
}

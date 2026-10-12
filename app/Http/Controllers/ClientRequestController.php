<?php
namespace App\Http\Controllers;

use App\Models\ClientRequest;
use App\Models\DeletedClientRequest;
use Illuminate\Http\Request;

class ClientRequestController extends Controller
{
    public function index()
    {
        $requests = ClientRequest::latest()->get();

        return view('requests.index', compact('requests'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'service'     => 'required|string|max:255',
            'description' => 'required|string',
            'priority'    => 'required|in:low,medium,high',
            'due_date'    => 'nullable|date',
        ]);

        ClientRequest::create($validated);

        return redirect()
            ->route('requests.index')
            ->with('success', 'Client request added successfully.');
    }

    public function edit(ClientRequest $request)
    {
        return view('requests.edit', compact('request'));
    }

    public function update(Request $request, ClientRequest $clientRequest)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'service'     => 'required|string|max:255',
            'description' => 'required|string',
            'priority'    => 'required|in:low,medium,high',
            'status'      => 'required|in:new,in_progress,completed',
            'due_date'    => 'nullable|date',
        ]);

        $clientRequest->update($validated);

        return redirect()
            ->route('requests.index')
            ->with('success', 'Client request updated successfully.');
    }
    public function destroy(ClientRequest $clientRequest)
    {
        DeletedClientRequest::create([
            'original_id' => $clientRequest->id,
            'client_name' => $clientRequest->client_name,
            'service'     => $clientRequest->service,
            'priority'    => $clientRequest->priority,
            'status'      => $clientRequest->status,
            'description' => $clientRequest->description,
            'deleted_by'  => 'System',
            'deleted_at'  => now(),
        ]);

        $clientRequest->delete();

        return redirect()
            ->route('requests.index')
            ->with('success', 'Client request moved to trash successfully.');
    }

    public function trash()
    {
        $deletedRequests = DeletedClientRequest::latest('deleted_at')->get();

        return view('requests.trash', compact('deletedRequests'));
    }

    public function restore($id)
    {
        $deletedRequest = DeletedClientRequest::findOrFail($id);

        ClientRequest::create([
            'client_name' => $deletedRequest->client_name,
            'service'     => $deletedRequest->service,
            'priority'    => $deletedRequest->priority,
            'status'      => $deletedRequest->status,
            'description' => $deletedRequest->description,
        ]);

        $deletedRequest->delete();

        return redirect()
            ->route('requests.trash')
            ->with('success', 'Client request restored successfully.');
    }

    public function forceDelete($id)
    {
        $deletedRequest = DeletedClientRequest::findOrFail($id);

        $deletedRequest->delete();

        return redirect()
            ->route('requests.trash')
            ->with('success', 'Client request permanently deleted.');
    }
}

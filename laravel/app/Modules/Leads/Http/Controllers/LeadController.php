<?php

namespace App\Modules\Leads\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Leads\Http\Requests\CalculadoraRequest;
use App\Modules\Leads\Http\Requests\LeadRequest;
use App\Modules\Leads\LeadService;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function __construct(LeadService $lead_service)
    {
        $this->lead_service = $lead_service;
    }

    public function store(LeadRequest $request)
    {
        return response()->json([
            'error' => false,
            'message' => __('wf.leads::toasts.store'),
            'lead' => $this->lead_service->store($request->toArray()),
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
    }

    public function update(LeadRequest $request, $id)
    {
        return response()->json([
            'error' => false,
            'message' => __('wf.leads::toasts.update'),
            'lead' => $this->lead_service->update($request->toArray(), $id),
        ]);
    }

    public function destroy($id)
    {
        $this->lead_service->destroy($id);

        return response()->json([
            'error' => false,
            'message' => __('wf.leads::toasts.destroy'),
        ]);
    }

    public function restore($id)
    {
        $this->lead_service->restore($id);

        return response()->json([
            'error' => false,
            'message' => __('wf.leads::toasts.restore'),
        ]);
    }

    public function get(Request $request)
    {
        return response()->json([
            'error' => false,
            'leads' => $this->lead_service->api->get($request->toArray()),
        ]);
    }

    public function find(Request $request)
    {
        return response()->json([
            'error' => false,
            'lead' => $this->lead_service->api->find($request->toArray()),
        ]);
    }

    public function paginate(Request $request)
    {
        return response()->json(
            $this->lead_service->api->paginate($request->toArray())
        );
    }

    protected function resourceAbilityMap()
    {
        return array_merge(parent::resourceAbilityMap(), [
            'ngTableGet' => 'view',
            'restore' => 'restore',
        ]);
    }

    public function send(ContactRequest $request)
    {
        $this->lead_service->store($request->toArray());
        return response()->json([
            'error' => false,
            'message' => 'Enviado com sucesso!',
        ]);
    }

    public function sendCalculadora(CalculadoraRequest $request)
    {
        $this->lead_service->store($request->toArray());
        return response()->json([
            'error' => false,
            'message' => 'Enviado com sucesso!',
        ]);

    }

}

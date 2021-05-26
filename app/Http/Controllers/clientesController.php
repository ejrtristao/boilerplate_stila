<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateclientesRequest;
use App\Http\Requests\UpdateclientesRequest;
use App\Repositories\clientesRepository;
use App\Models\clientes;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class clientesController extends AppBaseController
{
    /** @var  clientesRepository */
    private $clientesRepository;

    public function __construct(clientesRepository $clientesRepo)
    {
        $this->clientesRepository = $clientesRepo;
    }

    /**
     * Display a listing of the clientes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $clientes = clientes::where('INATIVO', 0)
        ->orderBy('NOMECLIE', 'ASC')->get();
        return view('clientes.index')
            ->with('clientes', $clientes);
    }

    /**
     * Show the form for creating a new clientes.
     *
     * @return Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created clientes in storage.
     *
     * @param CreateclientesRequest $request
     *
     * @return Response
     */
    public function store(CreateclientesRequest $request)
    {
        $input = $request->all();

        $clientes = $this->clientesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/clientes.singular')]));

        return redirect(route('clientes.index'));
    }

    /**
     * Display the specified clientes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clientes = $this->clientesRepository->find($id);

        if (empty($clientes)) {
            Flash::error(__('messages.not_found', ['model' => __('models/clientes.singular')]));

            return redirect(route('clientes.index'));
        }

        return view('clientes.show')->with('clientes', $clientes);
    }

    /**
     * Show the form for editing the specified clientes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clientes = $this->clientesRepository->find($id);

        if (empty($clientes)) {
            Flash::error(__('messages.not_found', ['model' => __('models/clientes.singular')]));

            return redirect(route('clientes.index'));
        }

        return view('clientes.edit')->with('clientes', $clientes);
    }

    /**
     * Update the specified clientes in storage.
     *
     * @param int $id
     * @param UpdateclientesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateclientesRequest $request)
    {
        $clientes = $this->clientesRepository->find($id);

        if (empty($clientes)) {
            Flash::error(__('messages.not_found', ['model' => __('models/clientes.singular')]));

            return redirect(route('clientes.index'));
        }

        $clientes = $this->clientesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/clientes.singular')]));

        return redirect(route('clientes.index'));
    }

    /**
     * Remove the specified clientes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clientes = $this->clientesRepository->find($id);
        if (empty($clientes)) {
            Flash::error(__('messages.not_found', ['model' => __('models/clientes.singular')]));
            return redirect(route('clientes.index'));
        }
        $this->clientesRepository->delete($id);
        Flash::success(__('messages.deleted', ['model' => __('models/clientes.singular')]));
        return redirect(route('clientes.index'));
    }
}

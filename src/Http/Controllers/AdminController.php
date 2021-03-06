<?php

namespace TypiCMS\Modules\Places\Http\Controllers;

use TypiCMS\Modules\Core\Shells\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Places\Shells\Http\Requests\FormRequest;
use TypiCMS\Modules\Places\Shells\Models\Place;
use TypiCMS\Modules\Places\Shells\Repositories\PlaceInterface;

class AdminController extends BaseAdminController
{
    public function __construct(PlaceInterface $place)
    {
        parent::__construct($place);
    }

    /**
     * List models.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('places::admin.index');
    }

    /**
     * Create form for a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = $this->repository->getModel();

        return view('places::admin.create')
            ->with(compact('model'));
    }

    /**
     * Edit form for the specified resource.
     *
     * @param \TypiCMS\Modules\Places\Shells\Models\Place $place
     *
     * @return \Illuminate\View\View
     */
    public function edit(Place $place)
    {
        return view('places::admin.edit')
            ->with(['model' => $place]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \TypiCMS\Modules\Places\Shells\Http\Requests\FormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormRequest $request)
    {
        $model = $this->repository->create($request->all());

        return $this->redirect($request, $model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \TypiCMS\Modules\Places\Shells\Models\Place              $place
     * @param \TypiCMS\Modules\Places\Shells\Http\Requests\FormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Place $place, FormRequest $request)
    {
        $this->repository->update($request->all());

        return $this->redirect($request, $place);
    }
}

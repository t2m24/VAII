<?php

namespace App\Controllers;

use App\Models\Album;
use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

class AlbumController extends BaseController
{
    public function authorize(Request $request, string $action): bool
    {
        return true;
    }

    public function index(Request $request): Response
    {
        $albums = Album::getAll(orderBy: 'title ASC');
        return $this->html(compact('albums'));
    }

    public function show(Request $request): Response
    {
        $album = Album::getOne($request->get('id'));
        if ($album === null) {
            return $this->redirect($this->url('album.index'));
        }

        $songs = $album->getSongs();
        return $this->html(compact('album', 'songs'));
    }

    public function create(Request $request): Response
    {
        return $this->html([
            'album' => new Album(),
            'formAction' => $this->url('album.store'),
            'formTitle' => 'Pridanie nového albumu',
        ], 'form');
    }

    public function store(Request $request): Response
    {
        if (!$request->isPost()) {
            return $this->redirect($this->url('album.create'));
        }

        $album = new Album();
        $album->setFromRequest($request);
        $album->save();

        return $this->redirect($this->url('album.index'));
    }

    public function edit(Request $request): Response
    {
        $album = Album::getOne($request->get('id'));
        if ($album === null) {
            return $this->redirect($this->url('album.index'));
        }

        return $this->html([
            'album' => $album,
            'formAction' => $this->url('album.update', ['id' => $album->id]),
            'formTitle' => 'Úprava albumu',
        ], 'form');
    }

    public function update(Request $request): Response
    {
        $album = Album::getOne($request->get('id'));
        if ($album === null) {
            return $this->redirect($this->url('album.index'));
        }

        if (!$request->isPost()) {
            return $this->redirect($this->url('album.edit', ['id' => $album->id]));
        }

        $album->setFromRequest($request);
        $album->save();

        return $this->redirect($this->url('album.index'));
    }

    public function delete(Request $request): Response
    {
        $album = Album::getOne($request->get('id'));
        if ($album !== null) {
            $album->delete();
        }

        return $this->redirect($this->url('album.index'));
    }
}

<?php

namespace App\Controllers;

use App\Models\Song;
use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

/**
 * Class HomeController
 * Handles actions related to the home page and other public actions.
 *
 * This controller includes public actions for the catalogue and song detail pages. It provides a mechanism for
 * authorizing actions based on user permissions.
 *
 * @package App\Controllers
 */
class HomeController extends BaseController
{
    /**
     * Authorizes controller actions based on the specified action name.
     *
     * In this implementation, all actions are authorized unconditionally.
     *
     * @param string $action The action name to authorize.
     * @return bool Returns true, allowing all actions.
     */
    public function authorize(Request $request, string $action): bool
    {
        return true;
    }

    /**
     * Displays the default home page.
     *
     * This action serves the main HTML view of the home page.
     *
     * @return Response The response object containing the rendered HTML for the home page.
     */
    public function index(Request $request): Response
    {
        $songs = Song::getAll(orderBy: 'created_at DESC');
        return $this->html(compact('songs'));
    }

    /**
     * Displays the song detail page.
     *
     * @return Response The response object containing the rendered HTML for the song detail page.
     */
    public function song(Request $request): Response
    {
        $id = $request->get('id');
        $song = $id !== null
            ? Song::getOne($id)
            : (Song::getAll(orderBy: 'id ASC', limit: 1)[0] ?? null);
        if ($song === null) {
            return $this->redirect($this->url('home.index'));
        }

        return $this->html(compact('song'));
    }

    public function create(Request $request): Response
    {
        return $this->html([
            'song' => new Song(),
            'formAction' => $this->url('home.store'),
            'formTitle' => 'Pridanie novej skladby',
        ], 'form');
    }

    public function store(Request $request): Response
    {
        if (!$request->isPost()) {
            return $this->redirect($this->url('home.create'));
        }

        $song = new Song();
        $song->setFromRequest($request);
        $song->save();

        return $this->redirect($this->url('home.index'));
    }

    public function edit(Request $request): Response
    {
        $song = Song::getOne($request->get('id'));
        if ($song === null) {
            return $this->redirect($this->url('home.index'));
        }

        return $this->html([
            'song' => $song,
            'formAction' => $this->url('home.update', ['id' => $song->id]),
            'formTitle' => 'Úprava skladby',
        ], 'form');
    }

    public function update(Request $request): Response
    {
        $song = Song::getOne($request->get('id'));
        if ($song === null) {
            return $this->redirect($this->url('home.index'));
        }

        if (!$request->isPost()) {
            return $this->redirect($this->url('home.edit', ['id' => $song->id]));
        }

        $song->setFromRequest($request);
        $song->save();

        return $this->redirect($this->url('home.index'));
    }

    public function delete(Request $request): Response
    {
        $song = Song::getOne($request->get('id'));
        if ($song !== null) {
            $song->delete();
        }

        return $this->redirect($this->url('home.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFileRequest;
use App\Http\Resources\FileResource;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class FileController extends Controller
{
    public function myFiles(string $folder = null)
    {
        if ($folder) {
            $folder = File::query()->where('created_by', Auth::id())->where('path', $folder)->firstOrFail();
        } else {
            $folder = $this->getRoot();
        }
        $files = File::query()->where('parent_id', $folder->id)->where('created_by', Auth::id())->orderBy('is_folder', 'DESC')->orderBy('created_at', 'DESC')->paginate(10);
        $files = FileResource::collection($files);
        return Inertia::render('MyFiles', compact('files'));
    }

    public function trash()
    {
    }

    public function sharedWithMe()
    {
    }

    public function sharedByMe()
    {
    }

    public function createFolder(StoreFileRequest $request)
    {
        $data = $request->validated();
        $parent = $request->parent;
        if (!$parent) {
            $parent = $this->getRoot();
        }

        $file = new File();
        $file->is_folder = 1;
        $file->name = $data['name'];

        $parent->appendNode($file);
    }

    private function getRoot()
    {
        return File::query()->whereIsRoot()->where('created_by', Auth::id())->firstOrFail();
    }

    public function store()
    {
    }
}

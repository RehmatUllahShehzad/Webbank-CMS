<?php


namespace App\Repositories;

use Exception;
use App\Models\News;
use Illuminate\Http\Request;
use Topdot\Core\Models\TempMedia;
use Illuminate\Support\Facades\Auth;
use Topdot\Core\Contracts\Repositories\CanFilterRecords;

class NewsRepository implements CanFilterRecords
{

    public function get(Request $request, $paginate = 50, $sortOrder = 'Asc', $orderBy = 'id')
    {
        $query = News::query();
        if ($request->title) {
            $query->where('title', 'LIKE', "%{$request->title}%");
        }

        $query->orderBy($orderBy, $sortOrder);

        return $paginate != false ? $query->paginate($paginate) : $query->get();
    }

    public function store(Request $request)
    {
        $image = null;
        if ($request->hasFile('feature')) {
            $media = TempMedia::create()->addMediaFromRequest('feature')->toMediaCollection('image');
            $image = route('api.medias.show', $media);
        }
        try {

            if ($request->is_featured == 1) {
                News::query()->update(['is_featured' => 0]);
            }

            $news =  News::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'description' => $request->description,
                'date' => $request->date,
                'feature' => $image,
                'is_active' => $request->status == '0',
                'is_featured' => $request->is_featured,

            ]);

            return $news;
        } catch (\Exception $exception) {
            throw new Exception($exception);
        }
    }

    public function update(Request $request, News $news)
    {
        try {

            $image = $news->feature;

            if ($request->hasFile('feature')) {

                $media = TempMedia::create()->addMediaFromRequest('feature')->toMediaCollection('image');
                $image = route('api.medias.show', $media);
            }

            if ($request->is_featured == 1) {
                News::query()->update(['is_featured' => 0]);
            }

            $news->update([
                'title' => $request->title,
                'description' => $request->description,
                'date' => $request->date,
                'feature' => $image,
                'is_featured' => $request->is_featured,
                'is_active' => $request->status,
            ]);

            return $news;
        } catch (\Exception $exception) {
            throw new Exception($exception);
        }
    }

    public function delete(News $news)
    {
        $user = Auth::user();
        try {
            if(!$user->hasPermissionTo((config('cms.routeNamePrefix').'news.destroy')) && !$user->isAdmin()){
                abort(403, 'Forbidden! User does not have permission');
            }
            return $news->delete();
        } catch (\Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }
}

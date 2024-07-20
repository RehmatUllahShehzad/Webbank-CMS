<?php


namespace Topdot\Slider\Repositories;


use Exception;
use Illuminate\Http\Request;
use Topdot\Slider\Models\Slider;
use Topdot\Core\Models\TempMedia;
use Illuminate\Support\Facades\Auth;
use Topdot\Core\Contracts\Repositories\CanFilterRecords;


class SliderRepository implements CanFilterRecords
{

    public function get(Request $request, $paginate = 50, $sortOrder = 'Asc', $orderBy = 'id')
    {
        $query = Slider::query();

        if ($request->title) {
            $query->where('title', 'LIKE', "%{$request->title}%");
        }

        $query->orderBy($orderBy, $sortOrder);

        return $paginate != false ? $query->paginate($paginate) : $query->get();
    }

    public function store(Request $request)
    {
        try {
            $image = null;
            if ( $request->hasFile('image')  ){
                $media = TempMedia::create()->addMediaFromRequest('image')->toMediaCollection('slider');
                $image = route('api.medias.show',$media);
            }
            return Slider::create([
                'title' => $request->title,
                'slug' => ltrim($request->slug, "\\/"),
                'image' => $image,
                // 'url' => $request->url,
                'description' => $request->description,
                'sort' => $request->sort,
                'is_active' => $request->status == '1',
            ]);
        } catch (\Exception $exception) {
            throw new Exception($exception);
        }
    }

    public function update(Request $request, Slider $slider)
    {
        try {
            $image = $slider->image;
            if ( $request->hasFile('image')  ){
                $slider->clearMediaCollection('image');
                $media = TempMedia::create()->addMediaFromRequest('image')->toMediaCollection('slider');
                $image = route('api.medias.show',$media);
            }
            return $slider->update([
                'title' => $request->title,
                'slug' => ltrim($request->slug, "\\/"),
                'image' => $image,
                // 'url' => $request->url,
                'description' => $request->description,
                'sort' => $request->sort,
                'is_active' => $request->status == '1',
            ]);
        } catch (\Exception $exception) {
            throw new Exception($exception);
        }
    }

    public function delete(Slider $slider)
    {
        $user = Auth::user();
        try {
            if(!$user->hasPermissionTo((config('cms.routeNamePrefix').'slider.destroy')) && !$user->isAdmin() ){
                abort(403, 'Forbidden! User does not have permission');
            }
            return $slider->delete();
        } catch (\Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }
}

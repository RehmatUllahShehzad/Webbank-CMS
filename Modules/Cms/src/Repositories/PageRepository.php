<?php


namespace Topdot\Cms\Repositories;


use Exception;
use Topdot\Cms\Models\Page;
use Illuminate\Http\Request;
use Topdot\Core\Contracts\Repositories\CanFilterRecords;
use Topdot\Core\Models\TempMedia;


class PageRepository implements CanFilterRecords
{

    public function get(Request $request, $paginate = 50, $sortOrder = 'Asc', $orderBy = 'id')
    {
        $query = Page::query()
            ->type($request->type);
        if ($request->title) {
            $query->where('title', 'LIKE', "%{$request->title}%");
        }

        $query->orderBy($orderBy, $sortOrder);

        return $paginate != false ? $query->paginate($paginate) : $query->get();
    }

    public function store(Request $request)
    {
        try {

            $news =  Page::create([
                'type' => Page::PAGE,
                'title' => $request->title,
                'slug' => ltrim($request->slug, "\\/"),
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'head' => $request->meta,
                'is_standard' => false,
                'is_active' => $request->status == '1',
                'extra_data' => [
                    'is_streaming_page' => $request->has('is_streaming_page') ? true : false,
                    'video_link' => $request->video_link,
                    'video_password' => $request->video_password,
                ]
            ]);

            foreach (TempMedia::find($request->get('feature', [])) as $tempThumbnail) {
                $tempThumbnail->getFirstMedia('default')->move($news, 'feature');
            }

            return $news;

        } catch (\Exception $exception) {
            throw new Exception($exception);
        }
    }

    public function update(Request $request, Page $news)
    {
        try {

            foreach (TempMedia::find($request->get('feature', [])) as $tempThumbnail) {
                $tempThumbnail->getFirstMedia('default')->move($news, 'feature');
            }

            $news->update([
                'type' => Page::PAGE,
                'title' => $request->title,
                'slug' => ltrim($request->slug, "\\/"),
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'head' => $request->meta,
                'is_active' => $request->status == '1',
                'extra_data' => [
                    'is_streaming_page' => $request->has('is_streaming_page') ? true : false,
                    'video_link' => $request->video_link,
                    'video_password' => $request->video_password ?? $news->video_password,
                ]
            ]);

            return $news;

        } catch (\Exception $exception) {
            throw new Exception($exception);
        }
    }

    public function delete(Page $page)
    {
        try {
            if ($page->isStandard()) {
                throw new Exception('Cannot Delete Standard Page');
            }
            return $page->delete();
        } catch (\Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }
}

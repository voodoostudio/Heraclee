@php
    use App\Gallery;
    use App\Posts;
    use Illuminate\Support\Facades\DB;

    /* Last update on site */
    $gallery_date = date('d.m.Y', strtotime(Gallery::orderBy('updated_at', 'desc')->value('updated_at')));
    $gallery_last_date = (!empty($gallery_date)) ? $gallery_date : '';
    $posts_date = date('d.m.Y', strtotime(Posts::orderBy('updated_at', 'desc')->value('updated_at')));
    $posts_last_date = (!empty($posts_date)) ? $posts_date : '';
    $properties_date = date('d.m.Y', strtotime(DB::table('apimo_properties')->select('updated_at')->orderBy('updated_at', 'desc')->value('updated_at')));
    $properties_last_date = (!empty($properties_date)) ? $properties_date : '';

    $last_update = max($posts_last_date, $gallery_last_date, $properties_last_date);
@endphp
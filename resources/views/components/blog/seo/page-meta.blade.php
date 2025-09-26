
@props([
    'title' => null,
    'description' => null,
    'keywords' => null,
    'robots' => null,
])
<div>
      @section('title', "$title")
      @section('meta_description', "$description") 
      @section('meta_keywords', "$keywords")
      @section('meta_robots', "$robots")
</div>
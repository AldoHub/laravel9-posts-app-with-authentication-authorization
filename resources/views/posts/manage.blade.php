@extends("layout")
@section("content")

@if (count($posts) == 0)
<!-- return a message when the posts are empty -->
<p>There are no posts to view at the moment, please add some first</p>

@else
<!-- return all the posts, use foreach -->
@foreach($posts as $post)
    <!-- display the needed component -->
    <x-post-card :post="$post" />
@endforeach



@endif
</div>
@endsection
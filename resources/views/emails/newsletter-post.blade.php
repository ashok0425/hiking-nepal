<x-mail::message>
# {{ $newsletterPost->title }}

@if($newsletterPost->image_url)
<x-mail::panel>
![Newsletter Image]({{ $newsletterPost->image_url }})
</x-mail::panel>
@endif

{!! $newsletterPost->content !!}

</x-mail::message>

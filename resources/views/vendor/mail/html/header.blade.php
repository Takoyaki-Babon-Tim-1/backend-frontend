@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Takoyaki Babon')
<img src="assets/images/logos/takoyaki-babon-logo.svg" class="logo" alt="Takoyaki Babon">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>

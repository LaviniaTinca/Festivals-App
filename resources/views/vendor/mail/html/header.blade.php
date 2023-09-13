<tr>
    <td class="header">
        <a href="http://127.0.0.1:8000/" style="display: inline-block; width: 100%; height: 100%;">
            @if (trim($slot) === 'Laravel')
                <img src="http://127.0.0.1:8000/images/FestivalAppLogo.png" class="logo" alt="FestivalApp Logo">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>

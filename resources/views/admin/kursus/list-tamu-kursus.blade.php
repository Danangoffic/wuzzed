@forelse ($guest as $item)
    @php
        $idx = $loop->index + 1;
        $guest = $item->guest;
    @endphp
    <tr>
        <td>{{ $idx }}</td>
        <td>{{ $guest->name }}</td>
        <td>{{ $guest->phone }}</td>
        <td>{{ $guest->email }}</td>
        <td>{{ strtoupper($item->status_payment) }}</td>
        <td>
            <a class="btn btn-info btn-sm"
                href="{{ route('admin.tamu.show', ['id' => $item->id, 'course' => $item->course]) }}">Detail</a>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="6">Belum ada tamu</td>
    </tr>
@endforelse

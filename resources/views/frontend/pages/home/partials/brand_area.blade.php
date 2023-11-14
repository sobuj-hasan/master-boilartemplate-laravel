<div class="brand-area-two pb-100">
    <div class="container-fluid g-0">
        <div class="brand-item-wrap">
            @php
                $total_trasted_items = $trasted_desc_items->count() / 2;
                $round_total_trasted_items = round($total_trasted_items);
                $activeItemId = null;
            @endphp
            <h4 class="title">
                @forelse ($trusted_clients as $item)
                    {{ $item->title }}
                    @php
                        $activeItemId = $item->id;
                    @endphp
                @empty
                    TRUSTED BY 10,000+ MARKETING TEAMS            
                @endforelse
            </h4>
            <div class="brand-active-two">
                @foreach ($trasted_desc_items->take($round_total_trasted_items) as $item)
                    @if ($item->trusted_client_id == $activeItemId)
                        <div class="brand-item-two">
                            <img src="{{ asset('storage/images/' . $item->photo) }}" width="100" height="25" alt="brand-img">
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="brand-active-three" dir="rtl">
                @foreach ($trasted_asc_items->take($round_total_trasted_items) as $item)
                    @if ($item->trusted_client_id == $activeItemId)
                        <div class="brand-item-two">
                            <img src="{{ asset('storage/images/' . $item->photo) }}" width="100" height="25" alt="brand-img">
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

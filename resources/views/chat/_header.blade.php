<div class="row">
    <div class="col-lg-12">
        <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
            <img style="height: 40px;width: 40px;" src="{{ $getReceiver->getProfileDirect() }}" alt="avatar">
        </a>
        <div class="chat-about">
            <h6 style="margin-bottom: 0px;" class="m-b-0">{{ $getReceiver->name }} {{ $getReceiver->last_name }}</h6>
            <small>
                @if(!empty($getReceiver->OnlineUser()))
                               <span style="color:green;">Online</span>
                @else
                                Last Seen: {{ Carbon\Carbon::parse($getReceiver->updated_at)->diffForHumans() }}
                @endif
            </small>
        </div>
    </div>
    <div class="col-lg-6 hidden-sm text-right">
       
    </div>
</div>
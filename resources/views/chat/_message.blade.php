<div class="chat-header clearfix">
    @include('chat._header')
</div>
<div class="chat-history">
    @include('chat._chat')
</div>
<div class="chat-message clearfix">
    <form action="" id="submit_message" method="post" class="mb-0" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="receiver_id" value="{{ $getReceiver->id }}">
        
        <textarea name="message" id="ClearMessage" class="form-control" required></textarea>
        <div class="row">
            <div class="col-md-6 hidden-sm">
                <a href="javascript:void(0);" id="OpenFile" style="margin-top: 10px;" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                <input type="file" style="display: none;" name="file_name" id="file_name">
                <span id="getFileName"></span>
            </div>
            
            <div class="col-md-6" style="text-align: right;">
                <button type="submit" style="margin-top: 10px;" class="btn btn-primary">Send</button>
            </div>
        </div>
    </form>
</div>

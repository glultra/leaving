<div>
    {{-- The whole world belongs to you. --}}
    @if ($selectedConversation)

    <div class="chatbox_header">
        <div class="return">
            <i class="bi bi-arrow-left"></i>
        </div>

        <div class="img_container">
            <img src="https://ui-avatars.com/api/?name={{$receiverInstance->name}}" alt="">
        </div>
        <div class="name text-white">
            {{ $receiverInstance->name }}
        </div>
        <div class="info">

            <div class="info_item">
                <i class="bi bi-telephone-fill"></i>
            </div>

            <div class="info_item">
                <i class="bi bi-image"></i>
            </div>

            <div class="info_item">
                <i class="bi bi-info-circle-fill"></i>
            </div>
        </div>
    </div>


    <div class="chatbox_body">
        @foreach ($messages as $message)
        <div
            class="msg_body @if(auth()->id() == $message->sender_id) msg_body_me @else msg_body_receiver  @endif "
            @if(auth()->id() == $message->sender_id) style="background-color: #1f2937 ;color:white; width:80%;max-width:80%;max-width:max-content;" @endif>
            {{$message->body}}
            <div class="msg_body_footer">
                <div class="date">
                    {{ $message->created_at->format('m:i A') }}
                </div>
                <div class="read">
                    <i class="bi bi-black"></i>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{--
    <div class="chatbox_footer" style="background-color: #0f172a">

    </div> --}}

    <script>
        $('.chatbox_body').on('scroll', function(){
            var top = $('.chatbox_body').scrollTop();
            if(top == 0){
                window.livewire.emit('loadmore');
            }
        });
    </script>

    <script>
        window.addEventListener('updatedHeight', event=>{

            let old = event.detail.height;
            let newHeight = $('.chatbox_body')[0].scrollHeight;
            let height = $('.chatbox_body').scrollTop(newHeight - old);

            window.livewire.emit('updateHeight', {
                height:height,
            });
        });
    </script>

    @else
    <div class="fs-4 text-center text-primary mt-5">
        No Conversation
    </div>
    @endif

    <script>
        window.addEventListener('rowChatToBottom', event=>{
            $('.chatbox_body').scrollTop($('.chatbox_body')[0].scrollHeight);
        });
    </script>
</div>

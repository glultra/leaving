<div>
    {{-- The Master doesn't talk, he acts. --}}

    @if ($selectedConversation)
        <form wire:submit.prevent='sendMessage' action="">
            <div class="chatbox_footer" style="background-color: #0f172a">
                <div class="custom_form_group" >
                    <input  wire:model.lazy='body' type="text" placeholder="Write a message" class="control" style="background-color: #1f2937">
                    <button type="submit" class="submit"> Send</button>
                </div>
            </div>
        </form>
    @endif

</div>
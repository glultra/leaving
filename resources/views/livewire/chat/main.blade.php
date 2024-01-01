<div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    @vite(['resources/css/chat.css'])
    {{-- Care about people's approval and you will be their prisoner. --}}
    <x-navigations :activeItem=5 :key=5 />
    <div class="chat_container dark:text-white">
        <div class="chat_list_container">
            @livewire('chat.chat-list')
        </div>
        <div class="chat_box_container">

            @livewire('chat.chat-box')

            @livewire('chat.send-message')
        </div>
    </div>

    <script>
        window.addEventListener('chatSelected', event =>{
            if(window.innerWidth < 768){
                $('.chat_list_container').hide();
                $('.chat_box_container').show();
            }

            $('.chatbox_body').scrollTop($('.chatbox_body')[0].scrollHeight);

            let height = $('.chatbox_body')[0].scrollHeight;
            // alert(height);
            window.livewire.emit('updateHeight', {
                height:height,
            });
        });

        $(window).resize(function(){
            if(window.innerWidth > 768){
                $('.chat_list_container').show();
                $('.chat_box_container').show();
            }
        });

        $(document).on('click', '.return', function(){
            $('.chat_list_container').show();
            $('.chat_box_container').hide();
        });


    </script>
</div>

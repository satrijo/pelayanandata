<div id="WAButton"></div>
<script type="text/javascript">

    ////////////////////////////////////////////////////////////////////////////////
    // Thanks to: https://github.com/rafaelbotazini/floating-whatsapp for the script
    ////////////////////////////////////////////////////////////////////////////////


    $(function () {
        $('#WAButton').floatingWhatsApp({
            phone: '628114037700', //WhatsApp Business phone number
            headerTitle: 'Chat with us on WhatsApp!', //Popup Title
            popupMessage: `Halo ada yang bisa kami bantu? Silahkan chat kami apabila ingin berdiskusi mengenai pelayanan data.`, //Popup Message
            showPopup: true, //Enables popup display
            buttonImage: '<img src="/images/whatsapp.svg" />', //Button Image
            //headerColor: 'crimson', //Custom header color
            //backgroundColor: 'crimson', //Custom background button color
            position: "right" //Position: left | right

        });

    });
</script>

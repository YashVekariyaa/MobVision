<!-- JS
============================================ -->

    <!-- Plugins JS -->
    <script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>

    <!-- Main JS -->
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    
    <!-- Main JS -->
    <script src="<?php echo base_url(); ?>assets/js/set.js"></script>
    
    <!--Admin js-->
    <script src="<?php echo base_url(); ?>admin_assets/js/set.js" type="text/javascript"></script>
    
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-624ea894242ddf02"></script>


<!--crisp-->
<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="27075902-0d7b-4e8e-8c34-0861bd229c0a";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>

<!--translater-->
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>



<!--qrcode-->
    <script src="<?php echo base_url(); ?>assets/js/qrcode.js" type="text/javascript"></script>
    
    <script>


                
                    
                        $("#qrcode").html("");
                        var txt = $.trim($('input[name="qrvalue"]').val());
                        generateQRcode('100', '100', txt);
                        
                   

                    function generateQRcode(width, height, text) {
                        $('#qrcode').qrcode({width: width, height: height, text: text});
                    }

                


            </script>
    
<!--voice to text-->    
<script>
  function startDictation() {
 
    if (window.hasOwnProperty('webkitSpeechRecognition')) {
 
      var recognition = new webkitSpeechRecognition();
 
      recognition.continuous = false;
      recognition.interimResults = false;
 
      recognition.lang = "en-US";
      recognition.start();
 
      recognition.onresult = function(e) {
        document.getElementById('transcript').value
                                 = e.results[0][0].transcript;
        recognition.stop();
//        document.getElementById('filter_form').submit();
      };
 
      recognition.onerror = function(e) {
        recognition.stop();
      }
 
    }
  }
</script>



        <!--Google captcha link-->
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
    </script>
    <!--Google captcha code-->
    <script type="text/javascript">
      var verifyCallback = function(response) {
       
      };
      var onloadCallback = function() {
        
        widgetId1 = grecaptcha.render('example1', {
          'sitekey' : '<?php echo CAPTCHA_SITE_KEY; ?>',
          'callback' : verifyCallback,
          'theme' : 'light'
        });
      };
    </script>
function validation_engine_call(){
    'use strict';
    $('#formID,.validate_form').validationEngine('hideAll');
    $("#formID,.validate_form").validationEngine('detach');
    $("#formID,.validate_form").validationEngine('attach', {
        showOneMessage: false,
        promptPosition: "bottomLeft",
        autoHidePrompt: false,
        scroll: true,
        
    });
}
jQuery(document).ready(function($) {
    'use strict';
    validation_engine_call();
});
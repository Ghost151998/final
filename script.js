(function(){$.fn.goValidate = function() {
    var $form = this,
        $inputs = $form.find('input:text, input:password'),
        $selects = $form.find('select'),
        $textAreas = $form.find('textarea');
  
    var validators = {
        reg_no: {
          regex: /^20[0-9]{6}$/
        },
        author: {
            regex:/^[A-Za-z]{3,50}$/
        },
        edition: {
            regex: /^[0-9]{0,3}$/
        },
        color: {
            regex: /^[A-Za-z]{3,20}$/
        },
        item_name: {
            regex: /^[A-Za-z]{3,30}$/
        },
        price: {
            regex: /^[0-9]{1,6}$/
        },
        description: {
            regex: /^[a-zA-Z0-9\s]{5,500}$/
        },
       
        firstName: {
            regex: /^[A-Za-z]{3,30}$/
        },
        lastName: {
            regex: /^[A-Za-z]{3,50}$/
        },
       
        pass: {
            regex: /^[\d\D]{6,20}$/
        },
        pass_retype: {
            regex: /^[\d\D]{6,20}$/
        },  
        email: {
            regex: /^[a-zA-z0-9\.\-_]*[@][a-z]*[?'mail']*[\.][a-z]{2,4}$/
        },
        phone: {
            regex:/^[0-9]{10}$/
        },
        address:{
            regex: /^[a-zA-Z0-9\s]{5,200}$/
        }
    };
    var validate = function(klass, value) {
        var isValid = true,
            error = '';
            
        if (!value && /required/.test(klass)) {
            error = 'This field is required';
            isValid = false;
        } else {
            klass = klass.split(/\s/);
            $.each(klass, function(i, k){
                if (validators[k]) {
                    if (value && !validators[k].regex.test(value)) {
                        isValid = false;
                        error = validators[k].error;
                    }
                }
            });
        }
        return {
            isValid: isValid,
            error: error
        }
    };
    var showError = function($e) {
        var klass = $e.attr('class'),
            value = $e.val(),
            test = validate(klass, value);
      
        $e.removeClass('invalid');
        $('#form-error').addClass('hide');
        
        if (!test.isValid) {
            $e.addClass('invalid');
            
            if(typeof $e.data("shown") == "undefined" || $e.data("shown") == false){
               $e.popover('show');
            }
            
        }
      else {
        $e.popover('hide');
      }
    };
   
    $inputs.keyup(function() {
        showError($(this));
    });
    $selects.change(function() {
        showError($(this));
    });
    $textAreas.keyup(function() {
        showError($(this));
    });
  
    $inputs.on('shown.bs.popover', function () {
  		$(this).data("shown",true);
	});
  
    $inputs.on('hidden.bs.popover', function () {
  		$(this).data("shown",false);
	});
  
    $form.submit(function(e) {
      
        $inputs.each(function() { /* test each input */
        	if ($(this).is('.required') || $(this).hasClass('invalid')) {
            	showError($(this));
        	}
    	});
    	$selects.each(function() { /* test each input */
        	if ($(this).is('.required') || $(this).hasClass('invalid')) {
            	showError($(this));
        	}
    	});
    	$textAreas.each(function() { /* test each input */
        	if ($(this).is('.required') || $(this).hasClass('invalid')) {
            	showError($(this));
        	}
    	});
        if ($form.find('input.invalid').length) { /* form is not valid */
        	e.preventDefault();
            $('#form-error').toggleClass('hide');
        }
    });
    return this;
};



	$('form').goValidate();})();
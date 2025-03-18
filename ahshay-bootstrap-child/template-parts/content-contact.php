<?php
/**
 * The template for displaying content in the page-contact.php template.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
        $bg_color_section = get_field('bg_color_section');
        $bg_graphic = get_field('bg_graphic');
    ?>
    <section class="section-contact-us section-banner" <?php if($bg_color_section && !empty($bg_graphic)){ ?>style="background: linear-gradient(<?php echo $bg_color_section;?>, <?php echo $bg_color_section;?>), url('<?php echo esc_url($bg_graphic['url']); ?>') center center no-repeat;" <?php }else{ ?>style="background-color: <?php echo $bg_color_section;?>"<?php } ?>>
        <div class="container pt-5 mt-md-5 pb-5">
            <div class="row">
                <?php
                $welcome = get_field('welcome');
                if ( $welcome ):
                ?>
                <div class="col-md-5">
                    <h1 class="cl-light-teal text-uppercase px-lg-5 text-center welcome pb-lg-0 pb-5 mb-0 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $welcome; ?></h1>
                </div>
                <?php endif; ?>
                <div class="col-md-7">
                    <div class="box-form box-form-contactpage bg-white radius-6 p-4 mb-md-5">
                       <!--<h3 class="cl-black pb-lg-5 pb-4 mb-0"><?php the_title();?></h3>-->
                        <!--<script src="https://s3-us-west-2.amazonaws.com/bloomerang-public-cdn/ahshay/.widget-js/22528.js" type="text/javascript"></script>-->
                        <script type="text/javascript" id="bloomerangForm18432"></script>
                        <script type="text/javascript">
                            var insertForm18432 = function() {
                                var html18432 = '<style text=\'text/css\'>' +
                                    '.interaction-form label{color: #404040;' +
                                    '                display: block;}' +
                                    '' +
                                    '.interaction-form label.error{color:#900;' +
                                    '                display: inline-block; ' +
                                    '                padding: 0 10px;}' +
                                    '' +
                                    '.interaction-form .field{padding: 4px 0;}' +
                                    '' +
                                    '.interaction-form .field .required-star{color: #aa0000; ' +
                                    '                display: inline-block; ' +
                                    '                margin-left: 5px;}' +
                                    '' +
                                    '.interaction-form .field .checkboxes{max-width:275px;' +
                                    '                border: 1px solid #A9A9A9;' +
                                    '                -webkit-transition: all .3s ease-out;' +
                                    '                -moz-transition: all .3s ease-out;' +
                                    '                transition: all .3s ease-out;}' +
                                    '' +
                                    '.interaction-form .field .checkbox{display:block;' +
                                    '                position:relative;' +
                                    '                -moz-box-sizing:border-box;' +
                                    '                box-sizing:border-box;' +
                                    '                height:30px;' +
                                    '                line-height:26px;' +
                                    '                padding:2px 28px 2px 8px;' +
                                    '                border-bottom:1px solid rgba(0,0,0,0.1);' +
                                    '                color:#404040;  ' +
                                    '                overflow:hidden;' +
                                    '                text-decoration:none; }' +
                                    '' +
                                    '.interaction-form .field .checkbox input{opacity:0.01;' +
                                    '                position:absolute;' +
                                    '                left:-50px;  ' +
                                    '                z-index:-5;}' +
                                    '' +
                                    '.interaction-form .field .checkbox:last-child{border-bottom:none;}' +
                                    '' +
                                    '.interaction-form .field .checkbox.selected{background: rgb(50, 142, 253);' +
                                    '                color:#fff; }' +
                                    '' +
                                    '.interaction-form .field .checkbox.selected:before{color:#fff;' +
                                    '                line-height:30px;' +
                                    '                position:absolute;' +
                                    '                right:10px; }' +
                                    '' +
                                    '.interaction-form .field.radio input,' +
                                    '                     .interaction-form .field.checkbox input{width: auto;' +
                                    '                margin-left:0;}' +
                                    '' +
                                    '.interaction-form .section.consent .field.checkbox:not(.consent-all){margin-left: 20px;}' +
                                    '' +
                                    '.interaction-form .field input,' +
                                    '                     .interaction-form .field select,' +
                                    '                     .interaction-form .field textarea{padding: 4px; ' +
                                    '                max-width: 100%;' +
                                    '                width: 100%}' +
                                    '' +
                                    '.interaction-form .field textarea.international{height: 120px;}' +
                                    '' +
                                    '.interaction-form .errors{border: 1px solid #900;' +
                                    '                color: #900;  ' +
                                    '                padding: 10px;}' +
                                    '' +
                                    '.interaction-form .hidden{display: none;}' +
                                    '' +
                                    '.btn-group .btn-submit-email{padding: 4px 10px;}' +
                                    '' +
                                    'input, select, textarea, button{font-family: inherit;}' +
                                    '' +
                                    '</style>' +
                                    '' +
                                    '<div id="interaction-form-container">' +
                                    '  <form id="interaction-form" class="interaction-form" method="post" action="javascript:void(0)">' +
                                    '    <div class="errors hidden"></div>' +
                                    '    <div class="section contact">' +
                                    '      <h3>Contact Information</h3>' +
                                    '      <div class="field text first-name required" >' +
                                    '<label for="first-name"><span class="label">First Name</span><span class="required-star">*</span></label>' +
                                    '<input id="first-name" name="first-name" class="required" type="text"></input>' +
                                    '</div>' +
                                    '<div class="field text last-name required" >' +
                                    '<label for="last-name"><span class="label">Last Name</span><span class="required-star">*</span></label>' +
                                    '<input id="last-name" name="last-name" class="required" type="text"></input>' +
                                    '</div>' +
                                    '<div class="field email email-address required" >' +
                                    '<label for="email-address"><span class="label">Email</span><span class="required-star">*</span></label>' +
                                    '<input id="email-address" name="email-address" class="email required" type="email" placeholder="someone@website.com"></input>' +
                                    '</div>' +
                                    '<div class="field tel phone-number" >' +
                                    '<label for="phone-number"><span class="label">Phone</span></label>' +
                                    '<input id="phone-number" name="phone-number" class="phoneUS" type="tel"></input>' +
                                    '</div>' +
                                    '' +
                                    '</div>' +
                                    '    <div class="section custom-fields">' +
                                    '      <div class="field text CustomInteractionField_21505" >' +
                                    '<label for="CustomInteractionField_21505"><span class="label">Title</span></label>' +
                                    '<input id="CustomInteractionField_21505" name="CustomInteractionField_21505" type="text" maxlength="255"></input>' +
                                    '</div>' +
                                    '<div class="field text CustomInteractionField_21504" >' +
                                    '<label for="CustomInteractionField_21504"><span class="label">Organization</span></label>' +
                                    '<input id="CustomInteractionField_21504" name="CustomInteractionField_21504" type="text" maxlength="255"></input>' +
                                    '</div>' +
                                    '<div class="field text CustomInteractionField_20480 required" >' +
                                    '<label for="CustomInteractionField_20480"><span class="label">Message</span><span class="required-star">*</span></label>' +
                                    '<input id="CustomInteractionField_20480" name="CustomInteractionField_20480" class="required" type="text" maxlength="255"></input>' +
                                    '</div>' +
                                    '' +
                                    '</div>' +
                                    '    <div class="section consent">' +
                                    '      <div class="field checkbox consent-all" >' +
                                    '<label for="consent-all"><input id="consent-all" name="consent-all" type="checkbox" maxlength="255"></input><span class="label">I’d like to receive news and updates from AHSHAY.</span></label>' +
                                    '</div>' +
                                    '</div>' +
                                    '    ' +
                                    '    <div class="btn-group">' +
                                    '      <input class="btn btn-submit btn-submit-interaction" type="submit" value="Submit"/>' +
                                    '    </div>' +
                                    '  </form>' +
                                    '</div>' +
                                    '' +
                                    '' +  '';var successHtml18432 = '<div class=\'donation-success\'>' +
                                   
                                    '  <p>Thank you for your message. We\u0026#39;ll get in touch soon.</p>' +
                                    '   ' +
                                    '</div>';( function($) {if (!Bloomerang.useInteractionId('18432')) {
                                    html18432 = '<p style="color: red">Only one Volunteer Activity or Constituent Information form can be used on each page.</p>';
                                }
                                    if (jQuery('#bloomerangForm18432').length) {

                                        jQuery('#bloomerangForm18432').after(html18432);


                                    };
                                    if (Bloomerang.interactionFormLoaded) {
                                        return false;
                                    }
                                    Bloomerang.interactionFormLoaded = true;
                                    jQuery('.interaction-form .section.captcha').attr('style', 'display: none');

                                    Bloomerang.useKey('pub_e92440ec-24af-11ee-88e1-06a93b859ab9');

                                    // Register proper callbacks for various stages/outcomes of submission
                                    Bloomerang.Widget.Interaction.OnSubmit = function (args) {
                                        jQuery(".btn-submit-interaction").val("Submitting...").prop("disabled", true).addClass("disabled");
                                        var val = function (selector) { return jQuery(selector).val(); };

                                        Bloomerang.Account
                                            .individual()
                                            .firstName(val(".interaction-form #first-name"))
                                            .lastName(val(".interaction-form #last-name"))
                                            .homeEmail(val(".interaction-form #email-address"))
                                            .homePhone(val(".interaction-form #phone-number"))
                                            .applyInteractionCustomFields();

                                        if (jQuery(".interaction-form #consent-all").prop("checked")) {
                                            Bloomerang.Account.optedInStatus(jQuery(".interaction-form #consent-email").prop("checked"),
                                                jQuery(".interaction-form #consent-mail").prop("checked"),
                                                jQuery(".interaction-form #consent-phone").prop("checked"));
                                        }

                                        // Always sending the address, even if it's blank, because we need to know the Country for GDPR purposes
                                        var country = val(".interaction-form #country");
                                        var state = Bloomerang.Util.getCorrectState(country, val(".interaction-form #state"), val(".interaction-form #province"));
                                        var zipCode = Bloomerang.Util.getCorrectZipCode(country, val(".interaction-form #zip-code"), val(".interaction-form #postal-code"));
                                        Bloomerang.Account.homeAddress(val(".interaction-form #street-address"),
                                            val(".interaction-form #city"),
                                            state,
                                            zipCode,
                                            country);

                                        Bloomerang.Interaction.note(val(".interaction-form #comment"));

                                        if (jQuery("#volunteer-date").length) {
                                            Bloomerang.Interaction.date(jQuery("#volunteer-date").val());
                                        }

                                        Bloomerang.Interaction.applyInteractionCustomFields();
                                    };
                                    Bloomerang.ValidateInteractionFormCaptcha = function() {
                                        if (typeof(grecaptcha) !== "undefined" && jQuery("#captcha" + Bloomerang.Data.WidgetIds.Interaction).children().length) {
                                            var captchaResponse = grecaptcha.getResponse(jQuery(".interaction-form").data("captcha-id"));
                                            if (captchaResponse) {
                                                jQuery(".interaction-form .noCaptchaResponseError").hide();
                                                Bloomerang.captchaResponse(captchaResponse);
                                                return true;
                                            } else {
                                                jQuery(".interaction-form .noCaptchaResponseError").show();
                                                return false;
                                            }
                                        } else return true;
                                    };
                                    Bloomerang.Api.OnSuccess = Bloomerang.Widget.Interaction.OnSuccess = function (response) {
                                        jQuery("#interaction-form-container").html(successHtml18432);
                                        var distance = 100;
                                        var offset = jQuery("#interaction-form-container").offset().top;
                                        var offsetTop = offset > distance ? offset - distance : offset;
                                        jQuery('html, body').animate({ scrollTop : offsetTop}, 500);
                                    };
                                    Bloomerang.Api.OnError = Bloomerang.Widget.Interaction.OnError = function (response) {
                                        jQuery(".btn-submit-interaction").val("Submit").prop("disabled", false).removeClass("disabled");
                                        jQuery("#interaction-form-container .errors").removeClass("hidden").html(response.Message);
                                        var distance = 100;
                                        var offset = jQuery("#interaction-form-container .errors").offset().top;
                                        var offsetTop = offset > distance ? offset - distance : offset;
                                        jQuery('html, body').animate({ scrollTop : offsetTop}, 500);
                                        if (typeof(grecaptcha) !== "undefined" && jQuery("#captcha" + Bloomerang.Data.WidgetIds.Interaction).children().length) {
                                            grecaptcha.reset(jQuery(".interaction-form").data("captcha-id"));
                                        }
                                    };

                                    Bloomerang.Util.applyInteractionCustomFields = function (obj, type) {

                                        // Clear any fields from a previous failed submission
                                        obj.clearCustomFields();

                                        // Apply all <input> (not multiselect), <select> and <textarea> fields
                                        jQuery(".interaction-form .section.custom-fields :input:not(a > input, select)[id*=" + type + "]").each(function() {
                                            if (jQuery(this).val().hasValue()) {
                                                obj.customFreeformField(jQuery(this).attr("id").toUntypedValue(), jQuery(this).val());
                                            }
                                        });

                                        // Apply all <select> fields
                                        jQuery(".interaction-form .section.custom-fields select[id*=" + type + "]").each(function() {
                                            if (jQuery(this).val().hasValue()) {
                                                obj.customPickField(jQuery(this).attr("id").toUntypedValue(), jQuery(this).val());
                                            }
                                        });

                                        // Apply all multiselect fields
                                        jQuery(".interaction-form .section.custom-fields .checkboxes[id*=" + type + "]").each(function() {
                                            obj.customPickField(jQuery(this).attr("id").toUntypedValue(),
                                                jQuery.map(jQuery(this).children(".checkbox.selected"), function(v) { return jQuery(v).attr("data-id"); }));
                                        });
                                    };

                                    String.prototype.hasValue = function() {
                                        return (this && jQuery.trim(this)); //IE8 doesn't have a native trim function
                                    };

                                    Bloomerang.Account.applyInteractionCustomFields = function () {
                                        Bloomerang.Util.applyInteractionCustomFields(this, "Account");
                                        return this;
                                    };

                                    Bloomerang.Interaction.applyInteractionCustomFields = function () {
                                        Bloomerang.Util.applyInteractionCustomFields(this, "Interaction");
                                        return this;
                                    };

                                    String.prototype.toUntypedValue = function() {
                                        return this.substring(this.indexOf('_') + 1);
                                    };

                                    jQuery.validator.addMethod("phoneUS", function(phone_number, element) {
                                        var digits = phone_number.replace(/\D/g, "");
                                        return this.optional(element) || digits.length == 7 || digits.length == 10 || digits.length == 11;
                                    }, "Please specify a valid phone number or use '+' for international.");

                                    jQuery.validator.addMethod("phoneInternational", function (phone_number, element) {
                                        return this.optional(element) || /^\+[0-9\-\(\)\s.]+$/i.test(phone_number);
                                    }, "Please specify a valid phone number.");
                                    jQuery.validator.classRuleSettings.phoneInternational = { phoneInternational: true };

                                    jQuery.validator.addMethod("zipcodeUS", function (value, element) {
                                        return this.optional(element) || /\d{5}-\d{4}$|^\d{5}$/.test(value)
                                    }, "The specified US ZIP Code is invalid");

                                    jQuery.validator.addMethod("currency", function (value, element, options) {
                                        return !value ||
                                            value
                                                .replace("$", "")
                                                .replace(".", "")
                                                .split(",").join("")
                                                .match(/^\d+$/g);
                                    }, "Not a valid currency");

                                    jQuery.validator.classRuleSettings.currency = { currency: true };

                                    jQuery.validator.addMethod("number", function (value, element, options) {
                                        return !value ||
                                            value
                                                .replace(".", "")
                                                .split(",").join("")
                                                .match(/^\d+$/g);
                                    }, "Not a valid number");

                                    jQuery.validator.classRuleSettings.number = { number: true };

                                    jQuery.validator.addMethod("validYear", function (value, element, options) {
                                        try {
                                            return (!value || value.match(/^[1-9]\d\d\d$/)) ? true : false;
                                        }
                                        catch (e) {
                                            return false;
                                        }
                                    }, function () { return "Must be a 4 digit year"; });

                                    jQuery.validator.classRuleSettings.validYear = { validYear: true };

                                    jQuery(".interaction-form #country").change(function(event) {
                                        var element = jQuery(event.target || event.srcElement); // cross-browser event target selection
                                        var isInternational = (element.val() != "US" && element.val() != "CA" && element.val() != "BM");
                                        // TODO: Remove this when we have figured out the canada state/province issue
                                        Bloomerang.Util.addLog("Pre country change: Country=" + element.val() + ", State=" + jQuery(".interaction-form #state").val() + ", Province=" + jQuery(".interaction-form #province").val() + ", City=" + jQuery(".interaction-form #city").val());
                                        jQuery(".interaction-form #state, .interaction-form #province").val(""); // clear the state when the country changes
                                        jQuery(".interaction-form .field.city, .interaction-form .field.state, .interaction-form .field.province, .interaction-form .field.zip-code, .interaction-form .field.postal-code").toggle(!isInternational);
                                        if (element.val() == "BM") {
                                            jQuery(".interaction-form .field.city .label").text(jQuery(".interaction-form .field.city input").data("bm-label"));
                                        } else if (element.val() == "US" || element.val() == "CA") {
                                            jQuery(".interaction-form .field.city .label").text(jQuery(".interaction-form .field.city input").data("us-label"));
                                        }
                                        jQuery(".interaction-form #street-address").toggleClass("international", isInternational);
                                        if (element.val() == "US") {
                                            jQuery(".interaction-form .field.state, .interaction-form .field.zip-code").show();
                                            jQuery(".interaction-form .field.province, .interaction-form .field.postal-code").hide();
                                        } else if (element.val() == "CA") {
                                            jQuery(".interaction-form .field.state, .interaction-form .field.zip-code").hide();
                                            jQuery(".interaction-form .field.province, .interaction-form .field.postal-code").show();
                                        } else if (element.val() == "BM") {
                                            jQuery(".interaction-form .field.state, .interaction-form .field.province, .interaction-form .field.zip-code").hide();
                                            jQuery(".interaction-form .field.postal-code").show();
                                        } else {
                                            jQuery(".interaction-form #city, .interaction-form #zip-code, .interaction-form #postal-code").val("");
                                        }
                                        jQuery(".interaction-form .section.consent").toggleClass("hidden", !Bloomerang.Util.isCountryInEurope(element.val()));
                                        // TODO: Remove this when we have figured out the canada state/province issue
                                        Bloomerang.Util.addLog("Post country change: Country=" + element.val() + ", State=" + jQuery(".interaction-form #state").val() + ", Province=" + jQuery(".interaction-form #province").val()+ ", City=" + jQuery(".interaction-form #city").val());
                                    });

                                    // TODO: Remove this when we have figured out the canada state/province issue
                                    // We use the focusin function to save the previous value so we can log out the previous and new values on change
                                    // https://stackoverflow.com/questions/29118178/input-jquery-get-old-value-before-onchange-and-get-value-after-on-change/29118530
                                    jQuery(".interaction-form #state").focusin(function(e) {
                                        var element = jQuery(e.target || e.srcElement); // cross-browser event target selection
                                        element.data('val', element.val());
                                    });

                                    // TODO: Remove this when we have figured out the canada state/province issue
                                    jQuery(".interaction-form #state").change(function(e) {
                                        var element = jQuery(e.target || e.srcElement); // cross-browser event target selection
                                        var prev = element.data('val');
                                        var current = element.val();
                                        var provinceElement = jQuery(".interaction-form #province");
                                        var prevProvince = provinceElement.data('val');
                                        var currentProvince = provinceElement.val();
                                        Bloomerang.Util.addLog("State Changed: Target=" + e.target.name + ", PreValue=" + prev + ", Value=" + current + ", Province PreValue =" + prevProvince + ", Province CurrentValue =" + currentProvince);
                                    });

                                    // TODO: Remove this when we have figured out the canada state/province issue
                                    // We use the focusin function to save the previous value so we can log out the previous and new values on change
                                    // https://stackoverflow.com/questions/29118178/input-jquery-get-old-value-before-onchange-and-get-value-after-on-change/29118530
                                    jQuery(".interaction-form #province").focusin(function(e) {
                                        var element = jQuery(e.target || e.srcElement); // cross-browser event target selection
                                        element.data('val', element.val());
                                    });

                                    // TODO: Remove this when we have figured out the canada state/province issue
                                    jQuery(".interaction-form #province").change(function(e) {
                                        var element = jQuery(e.target || e.srcElement); // cross-browser event target selection
                                        var prev = element.data('val');
                                        var current = element.val();
                                        var stateElement = jQuery(".interaction-form #state");
                                        var prevState = stateElement.data('val');
                                        var currentState = stateElement.val();
                                        Bloomerang.Util.addLog("Province Changed: Target=" + e.target.name + ", PreValue=" + prev + ", Value=" + current + ", State PrevValue=" + prevState + ", State Current=" + currentState);
                                    });

                                    // TODO: Remove this when we have figured out the canada state/province issue
                                    // We use the focusin function to save the previous value so we can log out the previous and new values on change
                                    // https://stackoverflow.com/questions/29118178/input-jquery-get-old-value-before-onchange-and-get-value-after-on-change/29118530
                                    jQuery(".interaction-form #city").focusin(function(e) {
                                        var element = jQuery(e.target || e.srcElement); // cross-browser event target selection
                                        element.data('val', element.val());
                                    });

                                    // TODO: Remove this when we have figured out the canada state/province issue
                                    jQuery(".interaction-form #city").change(function(e) {
                                        var element = jQuery(e.target || e.srcElement); // cross-browser event target selection
                                        var prev = element.data('val');
                                        var current = element.val();
                                        Bloomerang.Util.addLog("City Changed: Target=" + e.target.name + ", PreValue=" + prev + ", Value=" + current);
                                    });

                                    jQuery(".interaction-form #phone-number").change(function () {
                                        var phoneField = jQuery(".interaction-form #phone-number");
                                        var internationalNumber = phoneField.val().substring(0,1) === '+';
                                        phoneField.toggleClass("phoneUS", !internationalNumber);
                                        phoneField.toggleClass("phoneInternational", internationalNumber);
                                    })

                                    // Intercept form submission to validate then submit via API
                                    jQuery("#interaction-form-container form").validate({
                                        submitHandler: function () {
                                            if (!Bloomerang.ValidateInteractionFormCaptcha()) {
                                                return false;
                                            }

                                            // Restore proper callbacks in case there are multiple widgets on the page
                                            Bloomerang.Api.OnSubmit = Bloomerang.Widget.Interaction.OnSubmit;
                                            Bloomerang.Api.OnSuccess = Bloomerang.Widget.Interaction.OnSuccess;
                                            Bloomerang.Api.OnError = Bloomerang.Widget.Interaction.OnError;
                                            Bloomerang.Api.submitInteraction();
                                        }
                                    });

                                    // Show opt-in options based on the setting of the global opt-in
                                    jQuery(".interaction-form .field.consent-all").change(function() {
                                        jQuery(".interaction-form .field.consent-all").siblings().each(function(i, e) {
                                            jQuery(e).toggle();
                                        });
                                    });

                                })(jQuery);
                            };

                            var startBloomerangLoad = function() {
                                if (window.bloomerangLoadStarted == undefined) {
                                    window.bloomerangLoadStarted = true;
                                    var script = document.createElement('script');
                                    script.type = 'text/javascript';
                                    script.src = 'https://crm.bloomerang.co/Content/Scripts/Api/Bloomerang-v2.js?nocache=2023-08-03';
                                    document.getElementsByTagName('head')[0].appendChild(script);
                                    waitForBloomerangLoad(function() { Bloomerang.Util.requireJQueryValidation(function() { insertForm18432(); })});
                                }
                                else {
                                    waitForBloomerangLoad(function() { Bloomerang.Util.requireJQueryValidation(function() { insertForm18432(); })});
                                }
                            };

                            var waitForBloomerangLoad = function(callback) {
                                if (typeof(Bloomerang) === 'undefined' || !Bloomerang._isReady) {
                                    setTimeout(function () { waitForBloomerangLoad(callback) }, 500);
                                }
                                else {
                                    if (true) {
                                        callback();
                                    } else {
                                        window.bloomerangLoadStarted = undefined;
                                        Bloomerang = undefined; // The version of Blomerang.js is not what we want. So blow it away and reload.
                                        startBloomerangLoad();
                                    }
                                }
                            };

                            startBloomerangLoad();
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
<!-- #post-## -->
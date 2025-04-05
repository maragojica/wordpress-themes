<?php
function show_HubForm_function () {
    $outForm = '<section class="HubspotForm">';

    $outForm .= '<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
                    <script>
                        hbspt.forms.create({
                        region: "na1",
                        portalId: "21715417",
                        formId: "f047c079-14f4-40e7-9040-bd3d1f53dc72"
                        });
                    </script>';
    $outForm .= '</section>
                    <style>
                    .HubspotForm .form-columns-1, .HubspotForm .form-columns-2 {
                        max-width: 100% !important;
                    }
                    .HubspotForm .input {
                        width: 99% ;
                    }
                    input#email-f047c079-14f4-40e7-9040-bd3d1f53dc72 {
                        width: 100% !important;
                    }
                    .HubspotForm .inputs-list {
                        list-style: none !important;
                        padding-left: 0px;
                    }
                    .HubspotForm input {
                        width: 100%;
                        border-radius: 5px;
                        height: 45px;
                        padding: 0 0 0 36px;						    
                    }
                    .HubspotForm label.hs-form-booleancheckbox-display {
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                    }
                    .HubspotForm label.hs-form-booleancheckbox-display span {
                            margin-left: 15px;
                        }
                    </style>
    ';

    return $outForm ;

}
add_shortcode('show_HubForm', 'show_HubForm_function');